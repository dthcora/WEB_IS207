<?php
session_start();
require_once '../controllers/Single_ProductController.php';
require_once '../config/connection.php';

$controller = new Single_ProductController($conn);

$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
$controller->displayProductPage($product_id);

