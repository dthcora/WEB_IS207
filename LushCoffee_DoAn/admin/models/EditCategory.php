<?php
class EditCategory {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getCategoryById($category_id) {
        $stmt = $this->conn->prepare('SELECT * FROM categories WHERE category_id = ?');
        $stmt->bind_param('i', $category_id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function updateCategory($category_name, $category_id) {
        $stmt = $this->conn->prepare('UPDATE categories SET category_name = ? WHERE category_id = ?');
        $stmt->bind_param('si', $category_name, $category_id);
        return $stmt->execute();
    }
}