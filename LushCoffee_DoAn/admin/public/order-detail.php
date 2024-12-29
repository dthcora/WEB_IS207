<?php
// public/order_details.php

include('../controllers/OrderDetailController.php');

$orderController = new OrderController();

if (isset($_POST['order_id'])) {
    // Fetch order details for a given order ID
    $orderController->fetchOrderDetails($_POST['order_id']);
}

if (isset($_POST['update_status'])) {
    // Update order status
    $orderController->updateOrderStatus($_POST['order_id'], $_POST['order_status']);
}

// Include the view to display the order details
include('../views/orderdetailView.php');
?>
