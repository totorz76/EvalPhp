<?php
if (!isset($_SESSION['cuisinier_id'])) {
    header('Location: ?page=Login');
    exit;
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    deletePlat($id);
    header('Location: ?page=ListPlats');
    exit;
}