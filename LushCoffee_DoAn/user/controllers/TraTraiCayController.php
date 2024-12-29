<?php
require_once '../models/TraTraiCayModel.php';

class TraTraiCayController {
    private $model;

    public function __construct($db) {
        $this->model = new TraTraiCayModel($db);
    }

    public function displayPage($page, $products_per_page, $max_price = null) {
        $category = 'Trà/Trái cây';
        $start_from = ($page - 1) * $products_per_page;

        $total_products = $this->model->getTotalProducts($category, $max_price);
        $products = $this->model->getProducts($category, $start_from, $products_per_page, $max_price);
        $total_pages = ceil($total_products / $products_per_page);

        include '../views/TraTraiCayView.php';
    }
}