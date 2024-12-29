<?php
session_start();
require_once '../config/connection.php';
require_once '../controllers/ListCategoryController.php';



// Tạo controller
$categoryController = new ListCategoryController($conn);

// Hiển thị danh sách danh mục
$categoryController->displayCategories();
?>
