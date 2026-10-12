<?php

require_once('../settings.php');
require_once('core.php');
require_once('actions.php');

$path = $_SERVER["REQUEST_URI"];
if (strpos($path, '?') !== FALSE) {
  $path = substr($path, 0, strpos($path, '?'));
}

if ($path === '/sitemap.xml') {
  require __DIR__ . '/sitemap.php';
  exit;
}

$action = route($path);
$noindex = !seo_is_live() || $action === 'resume';
if ($noindex) header('X-Robots-Tag: noindex, follow');

$response = array(
	'content'   => '',
  'meta'      => 'meta/main',
  'meta_desc' => 'Explore sculpture, ceramics, and design by Ebitenyefa Baralaye, with selected works, exhibitions, and studio news.',
  'canonical_path' => $path,
  'noindex' => $noindex,
  'og_image' => null,
	'title'     => 'Ebitenyefa Baralaye',
	'logo'      => 'Ebitenyefa Baralaye',
	'menu'      => render('menus/main'),
	'analytics' => $conf['analytics'] ? file_get_contents('pages/static/analytics.htm') : null,
  'vendor'    => file_get_contents('pages/static/vendor.htm'),
);

// Calling a dynamically named function $function
$function = 'action_' . $action;
$response['content'] .= $function($path, $response);

// Rendering meta data after meta_desc is updated by actions
if (!empty($response['noindex'])) header('X-Robots-Tag: noindex, follow');
$response['meta'] = render($response['meta'], $response);

$template = render('index', $response);

echo $template;
