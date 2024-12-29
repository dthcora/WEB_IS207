<?php
class CheckOutModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addCustomer($name, $email, $address) {
        $query = "INSERT INTO customers (name, email, address) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $name, $email, $address);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function addOrder($customer_id) {
        $order_date = date("Y-m-d H:i:s");
        $query = "INSERT INTO orders (customer_id, order_date, status) VALUES (?, ?, 'Pending')";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("is", $customer_id, $order_date);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function addOrderDetails($order_id, $cart) {
        $query = "INSERT INTO order_details (order_id, product_id, product_size, product_price, product_quantity) VALUES ( ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        foreach ($cart as $item) {
            $stmt->bind_param("iisdi", $order_id, $item['product_id'], $item['product_size'], $item['product_price'], $item['product_quantity']);
            $stmt->execute();
        }
    }
}
