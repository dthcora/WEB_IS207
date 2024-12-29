<?php
session_start();
require_once '../config/connection.php';
require_once '../controllers/ListStatusProductController.php';

$limit = 12; // Items per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Instantiate and call the controller
$statusProductController = new StatusProductController($conn);
$statusProductController->displayStatusProducts($page, $limit);
?>
