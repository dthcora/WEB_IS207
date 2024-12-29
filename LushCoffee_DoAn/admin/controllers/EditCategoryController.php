<?php
require_once __DIR__ . '/../models/EditCategory.php';

class EditCategoryController {
    private $categoryModel;

    public function __construct($db) {
        $this->categoryModel = new EditCategory($db);
    }

    public function getCategory($category_id) {
        return $this->categoryModel->getCategoryById($category_id);
    }

    public function updateCategory($category_name, $category_id) {
        return $this->categoryModel->updateCategory($category_name, $category_id);
    }
}