<?php
session_start();
require_once '../controllers/BanhController.php';
require_once '../config/connection.php';

$controller = new BanhController($conn);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$products_per_page = 8;
$min_price = null;
$max_price = isset($_POST['max_price']) ? (int)$_POST['max_price'] : null;

$controller->displayPage($page, $products_per_page, $min_price, $max_price);

