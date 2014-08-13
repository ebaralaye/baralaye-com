<?php

require_once('../settings.php');
require_once('core.php');
require_once('actions.php');

$path = $_SERVER["REQUEST_URI"];
if (strpos($path, '?') !== FALSE) {
  $path = substr($path, 0, strpos($path, '?'));
}

$action = route($path);

$response = array(
	'content'   => '',
	'meta'      => render('meta/main'),
	'title'     => "Ebitenyefa Baralaye",
	'menu'      => render('menus/main'),
  // Only load analytics in production
	'analytics' => $conf['analytics'] ? file_get_contents('pages/static/analytics.htm') : null,
  'vendor' => file_get_contents('pages/static/vendor.htm'),
);

// Calling a dynamically named function $function
$function = 'action_' . $action;
$response['content'] .= $function($path, $response);

$template = render('index', $response);

echo $template;
