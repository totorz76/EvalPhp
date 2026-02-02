<?php

if (!isset($_SESSION['cuisinier_id'])) {
    header('Location: ?page=Login');
    exit;
}

$cuisinier_id = $_SESSION['cuisinier_id'];
$cuisinier = getCuisinierById($cuisinier_id);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? $cuisinier['nom']);
    $specialite = trim($_POST['specialite'] ?? $cuisinier['specialite']);
    $email = trim($_POST['email'] ?? $cuisinier['email']);
    $password = $_POST['password'] ?? '';
    $avatarPath = $cuisinier['avatar'];

    // Validation minimale
    if (strlen($nom) < 2) $errors[] = "Nom trop court";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email invalide";
    if (!empty($password) && strlen($password) < 8) $errors[] = "Mot de passe trop court (>8 caractères)";

    // Upload avatar si présent
    if (!empty($_FILES['avatar']['name'])) {
        $file = $_FILES['avatar'];
        $allowed = ['jpg','jpeg','png','webp'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if ($file['size'] > 2*1024*1024) {
            $errors[] = "Avatar trop lourd (<2Mo)";
        }
        if (!in_array($ext, $allowed)) {
            $errors[] = "Format avatar invalide (jpg, jpeg, png, webp)";
        }

        if (empty($errors)) {
            $newName = uniqid('avatar_') . '.' . $ext;
            $destination = __DIR__ . '/../uploads/' . $newName;
            move_uploaded_file($file['tmp_name'], $destination);
            $avatarPath = 'uploads/' . $newName;
        }
    }

    // Hash mot de passe si renseigné
    $hashedPassword = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : $cuisinier['password'];

    if (empty($errors)) {
        if (updateCuisinier($cuisinier_id, $nom, $specialite, $email, $hashedPassword, $avatarPath)) {
            $_SESSION['cuisinier_nom'] = $nom;
            header('Location: ?page=Profile');
            exit;
        } else {
            $errors[] = "Erreur lors de la mise à jour du profil";
        }
    }
}

include PATH_PROJET . '/public/templates/Profil.html.php';
