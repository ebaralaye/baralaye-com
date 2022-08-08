<?php

/**
 * Portal Action
 */
function action_home($path){
    return file_get_contents('pages/home.htm');
}

/**
 * Page Action
 */
function action_page($path){
    global $response;
    $file = preg_replace('/[^a-z]/', '', $path);
    $response['title'] .= " - ".ucwords($file);
    return file_get_contents("pages/{$file}.htm");
}

/**
 * pages action. content supplied via database pages table.
 */
function action_pages($path){
  global $response;
  global $dbh;
  $page_title = preg_replace('/[^a-z]/', '', $path);
  $response['title'] .= " - ".ucwords($page_title);
  $sql = "select * from pages where name = '$page_title'";
  $sth = $dbh -> prepare($sql);
  $sth -> execute();
  $page = $sth -> fetch();
  return render('pages', $page);
}

/**
 * Index Action
 */
function action_index($path){
    global $response;
    $file = preg_replace('/[^a-z]/', '', $path);
    $response['title'] .= " - ".ucwords($file);
    return file_get_contents("pages/{$file}/index.htm");
}

/**
 * Portfolio Action
 */
function action_catalog($path){
  global $dbh;
  global $response;

  $catalog ="portfolio"; //defaults to portfolio
  if (substr($path, 1,11) == 'exhibitions') $catalog = "exhibitions";

  $pathArr = explode('/',$path);
  error_log('path array - '.$pathArr);

  // Detail View //
  $pathProductNode = $pathArr[count($pathArr)-1]; // Slice of path after the last '/'
  $pathCatalogArr = array_slice($pathArr,1,count($pathArr)-2); // Slice of path before the last '/'
  error_log($pathProductNode." / ".$pathCatalogArr);

  try {
    // SQL - Select all rows from catalogs table that have a url that matches $path
    $sql = 'SELECT * FROM '.$catalog.' WHERE name = ?';
    $sth = $dbh -> prepare($sql);
    $sth -> execute(array($pathProductNode));
    $product = $sth -> fetch();
    if (empty($product)) { // enables the use ids as identifiers in urls routes instead of names
      $sql = 'SELECT * FROM '.$catalog.' WHERE id = ?';
      $sth = $dbh -> prepare($sql);
      $sth -> execute(array($pathProductNode));
      $product = $sth -> fetch();
    }
    $product_tags = explode(',',$product['tags']);
    // Manually adding base tags
    $product_tags[] = "art";
    $product_tags[] = "portfolio";
    $product_tags[] = "work";
    $product_tags[] = "exhibitions";
    $catalog_diff = array_diff($pathCatalogArr,$product_tags);
  }
  catch (PDOException $e) {
  }

  if ($product && empty($catalog_diff)) {
    // Set product title to system name if title is null (untitled)
    $product['title_type'] = null;
    $product['catalog'] = $catalog;
    if ($product['title'] == null) {
      $product['title'] = mb_strtoupper($product['id']);
      $product['title_type'] = 'untitled';
    }
    $response['title'] .= " - "."&quot;".$product['title']."&quot;";
    $response['meta_desc'] = $product['medium'];
    // Render
    return render("catalog/detail", $product);
  }

  // List View
  else {
    // SQL - Select all rows from catalogs table that have a url that matches $path
    $sql = 'SELECT * FROM portfolio_catalogs WHERE  url = ?';
    $sth = $dbh -> prepare($sql);
    $sth -> execute(array($path));
    $catalog = $sth -> fetch();
    $catalog_tags = explode(',',$catalog['tags']);
    $conditional_tag = null;
    error_log("catalog tags - ".$catalog['tags']);

    if ($catalog) {
      $products = array();
      $response['title'] .= " - ".$catalog['title'];
      $response['meta_desc'] = $catalog['description'];
      error_log("valid catalog - ".$catalog['title']);

      try {

        // Select rows with the urls that are a zero indexed substring of the path, within the same category
        if (substr($path, 1,7) == 'archive'){
          $sql = 'SELECT * FROM portfolio WHERE status IS NOT NULL AND archive IS NOT NULL ORDER BY date DESC';
          $conditional_tag = "archive";
          error_log("archive",0);
        }
        else if (substr($path, 1,9) == 'available'){
          $sql = 'SELECT * FROM portfolio WHERE status = 1 ORDER BY date DESC';
          $conditional_tag = "available";
          error_log("available",0);
        }
        else if (substr($path, 1,11) == 'exhibitions'){
          $sql = 'SELECT * FROM exhibitions WHERE status = 1 ORDER BY period_from DESC';
          $conditional_tag = "exhibitions";
          error_log("exhibitions",0);
        }
        else {
          $sql = 'SELECT * FROM portfolio WHERE status IS NOT NULL AND archive IS NULL ORDER BY date DESC';
          error_log("not archive",0);
        }
        $sth = $dbh -> prepare($sql);
        $sth -> execute(array($path));
        $rows = $dbh -> query($sql);

        foreach ($rows as $row) {
          $product_tags = explode(',',$row['tags']);
          // Manually adding base tags
          $product_tags[] = "art";
          $product_tags[] = "work";
          $product_tags[] = $conditional_tag;
          $product_tags[] = "portfolio";
          $result = array_diff($catalog_tags, $product_tags);

          $row['title_type'] = null;
          if ($row['title'] == null) {
            $row['title'] = $row['id'];
            $row['title_type'] = 'untitled';
          }

          if (empty($result)){
            $products[] = $row;
          }
        }

        if (count($products) > 0) {
          return render("catalog/list", array('products' => $products, 'catalog' => $catalog));
        }
      }
      catch (PDOException $e) {
      }
    }
    else {
      error_log("invalid catalog url");
    }
  }
  return action_404();
}

