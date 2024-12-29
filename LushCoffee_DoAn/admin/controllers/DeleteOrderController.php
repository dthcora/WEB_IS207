<?php
require_once '../models/DeleteOrder.php';
require_once '../config/connection.php';
session_start();

$orderModel = new OrderModel($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $affectedRows = $orderModel->deleteAllOrders();

    if ($affectedRows > 0) {
        header("Location: ../public/list-order.php?message=All orders have been deleted.");
    } else {
        header("Location: ../public/list-order.php?message=No orders found to delete.");
    }
    exit;
} else {
    header("Location: ../public/list-order.php");
    exit;
}
?>
