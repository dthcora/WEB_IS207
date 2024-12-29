<?php
require_once '../config/connection.php';
require_once '../controllers/OrderController.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$order_id = $_GET['order_id'] ?? null;
$user_id = $_SESSION['user_id'];

if (!$order_id) {
    header("Location: my_orders.php");
    exit();
}

$controller = new OrderController($conn);
$controller->displayOrderDetails($order_id, $user_id);
?>
