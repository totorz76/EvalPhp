<?php 
session_start();
if (!isset($_SESSION['cuisinier_id'])) {
    header('Location: ?page=Login');
    exit;
}

$platsArray = getAllPlats();
include PATH_PROJET . '/public/templates/Plats/ListPlats.html.php';