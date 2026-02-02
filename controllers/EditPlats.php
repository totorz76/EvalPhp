<?php
session_start();
if (!isset($_SESSION['cuisinier_id'])) {
    header('Location: ?page=Login');
    exit;
}