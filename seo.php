<?php
// Compatible with the remote PHP 5.3 runtime.
function seo_text($value) {
    return trim(preg_replace('/\s+/u', ' ', html_entity_decode(strip_tags((string)$value), ENT_QUOTES, 'UTF-8')));
}
function seo_escape($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
function seo_is_live() {
    $host = isset($_SERVER['HTTP_HOST']) ? strtolower($_SERVER['HTTP_HOST']) : '';
    return $host === 'baralaye.com' || $host === 'www.baralaye.com';
}
function seo_url($path) {
    return 'https://baralaye.com/' . ltrim($path, '/');
}
function seo_work_path($work) {
    $slug = !empty($work['name']) ? $work['name'] : $work['id'];
    return rtrim($work['url'], '/') . '/' . $slug;
}
function seo_work_alt($work, $view = null) {
    $title = !empty($work['title']) ? seo_text($work['title']) : 'Untitled work ' . $work['id'];
    $alt = $title . ' by Ebitenyefa Baralaye';
    if (!empty($work['medium'])) $alt .= ', ' . seo_text($work['medium']);
    if ($view !== null) $alt .= ' — view ' . $view;
    return $alt;
}
function seo_description($value) {
    $text = seo_text($value);
    return mb_strlen($text, 'UTF-8') > 170 ? rtrim(mb_substr($text, 0, 167, 'UTF-8')) . '…' : $text;
}
