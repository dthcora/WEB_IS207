<?php
session_start();
require_once '../config/connection.php';
require_once '../controllers/CaPheController.php';

$controller = new CaPheController($conn);
$controller->displayPage();
?>
