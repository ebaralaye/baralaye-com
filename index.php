<?php
ini_set("auto_detect_line_endings", true);

require_once 'library/core.php';

$path = $_SERVER["REQUEST_URI"];
if (strpos($path, '?') !== FALSE) {
  $path = substr($path, 0, strpos($path, '?'));
}

$action = route($path);

$content = call_user_func("action_".$action, $path);

$mainMenu = render('templates/menus/main.php');

$template = render('templates/main.php', array('content' => $content, 'mainMenu' => $mainMenu));

echo $template;
