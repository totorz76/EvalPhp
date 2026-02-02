<?php

function getAllCategories() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM categories");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}