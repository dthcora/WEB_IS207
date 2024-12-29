<?php
include('../models/OrderDetail.php');
class OrderController
{
    public $order_details = null;
    public $orders = null;

    // Fetch order details
    public function fetchOrderDetails($order_id)
    {
        $this->orders = Order::getOrderDetails($order_id);
        if ($this->orders && $this->orders->num_rows > 0) {
            $this->order_details = Order::getOrderItems($order_id);
        } else {
            echo "Order not found.";
            exit;
        }
    }

    // Handle order status update
    public function updateOrderStatus($order_id, $order_status)
    {
        $valid_status = ['pending', 'shipped', 'delivered', 'cancelled'];
        if (!in_array($order_status, $valid_status)) {
            echo "Invalid status.";
            exit;
        }

        if (Order::updateOrderStatus($order_id, $order_status)) {
            header('location:list_orders.php?message=Order status updated successfully');
            exit;
        } 
    }
}
?>