<?php

require_once('settings.php');

// Open a database connection - pointer to my database
$conf = conf();
$conf = $conf['database'];

//Global Variables
$dbh = new PDO($conf['dsn'], $conf['user'], $conf['password']);
$affiliations = null;
$resume_type = null;
$gallery = null;
$gallery_dirs = null;

/**
 * Render Method
 */
function render($template, $variables = array()) {
    extract($variables);
    ob_start();
    include $template;
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

/**
 * Route Method
 */
function route($path) {
  global $resume_type;
  if(substr($path, 0,5) == '/tech' || $_server['http_host'] == "tech.baralaye.com") {
    if(substr($path, 0,11) == '/tech/admin' || ($_server['http_host'] == "tech.baralaye.com" && substr($path, 0,6) == '/admin')) {
      $resume_type = 'tech-admin';
    }
    else {
      $resume_type = 'tech';
    }
    return "resume";
  }
  else if(substr($path, 0,7) == '/resume') {
    if(substr($path, 0,13) == '/resume/admin') {
      $resume_type = 'art-admin';
    }
    else {
      $resume_type = 'art';
    }
    return "resume";
  }
  else if(substr($path, 0,12) == '/progress') {
    return "progress";
  }
  else if(substr($path, 0,4) == '/art') {
    return "portfolio";
  }
  else if(substr($path, 0,5) == '/news') {
    return "news";
  }
  else if(file_exists("pages{$path}.php")){
    return "page";
  }
  else if(file_exists("pages{$path}/index.php")){
    return "index";
  }
  else if ($path == '/') {
    return "home";
  }
  else {
    return "404";
  }
}

/**
 * Portal Action
 */
function action_home($path){
    return render('pages/home.php');
}

/**
 * Page Action
 */
function action_page($path){
    return render("pages{$path}.php");
}

/**
 * Index Action
 */
function action_index($path){
    return render("pages{$path}/index.php");
}

/**
 * Portfolio Action
 */
function action_portfolio($path){
  global $dbh;
  $products = array();

  // Detail View //
  try {
    // SQL - Select all rows from catalogs table that have a url that matches $path
    $sql = 'SELECT * FROM portfolio_art WHERE  url = ?';
    $sth = $dbh -> prepare($sql);
    $sth -> execute(array($path));
    $product = $sth -> fetch();
  }
  catch (PDOException $e) {
  }
  if($product) {
    return render("templates/catalog/detail.php", $product);
  }

  // List View
  else if (!($product)) {
    try {
      // Select rows with the urls that are a zero indexed substring of the path, within the same category
      $sql = 'SELECT * FROM portfolio_art WHERE  status = 1 ORDER BY date DESC';
      $sth = $dbh -> prepare($sql);
      $sth -> execute(array($path));
      $rows = $dbh -> query($sql);
      foreach ($rows as $row) {
        // check if row url is at the first index of the path (list veiw)
        if(strpos($row["url"], $path) === 0) {
          $products[] = $row;
        }
      }

      // SQL - Select all rows from catalogs table that have a url that matches $path
      $sql = 'SELECT * FROM portfolio_catalogs WHERE  url = ?';
      $sth = $dbh -> prepare($sql);
      $sth -> execute(array($path));
      $catalog = $sth -> fetch();

      return render("templates/catalog/list.php", array('products' => $products, 'catalog' => $catalog));
    }
    catch (PDOException $e) {
    }
  }
  else {
     return action_404();
  }
}

/**
 * Resume Action
 */
function action_resume(){
  global $dbh, $resume_type, $affiliations, $gallery, $gallery_dirs;
  // Queries resume page data
  $sql = 'SELECT * FROM resume_pages WHERE  id = ?';
  $sth = $dbh -> prepare($sql);
  $sth -> execute(array($resume_type));
  $resume = $sth -> fetch();
  // Queries resume client list data
  $sql = 'SELECT * FROM resume_clients WHERE  status = 1 ORDER BY period_from DESC';
  $rows = $dbh -> query($sql);
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
  if ($resume['gallery_table']) {
    $sql = 'SELECT * FROM '.$resume['gallery_table'];
    $gallery = $dbh -> query($sql);
    $gallery_dirs = explode(',', $resume['gallery_dirs']);
  }
  return render('templates/resume/index.php', array('resume' => $resume, 'clients' => $clients, 'affiliations' => $affiliations, 'gallery' => $gallery, 'gallery_dirs' => $gallery_dirs));
}

/**
 * In Progress Action
 */
function action_progress(){
  global $dbh;
  $sql = 'SELECT * FROM gallery_progress';
  $gallery = $dbh -> query($sql);
  $gallery_dirs = array('/images/art/progress/small/', '/images/art/progress/large/');
  return render('pages/progress.php', array('gallery' => $gallery, 'gallery_dirs' => $gallery_dirs));
}

/**
 * News Action
 */
function action_news($path){
  global $dbh;
  $path = substr($path, 6); // Truncated path after "/news/" uri string

    try {
        if($path){ // if there is a slug after the /news/ in the path (/news/whatever) - Detail view
            // Selects the row with a mathcing path
            $sql = 'SELECT * FROM news WHERE status = 1 AND url = ?';
            $sth = $dbh -> prepare($sql);
            $sth -> execute(array($path));
            $post = $sth -> fetch();
            // Selects the first five publised articles for the "Latest News" section
            $sql = 'SELECT * FROM news WHERE status = 1 ORDER BY published_date DESC LIMIT 3';
            $rows = $dbh -> query($sql);

            foreach ($rows as $row) {
                $posts[] = $row;
            }

            if ($post) {
                return render("templates/news/detail.php", array('post' => $post, 'posts' => $posts));
            }
        }

        else { //if there is no slug following the news path (/news)
            // selecting all posts that are published
            $sql = 'SELECT * FROM news WHERE status = 1 ORDER BY published_date DESC';
            $rows = $dbh -> query($sql);

            foreach ($rows as $row) {
                $posts[] = $row;
            }

            return render("templates/news/list.php", array('posts' => $posts));
        }
    }

    catch (PDOException $e) {
    }

   return action_404();
}

/**
 * 404 Action
 */
function action_404(){
    return render('pages/error/404.php');
}
