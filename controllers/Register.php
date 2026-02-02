<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $specialite = trim($_POST['specialite'] ?? '');
    $avatarPath = null;

    // Validation du nom et email
    if (strlen($nom) < 2) $errors[] = "Nom trop court";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email invalide";
    if (strlen($password) < 8) $errors[] = "Mot de passe doit faire au moins 8 caractères";

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

    // Si pas d'erreurs, on enregistre
    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        if (createCuisinier($nom, $specialite, $email, $hashedPassword, $avatarPath)) {
            header('Location: ?page=Login');
            exit;
        } else {
            $errors[] = "Erreur lors de l'inscription (email déjà utilisé ?)";
        }
    }
}

// Vue
include PATH_PROJET . '/public/templates/Auth/register.html.php';