<?php
require_once '../models/TraModel.php';

class TraController {
    private $model;

    public function __construct($db) {
        $this->model = new TraModel($db);
    }

    public function displayPage($page, $products_per_page, $min_price = null, $max_price = null) {
        $categories = ['Trà', 'Trà/Trái cây', 'Trà/Trà sữa'];
        $start_from = ($page - 1) * $products_per_page;

        $total_products = $this->model->getTotalProducts($categories, $min_price, $max_price);
        $products = $this->model->getProducts($categories, $start_from, $products_per_page, $min_price, $max_price);
        $total_pages = ceil($total_products / $products_per_page);

        include '../views/TraView.php';
    }
}

