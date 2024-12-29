<?php
class CaPheLanh {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getTotalProducts($max_price = null) {
        if ($max_price) {
            $stmt = $this->conn->prepare("
                SELECT COUNT(*) as total 
                FROM products 
                JOIN categories ON products.category_id = categories.category_id 
                WHERE categories.category_name = 'Cà phê/Lạnh' 
                AND product_price BETWEEN 5000 AND ?
            ");
            $stmt->bind_param('i', $max_price);
        } else {
            $stmt = $this->conn->prepare("
                SELECT COUNT(*) as total 
                FROM products 
                JOIN categories ON products.category_id = categories.category_id 
                WHERE categories.category_name = 'Cà phê/Lạnh'
            ");
        }
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc()['total'];
    }

    public function getProducts($start_from, $products_per_page, $max_price = null) {
        if ($max_price) {
            $stmt = $this->conn->prepare("
                SELECT products.* 
                FROM products 
                JOIN categories ON products.category_id = categories.category_id 
                WHERE categories.category_name = 'Cà phê/Lạnh' 
                AND product_price BETWEEN 5000 AND ? 
                LIMIT ? OFFSET ?
            ");
            $stmt->bind_param('iii', $max_price, $products_per_page, $start_from);
        } else {
            $stmt = $this->conn->prepare("
                SELECT products.* 
                FROM products 
                JOIN categories ON products.category_id = categories.category_id 
                WHERE categories.category_name = 'Cà phê/Lạnh' 
                LIMIT ? OFFSET ?
            ");
            $stmt->bind_param('ii', $products_per_page, $start_from);
        }
        $stmt->execute();
        return $stmt->get_result();
    }
}

