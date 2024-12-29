<?php
class ProductModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Fetch product details by product_id
    public function getProductById($product_id) {
        $stmt = $this->conn->prepare('
            SELECT products.*, categories.category_name, status_products.status_products_name
            FROM products
            INNER JOIN categories ON products.category_id = categories.category_id
            INNER JOIN status_products ON products.status_products_id = status_products.status_products_id
            WHERE product_id = ?'
        );
        $stmt->bind_param('i', $product_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Get all categories for the dropdown
    public function getCategories() {
        $stmt = $this->conn->prepare('SELECT * FROM categories');
        $stmt->execute();
        return $stmt->get_result();
    }

    // Get all status options for the dropdown
    public function getStatusProducts() {
        $stmt = $this->conn->prepare('SELECT * FROM status_products');
        $stmt->execute();
        return $stmt->get_result();
    }

    // Update product in the database
    public function updateProduct($data, $uploadedImages) {
        $stmt = $this->conn->prepare('UPDATE products 
            SET product_name = ?, product_price = ?, product_price_discount = ?, product_description = ?, product_color = ?, category_id = ?, status_products_id = ?, product_image = ?, product_image2 = ?, product_image3 = ?, product_image4 = ?, quantity = ?
            WHERE product_id = ?');

        $stmt->bind_param(
            'sddssiissssii',
            $data['product_name'], 
            $data['product_price'], 
            $data['product_price_discount'], 
            $data['product_description'], 
            $data['product_color'], 
            $data['product_category'], 
            $data['product_status'], 
            $uploadedImages['product_image'], 
            $uploadedImages['product_image2'], 
            $uploadedImages['product_image3'], 
            $uploadedImages['product_image4'], 
            $data['quantity'], 
            $data['product_id']
        );

        return $stmt->execute();
    }
}
