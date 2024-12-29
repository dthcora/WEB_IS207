<?php
require_once '../models/OrderModel.php';

class OrderController {
    private $model;

    public function __construct($db) {
        $this->model = new OrderModel($db);
    }

    public function displayOrderDetails($order_id, $user_id) {
        $orderDetails = $this->model->getOrderDetails($order_id, $user_id);

        if (!$orderDetails) {
            header("Location: my_orders.php");
            exit();
        }

        $orderItems = $this->model->getOrderItems($order_id);

        include '../views/OrderDetailsView.php';
    }
}
?>
