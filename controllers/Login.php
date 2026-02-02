<?php
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validation minimale
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email invalide";
    } elseif (strlen($password) < 8) {
        $error = "Mot de passe trop court";
    } else {
        $cuisinier = getCuisinierByEmail($email);

        if ($cuisinier && password_verify($password, $cuisinier['password'])) {
            // Login réussi
            $_SESSION['cuisinier_id'] = $cuisinier['id'];
            $_SESSION['cuisinier_nom'] = $cuisinier['nom'];
            header('Location: ?page=ListPlats'); // redirection vers le CRUD
            exit;
        } else {
            $error = "Email ou mot de passe incorrect";
        }
    }
}

include PATH_PROJET . '/public/templates/Auth/login.html.php';