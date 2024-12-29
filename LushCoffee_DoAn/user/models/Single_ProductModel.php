<?php
class Single_ProductModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getProductById($product_id) {
        $stmt = $this->conn->prepare('
            SELECT p.*, c.category_name 
            FROM products p 
            JOIN categories c ON p.category_id = c.category_id 
            WHERE product_id = ?
        ');
        $stmt->bind_param('i', $product_id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getRelatedProducts($product_id) {
        $stmt = $this->conn->prepare("
            SELECT * 
            FROM products 
            WHERE category_id = (
                SELECT category_id 
                FROM products 
                WHERE product_id = ?
            ) 
            AND product_id != ? 
            LIMIT 4
        ");
        $stmt->bind_param('ii', $product_id, $product_id);
        $stmt->execute();
        return $stmt->get_result();
    }
}

