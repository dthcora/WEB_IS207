<?php

class ProductModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createProduct($data) {
        $stmt = $this->conn->prepare('
            INSERT INTO products 
            (product_name, category_id, status_products_id, product_description, product_image, product_price, quantity)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ');

        if ($stmt === false) {
            die('Error preparing statement: ' . $this->conn->error);
        }

        $stmt->bind_param(
            "siisddd", 
            $data['product_name'],
            $data['product_category'],
            $data['product_status'],
            $data['product_description'],
            $data['product_image'],
            $data['product_price'],
            $data['quantity']
        );

        return $stmt->execute();
    }

    public function getCategories() {
        return $this->conn->query('SELECT category_id, category_name FROM categories');
    }

    public function getStatuses() {
        return $this->conn->query('SELECT status_products_id, status_products_name FROM status_products');
    }
}
