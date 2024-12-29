<?php
session_start();
require_once '../config/connection.php';
require_once '../controllers/CaPheLanhController.php';

$controller = new CaPheLanhController($conn);
$controller->displayPage();
?>

