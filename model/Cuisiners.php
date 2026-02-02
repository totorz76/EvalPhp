<?php

require_once __DIR__ . '/../config/pdo.php';

function getAllCuisiniers() {
     global $pdo;
    $stmt = $pdo->prepare ("SELECT * FROM cuisiniers");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}