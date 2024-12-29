<?php
class Home {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Lấy 5 sản phẩm ngẫu nhiên
    public function getRandomProducts() {
        $stmt = $this->conn->prepare("
            SELECT product_id, product_name, product_price, product_image
            FROM products
            ORDER BY RAND()
            LIMIT 5
        ");
        $stmt->execute();
        return $stmt->get_result();
    }
}

