<?php

function render($template, $variables = array()) {
    extract($variables);
    ob_start();
    include $template;
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}
