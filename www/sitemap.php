<?php
require_once __DIR__ . '/../settings.php';
require_once 'core.php';
header('Content-Type: application/xml; charset=UTF-8');
if (!seo_is_live()) header('X-Robots-Tag: noindex, follow');
function sitemap_xml($text) { return htmlspecialchars($text, ENT_QUOTES, 'UTF-8'); }
$entries = array();
foreach (array('/', '/contact', '/cv', '/news', '/social') as $path) $entries[$path] = array();
foreach ($dbh->query('SELECT name FROM pages')->fetchAll(PDO::FETCH_ASSOC) as $page) {
    if (preg_match('/^[a-z]+$/', $page['name'])) $entries['/' . $page['name']] = array();
}
$works = $dbh->query('SELECT * FROM portfolio WHERE status IS NOT NULL')->fetchAll(PDO::FETCH_ASSOC);
$exhibitions = $dbh->query('SELECT * FROM exhibitions WHERE status = 1')->fetchAll(PDO::FETCH_ASSOC);
foreach (array('portfolio' => $works, 'exhibitions' => $exhibitions) as $type => $items) {
    foreach ($items as $item) {
        $path = seo_work_path($item);
        $images = array();
        $views = !empty($item['image_poplets']) ? explode(',', $item['image_poplets']) : array();
        if (!$views) $views = array(!empty($item['image']) ? $item['image'] : '');
        foreach ($views as $view) {
            $filename = $item['id'] . ($view !== '' ? '-' . trim($view) : '') . '.jpg';
            $image = '/images/art/' . $type . '/' . $item['id'] . '/large/' . $filename;
            if (is_file(__DIR__ . $image)) $images[] = $image;
        }
        $entries[$path] = $images;
    }
}
foreach ($dbh->query('SELECT url, tags FROM portfolio_catalogs')->fetchAll(PDO::FETCH_ASSOC) as $catalog) {
    $path = $catalog['url'];
    $is_exhibition = strpos($path, '/exhibitions') === 0;
    $items = $is_exhibition ? $exhibitions : $works;
    foreach ($items as $item) {
        $available = strpos($path, '/available') === 0;
        $archive = strpos($path, '/archive') === 0;
        if (!$is_exhibition && (($available && (int)$item['status'] !== 1) || ($archive && $item['archive'] === null) || (!$available && !$archive && $item['archive'] !== null))) continue;
        $tags = explode(',', isset($item['tags']) ? $item['tags'] : '');
        $tags = array_merge($tags, array('art', 'work', 'portfolio', $is_exhibition ? 'exhibitions' : ($available ? 'available' : ($archive ? 'archive' : ''))));
        if (!array_diff(explode(',', $catalog['tags']), $tags)) { $entries[$path] = array(); break; }
    }
}
foreach ($dbh->query('SELECT url FROM news WHERE status > 0')->fetchAll(PDO::FETCH_ASSOC) as $post) $entries['/news/' . $post['url']] = array();
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";
foreach ($entries as $path => $images) {
    echo '<url><loc>' . sitemap_xml(seo_url($path)) . '</loc>';
    foreach ($images as $image) echo '<image:image><image:loc>' . sitemap_xml(seo_url($image)) . '</image:loc></image:image>';
    echo "</url>\n";
}
echo '</urlset>';
