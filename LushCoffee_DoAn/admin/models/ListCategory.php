<?php
class ListCategory {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Lấy danh sách tất cả danh mục
    public function getAllCategories() {
        $stmt = $this->conn->prepare('SELECT * FROM categories');
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
