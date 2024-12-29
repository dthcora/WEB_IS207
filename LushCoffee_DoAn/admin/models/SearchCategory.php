<?php
// models/CategoryModel.php

class CategoryModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function searchCategories($query)
    {
        $stmt = $this->conn->prepare('SELECT * FROM categories WHERE category_name LIKE ?');
        $searchTerm = "%" . $query . "%";
        $stmt->bind_param('s', $searchTerm);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
