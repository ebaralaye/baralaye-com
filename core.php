<?php

// Open a database connection - pointer to my database
$conf = conf();

//Global Variables
$dbh = new PDO($conf['database']['dsn'], $conf['database']['user'], $conf['database']['password']);

/**
 * Render Method
 */
function render($template, $variables = array()) {
    extract($variables);
    ob_start();
    include 'templates/'.$template.'.php';
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

/**
 * Route Method
 */
function route($path) {
  $portfolio_catalogs = array('portfolio','work','art','archive','design','ceramics','pottery','design','sculpture','vessels','drawings');
  $path_arr = explode('/',$path);
  $path_rootDir = $path_arr[1];
  if(substr($path, 0,5) == '/tech' || $_SERVER['HTTP_HOST'] == "tech.baralaye.com") {
    return "resume";
  }
  else if ($path == '/') {
    return "home";
  }
  else if(substr($path, 0,7) == '/resume') {
    return "resume";
  }
  else if(substr($path, 0,12) == '/progress') {
    return "progress";
  }
  else if(in_array($path_rootDir, $portfolio_catalogs)) {
    return "portfolio";
  }
  else if(substr($path, 0,5) == '/news') {
    return "news";
  }
  else if ($path == '/contact') {
    return "contact";
  }
  else {
    $file = preg_replace('/[^a-z]/', '', $path);
    if(file_exists("pages/{$file}.htm")){
      return "page";
    }
    else if(file_exists("pages/{$file}/index.htm")){
      return "index";
    }

    return "404";
  }
}
