<?php
require_once '../models/DeleteStatusProduct.php';


$statusproductModel = new StatusProductModel($conn);

if (isset($_GET['status_products_id'])) {
    $status_product_id = $_GET['status_products_id'];

    if ($statusproductModel->deleteStatusProduct($status_product_id)) {
        header("Location: ../public/list-status-product.php?message=Status product deleted successfully");
        exit;
    } else {
        header("Location: ../public/list-status-product.php?error=Error deleting status product");
        exit;
    }
}
