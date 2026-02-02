<?php

require_once __DIR__ . '/../config/pdo.php';

// Récupérer les plats

function getAllPlats() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT plats.*, categories.nom AS type, cuisiniers.nom AS cuisinier
                           FROM plats
                           JOIN categories ON plats.type_id = categories.id
                           JOIN cuisiniers ON plats.cuisinier_id = cuisiniers.id");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Ajouter un plat
function createPlat($nom, $type_id, $description, $cuisinier_id) {
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

    function deletePlat($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM plats WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}