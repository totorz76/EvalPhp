<?php
session_start();
require_once __DIR__ . '/config/pdo.php';
require_once __DIR__ . '/config/routes.php';
include PATH_PROJET . '/model/Cuisiners.php';
include PATH_PROJET . '/model/Categories.php';
include PATH_PROJET . '/model/Plats.php';
include PATH_PROJET . '/model/Karadoc.php';


if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? 'home';

if (!array_key_exists($page, $routes)) {
    require $routes['404'];
    exit;
}
include PATH_PROJET . '/public/templates/header.html.php';

require $routes[$page];

include PATH_PROJET . '/public/templates/footer.html.php';