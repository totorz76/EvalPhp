<?php
session_start();
require_once __DIR__ . '/../models/Cuisiniers.php';

if (!isset($_SESSION['cuisinier_id'])) {
    header('Location: ?page=Login');
    exit;
}

$cuisinier_id = $_SESSION['cuisinier_id'];
$cuisinier = getCuisinierById($cuisinier_id);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $avatarPath = $cuisinier['avatar'];

    // Validation email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email invalide";
    }

    // Upload avatar si présent
    if (!empty($_FILES['avatar']['name'])) {
        $file = $_FILES['avatar'];
        $allowed = ['jpg','jpeg','png','webp'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if ($file['size'] > 2*1024*1024) {
            $errors[] = "Avatar trop lourd (<2Mo)";
        }

        if (!in_array($ext, $allowed)) {
            $errors[] = "Format d'avatar invalide (jpg, jpeg, png, webp)";
        }

        if (empty($errors)) {
            $newName = uniqid('avatar_') . '.' . $ext;
            $destination = __DIR__ . '/../uploads/' . $newName;
            move_uploaded_file($file['tmp_name'], $destination);
            $avatarPath = 'uploads/' . $newName;
        }
    }

    // Hash si mot de passe renseigné
    $hashedPassword = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : null;

    if (empty($errors)) {
        if (updateCuisinier($cuisinier_id, $email, $hashedPassword, $avatarPath)) {
            $_SESSION['cuisinier_nom'] = $cuisinier['nom']; // si nom modifiable
            header('Location: ?page=Profile');
            exit;
        } else {
            $errors[] = "Erreur lors de la mise à jour";
        }
    }
}

include PATH_PROJET . '/public/templates/Profil.html.php';
