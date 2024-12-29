<?php
// controllers/CategoryController.php
include('../models/SearchCategoryModel.php');
include('../config/connection.php');

class CategoryController
{
    private $categoryModel;

    public function __construct($conn)
    {
        $this->categoryModel = new CategoryModel($conn);
    }

    public function search()
    {
        if (isset($_GET['query_admin'])) {
            $query = $_GET['query_admin'];
            $categories = $this->categoryModel->searchCategories($query);
            include('../views/searchcatehoryView.php');
        } else {
            header("Location: list-category.php");
            exit();
        }
    }
}

// Khởi tạo controller và gọi phương thức tìm kiếm
$controller = new CategoryController($conn);
$controller->search();
?>
