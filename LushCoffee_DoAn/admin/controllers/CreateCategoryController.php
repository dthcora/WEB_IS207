<?php
require_once('../models/CreateCategory.php');

class CategoryController
{
    private $categoryModel;

    public function __construct($db)
    {
        $this->categoryModel = new Category($db);
    }

    public function createCategory()
    {
        if (isset($_POST['create_category'])) {
            $category_name = $_POST['category_name'];
            if ($this->categoryModel->createCategory($category_name)) {
                header('location: ../public/list-category.php?message=Category added successfully');
            } else {
                header('location: ../public/list-category.php?error=Error adding category');
            }
        } 
        include __DIR__ . '/../views/createcategoryView.php';
    }
   
}

?>
