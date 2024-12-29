<?php
session_start();
require_once '../config/connection.php';
require_once '../controllers/indexController.php';

// Tạo controller
$homeController = new HomeController($conn);
// Hiển thị trang chủ
$homeController->displayHomePage();
?>

