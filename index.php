<?php
ini_set("auto_detect_line_endings", true);

require_once 'library/core.php';

$path = $_SERVER["REQUEST_URI"];
if (strpos($path, '?') !== FALSE) {
  $path = substr($path, 0, strpos($path, '?'));
}

$content = "";

if ($path == '/') {
    $content = render('pages/home.php');
}
else if(substr($path, 0,4) == '/art') {
    $products = array();
    $products_ref = fopen("database/products.csv", "r");
    $properties = fgetcsv($products_ref);
    $properties = array_slice($properties, 0, 15);

    while (($row = fgetcsv($products_ref)) !== FALSE){
        $row = array_slice($row, 0, 15);
        $product = array_combine($properties, $row);
        if ($path == $product["url_path"]) {
            $content = render("templates/catalog/detail.php", $product);
            break;
        }
        else if(strpos($product["url_path"], $path) === 0) {
            $products[] = $product;
        }
    }

    fclose($products_ref);

    if (count($products) > 0) {
        $content = render("templates/catalog/list.php", array('products' => $products));
    }
}
else if(file_exists("pages{$path}.php")){
    $content = render("pages{$path}.php");
}
else {
    $content = render('pages/error/404.php');
}

$mainMenu = render('templates/menus/main.php');

$template = render('templates/main.php', array('content' => $content, 'mainMenu' => $mainMenu));

echo $template;