/**
 * CV
 */
function action_cv() {
  $tags = array(
    'education' => array(),
    'exhibitions' => array('solo','group'),
    'press' => array(),
    'awards' => array(),
    'residencies' => array(),
    'lectures' => array(),
    'teaching' => array(),
    'workshops' => array(),
    'assistantships' => array(),
    'curation' => array(),
    'representation' => array(),
  );
  return render('cv/index', array('tags' => $tags));
}

/**
 * Resume Action
 */
function action_resume($path, &$response) {
  global $dbh;

  if(substr($path, 0,5) == '/tech' || $_SERVER['HTTP_HOST'] == "tech.baralaye.com") {

    $response['meta'] = 'meta/tech';
    $response['title'] = 'Baralaye / Tech';
    $response['logo'] = 'Baralaye / Tech';
    $response['menu'] = render('menus/tech');

    if(substr($path, 0,11) == '/tech/admin' || ($_SERVER['HTTP_HOST'] == "tech.baralaye.com" && substr($path, 0,6) == '/admin')) {
      $resume_type = 'tech-admin';
    }
    else {
      $resume_type = 'tech';
    }
  }
  else if(substr($path, 0,7) == '/resume') {
    if(substr($path, 0,13) == '/resume/admin') {
      $resume_type = 'art-admin';
    }
    else {
      $resume_type = 'art';
    }
  }

  // Queries resume page data
  $sql = 'SELECT * FROM resume_pages WHERE  id = ?';
  $sth = $dbh -> prepare($sql);
  $sth -> execute(array($resume_type));
  $resume = $sth -> fetch();
  // Queries resume client list data
  $sql = 'SELECT * FROM resume_clients WHERE status IS NOT NULL ORDER BY period_from DESC';
  $rows = $dbh -> query($sql);
  $affiliations = array();
  foreach ($rows as $row) {
    // Condition to polulate type specific client list data
    $tags = explode(',', $row['tags']);
    if (in_array($resume_type, $tags)) {
      $clients[] = $row;
    }

    // Condition to populate type specific affiliation data
    if (in_array($resume_type.'-affiliations', $tags)) {
      $affiliations[] = $row;
    }
  }

  // Queries resume gallery data (if it exists)
  if ($resume['gallery_table'] != null) {
    $sql = 'SELECT * FROM '.$resume['gallery_table'];
    $gallery = $dbh -> query($sql);
    $gallery_dirs = explode(',', $resume['gallery_dirs']);
  }

  $data = array(
    'resume'       => $resume,
    'clients'      => render('resume/clients', array('clients' => $clients)),
    'affiliations' => (($affiliations) > 0) ? render('resume/affiliations', array('affiliations' => $affiliations)) : null,
    'references'   => render('resume/references', array('clients' => $clients)),
    'gallery'      => ($resume['gallery_table'] != null) ? render('gallery', array('gallery' => $gallery, 'gallery_dirs' => $gallery_dirs)) : null,
  );

  return render('resume/index', $data);
}

