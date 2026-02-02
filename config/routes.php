<?php

define("PATH_PROJET", $_SERVER['DOCUMENT_ROOT'] . "/EvalPhp");
define("WEB_ROOT", "/EvalPhp");

$routes = [
    'home' => PATH_PROJET . '/public/templates/accueil.html.php',
    '404' => PATH_PROJET . '/404.php',
    'AddPlats' => PATH_PROJET . '/controllers/AddPlats.php',
    'ListPlats' => PATH_PROJET . '/controllers/ListPlats.php',
    'DeletePlats' => PATH_PROJET . '/controllers/DeletePlats.php',
    'Register' => PATH_PROJET . '/controllers/Register.php',
    'Login' => PATH_PROJET . '/controllers/Login.php',
    'Logout' => PATH_PROJET . '/controllers/Logout.php',

];