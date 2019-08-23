<?php

if (!empty($_SERVER['REQUEST_URI'])) {
    $path = rtrim(strtok($_SERVER['REQUEST_URI'], "?"), '/');
    $_GET['q'] = strlen($path) === 0 ? '/' : $path;
}

include SITE_ROOT . '/includes/autoload.php';
include SITE_ROOT . '/includes/routes.php';
include SITE_ROOT . '/includes/theme.php';