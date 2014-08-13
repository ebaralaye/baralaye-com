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
  'meta_desc' => "Artist: Sculptor, Ceramicst & Designer",
	'title'     => "Ebitenyefa Baralaye",
	'logo'      => "Ebitenyefa Baralaye",
	'menu'      => render('menus/main'),
	'analytics' => $conf['analytics'] ? file_get_contents('pages/static/analytics.htm') : null,
  'vendor'    => file_get_contents('pages/static/vendor.htm'),
);

// Calling a dynamically named function $function
$function = 'action_' . $action;
$response['content'] .= $function($path, $response);

$response['meta'] = render('meta/main', array('meta_desc' => $response['meta_desc']));

$template = render('index', $response);

echo $template;
