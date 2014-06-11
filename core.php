<?php

require_once('settings.php');

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
    if(substr($path, 0,5) == '/tech' || $_SERVER['HTTP_HOST'] == "tech.baralaye.com") {
        return "tech";
    }
    else if(substr($path, 0,7) == '/resume') {
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
  $products = array();

  // Open a database connection - pointer to my database
  $conf = conf();
  $conf = $conf['database'];

  // Detail View //
  try {
    $dbh = new PDO($conf['dsn'], $conf['user'], $conf['password']);
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
      $dbh = new PDO($conf['dsn'], $conf['user'], $conf['password']);

      // Select rows with the urls that are a zero indexed substring of the path, within the same category
      $sql = 'SELECT * FROM portfolio_art WHERE  status = 1 ORDER BY date DESC';
      $sth = $dbh -> prepare($sql);
      $sth -> execute(array($path));
      $rows = $dbh->query($sql);
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
 * 404 Action
 */
function action_404(){
    return render('pages/error/404.php');
}

/**
 * Resume Action
 */
function action_resume(){
  $clients = array();
  $affiliations = array();

  // Open a database connection - pointer to my database
  $conf = conf();
  $conf = $conf['database'];

  $dbh = new PDO($conf['dsn'], $conf['user'], $conf['password']);
  // Select rows with the urls that are a zero indexed substring of the path, within the same category
  $sql = 'SELECT * FROM resume WHERE  status = 1 ORDER BY period_from DESC';
  $rows = $dbh->query($sql);
  foreach ($rows as $row) {
    $tags = explode(',', $row['tags']);
    if (in_array('art', $tags)) {
      $clients[] = $row;
    }
    if (in_array('art/affiliations', $tags)) {
      $affiliations[] = $row;
    }
  }
  return render('pages/resume.php', array('clients' => $clients, 'affiliations' => $affiliations));
}

/**
 * Tech Action
 */
function action_tech(){
  $clients = array();
  $affiliations = array();

  // Open a database connection - pointer to my database
  $conf = conf();
  $conf = $conf['database'];

  $dbh = new PDO($conf['dsn'], $conf['user'], $conf['password']);
  // Select rows with the urls that are a zero indexed substring of the path, within the same category
  $sql = 'SELECT * FROM resume WHERE  status = 1 ORDER BY period_from DESC';
  $rows = $dbh->query($sql);
  foreach ($rows as $row) {
    $tags = explode(',', $row['tags']);
    if (in_array('tech', $tags)) {
      $clients[] = $row;
    }
    if (in_array('tech/affiliations', $tags)) {
      $affiliations[] = $row;
    }
  }
  $sql = 'SELECT * FROM gallery_tech';
  $gallery = $dbh->query($sql);
  $gallery_dirs = array('small' => '/images/tech/portfolio/small/', 'large' => '/images/tech/portfolio/large/');
  return render('pages/tech.php', array('clients' => $clients, 'affiliations' => $affiliations, 'gallery' => $gallery, 'gallery_dirs' => $gallery_dirs));
}

/**
 * In Progress Action
 */
function action_progress(){
  $conf = conf();
  $conf = $conf['database'];
  $dbh = new PDO($conf['dsn'], $conf['user'], $conf['password']);
  $sql = 'SELECT * FROM gallery_progress';
  $gallery = $dbh->query($sql);
  $gallery_dirs = array('small' => '/images/art/progress/small/', 'large' => '/images/art/progress/large/');
  return render('pages/progress.php', array('gallery' => $gallery, 'gallery_dirs' => $gallery_dirs));
}

/**
 * News Action
 */
function action_news($path){
    // Array to hold list of post data
    $posts = array();
    // Truncated path after "/news/" uri string
    $path = substr($path, 6);

    // Open a database connection - pointer to my database
    $conf = conf();
    $conf = $conf['database'];

    try {
        $dbh = new PDO($conf['dsn'], $conf['user'], $conf['password']);

        if($path){ // if there is a slug after the /news/ in the path (/news/whatever) - Detail view

            // Selects the row with a mathcing path
            $sql = 'SELECT * FROM news WHERE status = 1 AND url = ?';
            $sth = $dbh -> prepare($sql);
            $sth -> execute(array($path));
            $post = $sth -> fetch();

            // Selects the first five publised articles for the "Latest News" section
            $sql = 'SELECT * FROM news WHERE status = 1 ORDER BY published_date DESC LIMIT 3';
            $rows = $dbh->query($sql);
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
            $rows = $dbh->query($sql);

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
