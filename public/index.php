<?php

require_once '../core.php';

$path = $_SERVER["REQUEST_URI"];
if (strpos($path, '?') !== FALSE) {
  $path = substr($path, 0, strpos($path, '?'));
}

$action = route($path);

if (substr($path, strpos($path, '/')+1) == "tech") {
  $meta = render('templates/meta/tech.php');
  $title = "Ebi Baralaye";
  $menu = render('templates/menus/tech.php');
}
else {
  $meta = render('templates/meta/main.php');
  $title = "Ebitenyefa Baralaye";
  $menu = render('templates/menus/main.php');
}

$content = call_user_func("action_".$action, $path);

$template = render('templates/main.php', array('meta' => $meta, 'title' => $title, 'menu' => $menu, 'content' => $content));

echo $template;
