<?php
require_once __DIR__ . '/config/pdo.php';
require_once __DIR__ . '/config/routes.php';
include PATH_PROJET . '/model/Cuisiners.php';
include PATH_PROJET . '/model/Categories.php';
include PATH_PROJET . '/model/Plats.php';
include PATH_PROJET . '/model/Users.php';



$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? 'home';

if (!array_key_exists($page, $routes)) {
    require $routes['404'];
    exit;
}

require $routes[$page];
