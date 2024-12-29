<?php
class SearchModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getTotalProducts($query, $max_price, $category = null) {
        $sql = "
            SELECT COUNT(*) as total_products
            FROM products
            WHERE product_name LIKE ?
            AND product_price BETWEEN 5000 AND ?
        ";

        if ($category) {
            $sql .= " AND category_name = ?";
        }

        $stmt = $this->conn->prepare($sql);
        $search_query = '%' . $query . '%';

        if ($category) {
            $stmt->bind_param('ssi', $search_query, $max_price, $category);
        } else {
            $stmt->bind_param('si', $search_query, $max_price);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc()['total_products'];
    }

    public function getProducts($query, $max_price, $category, $products_per_page, $start_from) {
        $sql = "
            SELECT 
                product_id, 
                product_name, 
                product_price, 
                product_image
            FROM products
            WHERE product_name LIKE ?
            AND product_price BETWEEN 5000 AND ?
        ";

        if ($category) {
            $sql .= " AND category_name = ?";
        }

        $sql .= " LIMIT ? OFFSET ?";

        $stmt = $this->conn->prepare($sql);
        $search_query = '%' . $query . '%';

        if ($category) {
            $stmt->bind_param('ssiii', $search_query, $max_price, $category, $products_per_page, $start_from);
        } else {
            $stmt->bind_param('siii', $search_query, $max_price, $products_per_page, $start_from);
        }

        $stmt->execute();
        return $stmt->get_result();
    }
}
