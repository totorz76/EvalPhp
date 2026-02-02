<?php

$cuisinier_id = $_SESSION['cuisinier_id'] ?? 0;

if (!$cuisinier_id) {
    header('Location: ?page=Login');
    exit;
}

$platsArray = getPlatsByCuisinier($cuisinier_id);


include PATH_PROJET . '/public/templates/Plats/ListPlats.html.php';
