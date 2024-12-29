<?php
class OrderModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getOrderDetails($order_id, $user_id) {
        $sql = "SELECT * FROM orders WHERE order_id = ? AND user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $order_id, $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function getOrderItems($order_id) {
        $sql = "SELECT p.product_name AS product_name, 
                       op.product_quantity AS product_quantity, 
                       (op.product_price * op.product_quantity) AS total_price, 
                       op.product_size AS product_size
                FROM order_items op
                JOIN products p ON op.product_id = p.product_id
                WHERE op.order_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
