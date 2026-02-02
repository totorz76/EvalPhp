<?php 

$platsArray = getAllPlats();

// Récupération des catégories et cuisiniers pour remplir les selects
$categories = getAllCategories();
$cuisiniers = getAllCuisiniers();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $type_id = intval($_POST['type_id'] ?? 0);
    $description = trim($_POST['description'] ?? '');
    $cuisinier_id = intval($_POST['cuisinier_id'] ?? 0);

    // Validation
    if (strlen($nom) < 3) $errors['nom'] = "Nom trop court";
    if ($type_id <= 0) $errors['type'] = "Veuillez sélectionner un type";
    if (strlen($description) < 3) $errors['description'] = "Description trop courte";
    if ($cuisinier_id <= 0) $errors['cuisinier'] = "Veuillez sélectionner un cuisinier";

    if (empty($errors)) {
        createPlat($nom, $type_id, $description, $cuisinier_id);
        header('Location: ?page=home'); // redirection après ajout
        exit;
    }
}
include PATH_PROJET . '/public/templates/Plats/ListPlats.html.php';