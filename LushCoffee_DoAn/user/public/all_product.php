<?php
session_start();
require_once '../config/connection.php';
require_once '../controllers/all_productController.php';

// Tạo controller và hiển thị trang
$controller = new ProductController($conn);
$controller->displayProductsPage();


