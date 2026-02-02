<?php

if (!isset($_SESSION['cuisinier_id'])) {
    header('Location: ?page=Login');
    exit;
}

$cuisinier_id = $_SESSION['cuisinier_id'];
$errors = [];

// Vérification de l’ID du plat
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

// Sécurité majeure : le plat doit appartenir au cuisinier connecté
if ($plat['cuisinier_id'] != $cuisinier_id) {
    echo "Accès interdit";
    exit;
}

// Récupération des catégories pour le select
$categories = getAllCategories();

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $type_id = (int)($_POST['type_id'] ?? 0);
    $description = trim($_POST['description'] ?? '');

    // Validation serveur
    if (strlen($nom) < 3) {
        $errors['nom'] = "Le nom doit contenir au moins 3 caractères";
    }

    if ($type_id <= 0) {
        $errors['type'] = "Type invalide";
    }

    if (empty($description)) {
        $errors['description'] = "La description est obligatoire";
    }

    // Mise à jour si aucune erreur
    if (empty($errors)) {
        $success = updatePlats(
            $id,
            $nom,
            $type_id,
            $description,
            $cuisinier_id
        );

        if ($success) {
            header('Location: ?page=ListPlats');
            exit;
        } else {
            $errors['sql'] = "Erreur lors de la mise à jour du plat";
        }
    }
}

include PATH_PROJET . '/public/templates/Plats/EditPlats.html.php';
