<?php
session_start();
require_once '../config/connection.php';
require_once '../controllers/ListOrderController.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 12;

$ordersController = new OrdersController($conn);
$ordersController->handleDeleteAllOrders();
$ordersController->displayOrders($page, $limit);
?>
