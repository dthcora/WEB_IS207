<?php
require_once '../models/SearchModel.php';

class SearchController {
    private $model;

    public function __construct($db) {
        $this->model = new SearchModel($db);
    }

    public function handleSearch($query, $category, $max_price, $page, $products_per_page) {
        $start_from = ($page - 1) * $products_per_page;

        // Lấy tổng số sản phẩm
        $total_products = $this->model->getTotalProducts($query, $max_price, $category);

        // Lấy danh sách sản phẩm
        $products = $this->model->getProducts($query, $max_price, $category, $products_per_page, $start_from);

        // Tính tổng số trang
        $total_pages = ceil($total_products / $products_per_page);

        // Chuyển sang view hiển thị kết quả
        include '../views/SearchView.php';
    }
}
