<?php
require_once '../models/CheckOutModel.php';

class CheckOutController {
    private $model;

    public function __construct($conn) {
        $this->model = new OrderModel($conn);
    }

    public function processCheckout($postData, $cart) {
        if (empty($cart) || count($cart) == 0) {
            header("Location: ../public/cart.php?error=Your cart is empty!");
            exit();
        }

        // Validate input
        if (empty($postData['customer_name']) || empty($postData['customer_email']) || empty($postData['customer_address'])) {
            header("Location: ../public/place_order.php?error=Please fill all required fields.");
            exit();
        }

        // Add customer
        $customer_id = $this->model->addCustomer(
            $postData['customer_name'],
            $postData['customer_email'],
            $postData['customer_address']
        );

        // Add order
        $order_id = $this->model->addOrder($customer_id);

        // Add order details
        $this->model->addOrderDetails($order_id, $cart);

        // Clear cart
        unset($_SESSION['cart']);
        header("Location: ../public/thank_you.php");
    }
}