/**
 * In Progress Action
 */
function action_progress(){
  global $dbh;
  global $response;
  $response['title'] .= ' - In Progress';
  $sql = 'SELECT * FROM gallery_progress';
  $gallery = $dbh -> query($sql);
  $gallery_dirs = array('/images/art/progress/small/', '/images/art/progress/large/');
  return render('progress', array('gallery' => $gallery, 'gallery_dirs' => $gallery_dirs));
}

/**
 * News Action
 */
function action_news($path){
  global $dbh;
  global $response;
  $response['title'] .= ' - News';
  $path = substr($path, 6); // Truncated path after "/news/" uri string
  $list_num = 7;

    try {
      if($path == "archive"){ // news/archive page logic
        $sql = 'SELECT * FROM news WHERE status>0 ORDER BY published_date DESC LIMIT '.$list_num.', 1000';
        $rows = $dbh -> query($sql);

        foreach ($rows as $row) {
            $posts[] = $row;
        }
        return render("news/list", array('posts' => $posts, 'type' => 'archive'));
      }
      else if($path){ // if there is a slug after the /news/ in the path (/news/whatever) - Detail view
        // Selects the row with a mathcing path
        $sql = 'SELECT * FROM news WHERE status>0 AND url = ?';
        $sth = $dbh -> prepare($sql);
        $sth -> execute(array($path));
        $post = $sth -> fetch();
        // Selects the first five publised articles for the "Latest News" section
        $sql = 'SELECT * FROM news WHERE status>0 ORDER BY published_date DESC LIMIT 3';
        $rows = $dbh -> query($sql);
        foreach ($rows as $row) {
            $posts[] = $row;
        }
        if ($post) {
            return render("news/detail", array('post' => $post, 'posts' => $posts));
        }
      }
      else { //if there is no slug following the news path. News index page logic.
        $sql = 'SELECT * FROM news WHERE status>0 ORDER BY published_date DESC LIMIT '.$list_num;
        $rows = $dbh -> query($sql);
        foreach ($rows as $row) {
            $posts[] = $row;
        }
        return render("news/list", array('posts' => $posts, 'type' => 'index'));
      }
    }

    catch (PDOException $e) {
    }

   return action_404();
}

/**
 * Contact Social
 */
function action_social(){
  return render('social');
}

/**
 * Contact Action
 */
function action_contact(){
  $form_values = array();
  $form_errors = array();
  global $response;
  $response['title'] .= ' - Contact';

  if (! empty($_POST)) {
    $values = $_POST;

    if (empty($values['email'])) {
      $form_errors['email'] = "There's no email!";
    }
    else if (! preg_match('/^[a-z0-9.\-_]+@[a-z0-9.\-_]+\.[a-z]+$/i' ,$values['email'])) {
      $form_errors['email'] = "Hey, that's not an email!";
    }
    if (empty($values['message'])) {
      $form_errors['message'] = "There's no message!";
    }

    // If all validation passes
    if (count($form_errors) == 0 && $values['captcha'] == '') {
      $headers = "From: Baralaye web Server <webserver@baralaye.com>\r\n"; 
      //specify MIME version 1.0 
      $headers .= "MIME-Version: 1.0\r\n"; 
      //unique boundary 
      $boundary = uniqid(); 
      //tell e-mail client this e-mail contains//alternate versions 
      $headers .= "Content-Type: multipart/alternative; boundary=$boundary\r\n; charset=utf-8" . "\r\n";
      $values['boundary'] = $boundary;
      $message = render('email/contact', $values);
      $message = str_replace("\n", "\r\n", $message);
      $to = "info@baralaye.com";
      $subject = "New Contact from Baralaye.com";
      if (mail($to, $subject, $message, $headers)) {
        header('Location: /contact?success=1');
        exit;
      }
      else {
        $form_errors['submission'] = "We can't submit this!";
      }
    }
    foreach($values as $i => $value){
      $form_values[$i] = htmlentities($value, ENT_QUOTES);
    }
  }
  return render('contact', array(
                'form_values' => $form_values,
                'form_errors' => $form_errors,
                'form_success' => !empty($_GET['success']),
               ));
}

/**
 * 404 Action
 */
function action_404(){
    global $response;
    $response['title'] = '404';
    return file_get_contents('pages/error.404.htm');
}
