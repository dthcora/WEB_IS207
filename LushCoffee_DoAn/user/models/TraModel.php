<?php
class TraModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }
    public function getTotalProducts($categories, $min_price = null, $max_price = null) {
        if ($min_price !== null && $max_price !== null) {
            $stmt = $this->conn->prepare("
        SELECT COUNT(*) as total 
        FROM products 
        JOIN categories ON products.category_id = categories.category_id 
        WHERE categories.category_name IN (?, ?, ?) 
        AND product_price BETWEEN ? AND ?
    ");
            $stmt->bind_param('sssii', $categories[0], $categories[1], $categories[2], $min_price, $max_price);
        } else {
            $stmt = $this->conn->prepare("
        SELECT COUNT(*) as total 
        FROM products 
        JOIN categories ON products.category_id = categories.category_id 
        WHERE categories.category_name IN (?, ?, ?)
    ");
            $stmt->bind_param('sss', $categories[0], $categories[1], $categories[2]);
        }

        $stmt->execute();
        return $stmt->get_result()->fetch_assoc()['total'];
    }

    public function getProducts($categories, $start_from, $products_per_page, $min_price = null, $max_price = null) {
        if ($min_price !== null && $max_price !== null) {
            $stmt = $this->conn->prepare("
        SELECT products.* 
        FROM products 
        JOIN categories ON products.category_id = categories.category_id 
        WHERE categories.category_name IN (?, ?, ?) 
        AND product_price BETWEEN ? AND ?
        LIMIT ? OFFSET ?
    ");
            $stmt->bind_param(
                'sssiiii',
                $categories[0],
                $categories[1],
                $categories[2],
                $min_price,
                $max_price,
                $products_per_page,
                $start_from
            );
        } else {
            $stmt = $this->conn->prepare("
        SELECT products.* 
        FROM products 
        JOIN categories ON products.category_id = categories.category_id 
        WHERE categories.category_name IN (?, ?, ?)
        LIMIT ? OFFSET ?
    ");
            $stmt->bind_param(
                'sssii',
                $categories[0],
                $categories[1],
                $categories[2],
                $products_per_page,
                $start_from
            );
        }
        $stmt->execute();
        return $stmt->get_result();
    }
}
