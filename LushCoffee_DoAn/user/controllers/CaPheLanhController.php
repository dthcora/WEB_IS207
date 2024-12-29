<?php
require_once __DIR__ . '/../models/CaPheLanhModel.php';

class CaPheLanhController {
    private $model;

    public function __construct($db) {
        $this->model = new CaPheLanh($db);
    }

    public function displayPage() {
        $products_per_page = 8;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start_from = ($page - 1) * $products_per_page;

        $max_price = isset($_POST['max_price']) ? (int)$_POST['max_price'] : null;

        $total_products = $this->model->getTotalProducts($max_price);
        $products = $this->model->getProducts($start_from, $products_per_page, $max_price);
        $total_pages = ceil($total_products / $products_per_page);

        include __DIR__ . '/../views/CaPheLanhView.php';
    }
}
