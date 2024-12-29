<?php
require_once '../models/BanhManModel.php';

class BanhManController {
    private $model;

    public function __construct($db) {
        $this->model = new BanhManModel($db);
    }

    public function displayPage($page, $products_per_page, $max_price = null) {
        $categories = ['Bánh/Mặn'];
        $start_from = ($page - 1) * $products_per_page;

        $total_products = $this->model->getTotalProducts($categories, $max_price);
        $products = $this->model->getProducts($categories, $start_from, $products_per_page, $max_price);
        $total_pages = ceil($total_products / $products_per_page);

        include '../views/BanhManView.php';
    }
}

