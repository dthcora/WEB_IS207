<?php
session_start();
require_once '../config/connection.php';
require_once '../controllers/CreateCategoryController.php';

// Tạo controller và hiển thị trang
$controller = new CategoryController($conn);
$controller->createCategory();