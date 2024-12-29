<?php
require_once '../controllers/DeleteProductController.php';
include('../config/connection.php');

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $stmt = $conn->prepare('DELETE FROM products WHERE product_id = ?');
    $stmt->bind_param('i', $product_id);
    if ($stmt->execute()) {
        header('location:list-product.php?message=Product deleted successfully');
    } else {
        header('location:list-product.php?error=Error deleting product');
    }
}
