<?php
require_once '../models/DeleteCategory.php';
require_once '../config/connection.php';

$categoryModel = new CategoryModel($conn);

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];

    if ($categoryModel->deleteCategory($category_id)) {
        header("Location: ../public/list-category.php?message=Category deleted successfully");
        exit;
    } else {
        header("Location: ../public/list-category.php?error=Error deleting category");
        exit;
    }
}
