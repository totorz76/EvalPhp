<?php

require_once __DIR__ . '/../config/pdo.php';

function getAllCuisiniers() {
     global $pdo;
    $stmt = $pdo->prepare ("SELECT * FROM cuisiniers");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function createCuisinier($nom, $specialite, $email, $password, $avatar = null) {
    global $pdo;

    $stmt = $pdo->prepare("
        INSERT INTO cuisiniers (nom, specialite, email, password, avatar)
        VALUES (:nom, :specialite, :email, :password, :avatar)
    ");

    return $stmt->execute([
        ':nom' => $nom,
        ':specialite' => $specialite,
        ':email' => $email,
        ':password' => $password,
        ':avatar' => $avatar
    ]);
}
function getCuisinierByEmail($email) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM cuisiniers WHERE email = :email");
    $stmt->execute([':email' => $email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function getCuisinierById($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM cuisiniers WHERE id = :id");
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function updateCuisinier ($id, $nom, $specialite, $email, $password, $avatar = null) {
    global $pdo;
    $stmt = $pdo->prepare("
        UPDATE cuisiniers
        SET nom = :nom, specialite = :specialite, email = :email, password = :password, avatar = :avatar
        WHERE id = :id
    ");
    return $stmt->execute([
        ':id' => $id,
        ':nom' => $nom,
        ':specialite' => $specialite,
        ':email' => $email,
        ':password' => $password,
        ':avatar' => $avatar
    ]);
}