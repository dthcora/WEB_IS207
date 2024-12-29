<?php
require_once __DIR__ . '/../models/EditProduct.php';

class ProductController {
    private $productModel;

    public function __construct($conn) {
        $this->productModel = new ProductModel($conn);
    }

    // Handle GET request to fetch product details
    public function getProduct($product_id) {
        return $this->productModel->getProductById($product_id);
    }

    // Handle POST request to update product
    public function updateProduct($data, $uploadedImages) {
        return $this->productModel->updateProduct($data, $uploadedImages);
    }

    // Get all categories
    public function getCategories() {
        return $this->productModel->getCategories();
    }

    // Get all product statuses
    public function getStatusProducts() {
        return $this->productModel->getStatusProducts();
    }
}
