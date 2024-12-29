<?php
session_start();
require_once '../config/connection.php';
require_once '../controllers/OrdersController.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$controller = new OrdersController($conn);
$controller->displayOrders($user_id);

