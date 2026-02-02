<?php

if (!isset($_SESSION['cuisinier_id'])) {
    header('Location: ?page=Login');
    exit;
}

$cuisinier_id = $_SESSION['cuisinier_id'];
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    echo "Plat invalide";
    exit;
}

// Récupération du plat
$plat = getPlatById($id);

if (!$plat) {
    echo "Plat introuvable";
    exit;
}

// Vérification de propriété
if ($plat['cuisinier_id'] != $cuisinier_id) {
    echo "Accès interdit";
    exit;
}

// Suppression autorisée
deletePlat($id);

header('Location: ?page=ListPlats');
exit;
