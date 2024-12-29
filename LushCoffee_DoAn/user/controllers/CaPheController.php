<?php
require_once __DIR__ . '/../models/CaPheModel.php';

class CaPheController {
    private $model;

    public function __construct($db) {
        $this->model = new CaPheModel($db);
    }

    public function displayPage() {
        $categories = ['Cà phê', 'Cà phê/Nóng', 'Cà phê/Lạnh'];
        $products_per_page = 8;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start_from = ($page - 1) * $products_per_page;

        $min_price = isset($_POST['min_price']) ? (int)$_POST['min_price'] : null;
        $max_price = isset($_POST['max_price']) ? (int)$_POST['max_price'] : null;

        $total_products = $this->model->getTotalProducts($categories, $min_price, $max_price);
        $products = $this->model->getProducts($categories, $start_from, $products_per_page, $min_price, $max_price);
        $total_pages = ceil($total_products / $products_per_page);

        include __DIR__ . '/../views/CaPheView.php';
    }
}
