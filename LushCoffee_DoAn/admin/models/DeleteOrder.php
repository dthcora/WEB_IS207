<?php
class OrderModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function deleteAllOrders() {
        $stmt = $this->conn->prepare('DELETE FROM orders');
        $stmt->execute();
        return $stmt->affected_rows;
    }
}
?>
