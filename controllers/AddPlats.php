<?php

if (!isset($_SESSION['cuisinier_id'])) {
    header('Location: ?page=Login');
    exit;
}

$cuisinier_id = $_SESSION['cuisinier_id'];
$errors = [];

// Récupération UNIQUEMENT des plats du cuisinier connecté
$platsArray = getPlatsByCuisinier($cuisinier_id);

// Récupération des catégories seulement
$categories = getAllCategories();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $type_id = (int)($_POST['type_id'] ?? 0);
    $description = trim($_POST['description'] ?? '');

    // Validation serveur
    if (strlen($nom) < 3) {
        $errors['nom'] = "Nom trop court (min 3 caractères)";
    }

    if ($type_id <= 0) {
        $errors['type'] = "Veuillez sélectionner un type";
    }

    if (strlen($description) < 3) {
        $errors['description'] = "Description trop courte";
    }

    if (empty($errors)) {
        createPlat($nom, $type_id, $description, $cuisinier_id);
        header('Location: ?page=ListPlats');
        exit;
    }
}

include PATH_PROJET . '/public/templates/Plats/AddPlats.html.php';
