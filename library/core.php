<?php

/**
 * Database Conf
 */
function conf() {
    $conf = array(
        'database' => array (
            'dsn' => 'mysql:dbname=dev_baralaye;host=127.0.0.1',
            'user' => 'baralaye_com',
            'password' => '8FpJwPTC',
        )
    );
    return $conf;
}

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
    if ($path == '/') {
        return "home";
    }
    else if(file_exists("pages{$path}.php")){
        return "page";
    }
    else if(substr($path, 0,4) == '/art') {
        return "catalog";
    }
    else if(substr($path, 0,5) == '/news') {
        return "news";
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
 * Catalog Action
 */
function action_catalog($path){
    $products = array();
    $products_ref = fopen("database/products.csv", "r");
    $properties = fgetcsv($products_ref);
    $properties = array_slice($properties, 0, 15);

    while (($row = fgetcsv($products_ref)) !== FALSE){
        $row = array_slice($row, 0, 15);
        $product = array_combine($properties, $row);
        // Detail View //
        if ($path == $product["url"]) {
            return render("templates/catalog/detail.php", $product);
            break;
        }
        // Check if the path is the first part of the product url, a catalog path
        else if(strpos($product["url"], $path) === 0) {
            // Add product to products array for catalog view
            $products[] = $product;
        }
    }
    fclose($products_ref);

    // Catalog View (more than one row of matching products)
    if (count($products) > 0) {

      // Open a database connection - pointer to my database
      $conf = conf();
      $conf = $conf['database'];

      try {
          $dbh = new PDO($conf['dsn'], $conf['user'], $conf['password']);
          // SQL - Select all rows from catalogs table that have a url that matches $path
          $sql = 'SELECT * FROM catalogs WHERE  url = ?';
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

        if($path){
            // SQL statement for url slug (detail view)
            $sql = 'SELECT * FROM posts WHERE status = 1 AND url = ?';
            $sth = $dbh -> prepare($sql);
            $sth -> execute(array($path));
            $post = $sth -> fetch();

            if ($post) {
                return render("templates/news/detail.php", $post);
            }
        }
        else {
            // selecting all posts that are published
            $sql = 'SELECT * FROM posts WHERE status = 1 ORDER BY published_date DESC';
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
