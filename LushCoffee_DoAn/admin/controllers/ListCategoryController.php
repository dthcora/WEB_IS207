<?php
require_once __DIR__ . '/../models/ListCategory.php';

class ListCategoryController {
    private $categoryModel;

    public function __construct($db) {
        $this->categoryModel = new ListCategory($db);
    }

    public function displayCategories() {
        $categories = $this->categoryModel->getAllCategories(); // Lấy danh sách danh mục từ model
        include __DIR__ . '/../views/listcategoryView.php'; // Gọi view để hiển thị
    }
}
?>
