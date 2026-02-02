<?php

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    deletePlat($id);
    header('Location: ?page=ListPlats');
    exit;
}