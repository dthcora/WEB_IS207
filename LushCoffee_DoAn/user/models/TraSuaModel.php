<?php
class TraSuaModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getTotalProducts($category, $max_price = null) {
        if ($max_price !== null) {
            $stmt = $this->conn->prepare("
                SELECT COUNT(*) as total 
                FROM products 
                JOIN categories ON products.category_id = categories.category_id 
                WHERE categories.category_name = ? 
                AND product_price BETWEEN 5000 AND ?
            ");
            $stmt->bind_param('si', $category, $max_price);
        } else {
            $stmt = $this->conn->prepare("
                SELECT COUNT(*) as total 
                FROM products 
                JOIN categories ON products.category_id = categories.category_id 
                WHERE categories.category_name = ?
            ");
            $stmt->bind_param('s', $category);
        }
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc()['total'];
    }

    public function getProducts($category, $start_from, $products_per_page, $max_price = null) {
        if ($max_price !== null) {
            $stmt = $this->conn->prepare("
                SELECT products.* 
                FROM products 
                JOIN categories ON products.category_id = categories.category_id 
                WHERE categories.category_name = ? 
                AND product_price BETWEEN 5000 AND ?
                LIMIT ? OFFSET ?
            ");
            $stmt->bind_param('siii', $category, $max_price, $products_per_page, $start_from);
        } else {
            $stmt = $this->conn->prepare("
                SELECT products.* 
                FROM products 
                JOIN categories ON products.category_id = categories.category_id 
                WHERE categories.category_name = ?
                LIMIT ? OFFSET ?
            ");
            $stmt->bind_param('sii', $category, $products_per_page, $start_from);
        }
        $stmt->execute();
        return $stmt->get_result();
    }
}

