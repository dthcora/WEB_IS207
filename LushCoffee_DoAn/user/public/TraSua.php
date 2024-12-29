<?php
session_start();
require_once '../controllers/TraSuaController.php';
require_once '../config/connection.php';

$controller = new TraSuaController($conn);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$products_per_page = 8;
$max_price = isset($_POST['max_price']) ? (int)$_POST['max_price'] : null;

$controller->displayPage($page, $products_per_page, $max_price);
