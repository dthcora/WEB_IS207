<?php
class OrdersModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function deleteAllOrders() {
        $stmt = $this->conn->prepare('DELETE FROM orders');
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function getOrders($offset, $limit) {
        $stmt = $this->conn->prepare('
            SELECT orders.*, users.user_name, users.user_email 
            FROM orders 
            INNER JOIN users ON orders.user_id = users.user_id
            ORDER BY orders.order_id DESC
            LIMIT ?, ?
        ');
        $stmt->bind_param("ii", $offset, $limit);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getTotalOrders() {
        $stmt = $this->conn->prepare('SELECT COUNT(*) AS total FROM orders');
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc()['total'];
    }
}
?>
