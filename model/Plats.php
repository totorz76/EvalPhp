<?php

require_once __DIR__ . '/../config/pdo.php';

// Récupérer les plats

function getAllPlats()
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT plats.*, categories.nom AS type, cuisiniers.nom AS cuisinier
                           FROM plats
                           JOIN categories ON plats.type_id = categories.id
                           JOIN cuisiniers ON plats.cuisinier_id = cuisiniers.id");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Ajouter un plat
function createPlat($nom, $type_id, $description, $cuisinier_id)
{
    global $pdo;
    $stmt = $pdo->prepare("
        INSERT INTO plats (nom, type_id, description, cuisinier_id)
        VALUES (:nom, :type_id, :description, :cuisinier_id)
    ");
    return $stmt->execute([
        ':nom' => $nom,
        ':type_id' => $type_id,
        ':description' => $description,
        ':cuisinier_id' => $cuisinier_id
    ]);
}

function deletePlat($id)
{
    global $pdo;
    $query = $pdo->prepare("DELETE FROM plats WHERE id = :id");
    return $query->execute([':id' => $id]);
}

function updatePlats($id, $nom, $type_id, $description, $cuisinier_id)
{
    global $pdo;
    $stmt = $pdo->prepare("
        UPDATE plats
        SET nom = :nom, type_id = :type_id, description = :description, cuisinier_id = :cuisinier_id
        WHERE id = :id
    ");
    return $stmt->execute([
        ':id' => $id,
        ':nom' => $nom,
        ':type_id' => $type_id,
        ':description' => $description,
        ':cuisinier_id' => $cuisinier_id
    ]);
}
function getPlatById($id)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM plats WHERE id = :id");
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
