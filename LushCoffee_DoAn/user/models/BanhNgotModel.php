<?php
class BanhNgotModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getTotalProducts($categories, $max_price = null) {
        if ($max_price !== null) {
            $stmt = $this->conn->prepare("
                SELECT COUNT(*) as total 
                FROM products 
                JOIN categories ON products.category_id = categories.category_id 
                WHERE categories.category_name = ? 
                AND product_price BETWEEN 5000 AND ?
            ");
            $stmt->bind_param('si', $categories[0], $max_price);
        } else {
            $stmt = $this->conn->prepare("
                SELECT COUNT(*) as total 
                FROM products 
                JOIN categories ON products.category_id = categories.category_id 
                WHERE categories.category_name = ?
            ");
            $stmt->bind_param('s', $categories[0]);
        }
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc()['total'];
    }

    public function getProducts($categories, $start_from, $products_per_page, $max_price = null) {
        if ($max_price !== null) {
            $stmt = $this->conn->prepare("
                SELECT products.* 
                FROM products 
                JOIN categories ON products.category_id = categories.category_id 
                WHERE categories.category_name = ? 
                AND product_price BETWEEN 5000 AND ?
                LIMIT ? OFFSET ?
            ");
            $stmt->bind_param('siii', $categories[0], $max_price, $products_per_page, $start_from);
        } else {
            $stmt = $this->conn->prepare("
                SELECT products.* 
                FROM products 
                JOIN categories ON products.category_id = categories.category_id 
                WHERE categories.category_name = ?
                LIMIT ? OFFSET ?
            ");
            $stmt->bind_param('sii', $categories[0], $products_per_page, $start_from);
        }
        $stmt->execute();
        return $stmt->get_result();
    }
}
