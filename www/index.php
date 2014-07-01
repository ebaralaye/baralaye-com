<?php

require_once('../core.php');

$path = $_SERVER["REQUEST_URI"];
if (strpos($path, '?') !== FALSE) {
  $path = substr($path, 0, strpos($path, '?'));
}

$action = route($path);

// Swaps meta data, menu, and template title on /tech request
if (substr($path, 0,5) == '/tech' || $_SERVER['HTTP_HOST'] == "tech.baralaye.com") {
  $meta = render('templates/meta/tech.php');
  $title = "Ebi Baralaye";
  $menu = render('templates/menus/tech.php');
}
else {
  $meta = render('templates/meta/main.php');
  $title = "Ebitenyefa Baralaye";
  $menu = render('templates/menus/main.php');
}

// Populates analytics code only in production
if ($_SERVER['HTTP_HOST'] == "baralaye.com") {
  $analytics = render('analytics.php');
}
else {
  $analytics = null;
}

$content = call_user_func("action_".$action, $path);

$template = render('templates/index.php', array('meta' => $meta, 'title' => $title, 'menu' => $menu, 'content' => $content, 'analytics' => $analytics));

echo $template;
