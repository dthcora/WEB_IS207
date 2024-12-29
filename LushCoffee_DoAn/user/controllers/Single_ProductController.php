<?php
require_once '../models/Single_ProductModel.php';

class Single_ProductController {
    private $model;

    public function __construct($db) {
        $this->model = new Single_ProductModel($db);
    }

    public function displayProductPage($product_id) {
        if ($product_id > 0) {
            $product = $this->model->getProductById($product_id);
            $related_products = $this->model->getRelatedProducts($product_id);

            if ($product->num_rows === 0) {
                echo "<p class='text-center text-danger'>Sản phẩm không tồn tại!</p>";
                exit();
            }

            include '../views/Single_ProductView.php';
        } else {
            header("location: index.php");
            exit();
        }
    }
}

