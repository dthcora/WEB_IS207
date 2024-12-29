<?php
session_start();
require_once '../config/connection.php';
require_once '../controllers/CreateProductController.php';

// Initialize controller
$productController = new ProductController($conn);

// Handle request
$productController->createProduct();
