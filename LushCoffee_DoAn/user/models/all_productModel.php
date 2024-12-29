<?php
class Product {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getCategories() {
        $stmt = $this->conn->prepare("SELECT DISTINCT category_name FROM categories");
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getTotalProducts($category = null) {
        if ($category) {
            $stmt = $this->conn->prepare("
                SELECT COUNT(*) as total 
                FROM products 
                JOIN categories ON products.category_id = categories.category_id 
                WHERE categories.category_name LIKE CONCAT(?, '%')
            ");
            $stmt->bind_param('s', $category);
        } else {
            $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM products");
        }
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc()['total'];
    }

    public function getProducts($category = null, $start_from, $products_per_page) {
        if ($category) {
            $stmt = $this->conn->prepare("
                SELECT products.*, categories.category_name 
                FROM products 
                JOIN categories ON products.category_id = categories.category_id 
                WHERE categories.category_name LIKE CONCAT(?, '%')
                LIMIT ? OFFSET ?
            ");
            $stmt->bind_param('sii', $category, $products_per_page, $start_from);
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM products LIMIT ? OFFSET ?");
            $stmt->bind_param('ii', $products_per_page, $start_from);
        }
        $stmt->execute();
        return $stmt->get_result();
    }
}

