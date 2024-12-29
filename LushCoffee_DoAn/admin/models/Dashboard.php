<?php
class Dashboard {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getTotalOrders() {
        $stmt = $this->conn->query("SELECT COUNT(*) as total_orders FROM orders");
        return $stmt->fetch_assoc()['total_orders'];
    }

    public function getTotalCustomers() {
        $stmt = $this->conn->query("SELECT COUNT(*) as total_customers FROM users");
        return $stmt->fetch_assoc()['total_customers'];
    }

    public function getTotalSales() {
        $stmt = $this->conn->query("SELECT SUM(order_cost) as total_sales FROM orders");
        return $stmt->fetch_assoc()['total_sales'];
    }

    public function getMonthlySales() {
        $stmt = $this->conn->query("
            SELECT MONTH(order_date) as month, SUM(order_cost) as sales 
            FROM orders 
            GROUP BY MONTH(order_date)
            ORDER BY MONTH(order_date)
        ");
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
}
