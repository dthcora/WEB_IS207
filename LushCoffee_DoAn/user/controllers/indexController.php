<?php
require_once __DIR__ . '/../models/indexModel.php';
class HomeController {
    private $homeModel;

    public function __construct($db) {
        $this->homeModel = new Home($db);
    }

    public function displayHomePage() {
        $products = $this->homeModel->getRandomProducts(); // Lấy sản phẩm từ Model
        include __DIR__ . '/../views/indexView.php'; // Gọi View
    }
}
