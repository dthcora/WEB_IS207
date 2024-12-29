<?php
require_once '../config/connection.php';
require_once '../models/ProductModel.php';

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $productModel = new ProductModel($conn);
    if ($productModel->deleteProduct($product_id)) {
        header('location:../public/list_products.php?message=Product deleted successfully');
    } else {
        header('location:../public/list_products.php?error=Error deleting product');
    }
} else {
    // Handle the case where product_id is not provided
    header('location:../public/list_products.php?error=Invalid request'); 
}