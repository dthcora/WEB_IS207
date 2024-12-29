<?php
session_start();
require_once '../config/connection.php';
require_once '../controllers/ListProductController.php';

$limit = 12; // Số sản phẩm mỗi trang
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Tạo controller
$productController = new ProductController($conn);
$productController->displayProducts($page, $limit);
?>
