<?php
require_once __DIR__ . '/../models/all_productModel.php';

class ProductController {
    private $productModel;

    public function __construct($db) {
        $this->productModel = new Product($db);
    }

    public function displayProductsPage() {
        $products_per_page = 16;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start_from = ($page - 1) * $products_per_page;

        $selected_category = isset($_POST['categories']) ? $_POST['categories'] : (isset($_GET['category']) ? $_GET['category'] : null);

        $categories = $this->productModel->getCategories();
        $total_products = $this->productModel->getTotalProducts($selected_category);
        $products = $this->productModel->getProducts($selected_category, $start_from, $products_per_page);
        $total_pages = ceil($total_products / $products_per_page);

        include __DIR__ . '/../views/all_productView.php';
    }
}

