<?php
class OrdersModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getOrders($user_id, $search, $status, $date_from, $date_to, $sort) {
        $sql = "SELECT * FROM orders WHERE user_id = ?";
        $params = [$user_id];
        $types = "i";

        if (!empty($search)) {
            $sql .= " AND order_id LIKE ?";
            $params[] = "%$search%";
            $types .= "s";
        }

        if (!empty($status)) {
            $sql .= " AND order_status = ?";
            $params[] = $status;
            $types .= "s";
        }

        if (!empty($date_from)) {
            $sql .= " AND order_date >= ?";
            $params[] = $date_from;
            $types .= "s";
        }

        if (!empty($date_to)) {
            $sql .= " AND order_date <= ?";
            $params[] = $date_to . ' 23:59:59';
            $types .= "s";
        }

        // Sorting logic
        switch ($sort) {
            case 'oldest':
                $sql .= " ORDER BY order_date ASC";
                break;
            case 'highest':
                $sql .= " ORDER BY order_cost DESC";
                break;
            case 'lowest':
                $sql .= " ORDER BY order_cost ASC";
                break;
            default:
                $sql .= " ORDER BY order_date DESC";
        }

        $stmt = $this->conn->prepare($sql);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        $orders = [];
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }

        $stmt->close();
        return $orders;
    }
}
