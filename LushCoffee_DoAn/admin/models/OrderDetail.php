<?php
// models/Order.php

include('../config/connection.php');

class Order
{
    // Get order details
    public static function getOrderDetails($order_id)
    {
        global $conn;
        $stmt = $conn->prepare('SELECT o.*, u.* FROM orders o
                                INNER JOIN users u ON o.user_id = u.user_id
                                WHERE o.order_id = ?');
        $stmt->bind_param('i', $order_id);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Get order items
    public static function getOrderItems($order_id)
    {
        global $conn;
        $stmt1 = $conn->prepare("SELECT p.product_name, p.product_price, oi.product_quantity, oi.product_size FROM order_items oi 
                                 INNER JOIN products p ON oi.product_id = p.product_id WHERE oi.order_id = ?");
        $stmt1->bind_param('i', $order_id);
        $stmt1->execute();
        return $stmt1->get_result();
    }

    // Update order status
    public static function updateOrderStatus($order_id, $order_status)
    {
        global $conn;
        $stmt2 = $conn->prepare("UPDATE orders SET order_status = ? WHERE order_id = ?");
        $stmt2->bind_param('si', $order_status, $order_id);
        return $stmt2->execute();
    }
}
?>
