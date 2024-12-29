<?php
session_start();
require_once '../config/connection.php';
require_once '../controllers/EditCategoryController.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

$db = new mysqli('localhost', 'root', 'Th@o03112004', 'coffee_shop', '3307');
$editcategoryController = new EditCategoryController($db);

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $category = $editcategoryController->getCategory($category_id);
    include __DIR__ . '/../views/editCategoryView.php';
} elseif (isset($_POST['update_category'])) {
    $category_name = $_POST['category_name'];
    $category_id = $_POST['category_id'];

    if ($editcategoryController->updateCategory($category_name, $category_id)) {
        header("Location: list-category.php?message=Category updated successfully");
    } else {
        header("Location: list-category.php?error=Error updating category");
    }
}