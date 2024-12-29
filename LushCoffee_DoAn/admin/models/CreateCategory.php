<?php
class Category
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function createCategory($category_name)
    {
        $stmt = $this->conn->prepare('INSERT INTO categories(category_name) VALUES(?)');
        $stmt->bind_param('s', $category_name);
        return $stmt->execute();
    }
}
?>
