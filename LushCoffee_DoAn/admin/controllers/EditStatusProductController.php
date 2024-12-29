<?php
require_once '../models/EditStatusProduct.php';

class StatusProductsController {
    private $model;

    public function __construct($db) {
        $this->model = new StatusProductsModel($db);
    }

    public function editStatusProduct($status_products_id) {
        $status_product = $this->model->getStatusProductById($status_products_id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status_products_name = $_POST['status_products_name'];
            $status_products_id = $_POST['status_products_id']; 

            if ($this->model->updateStatusProduct($status_products_id, $status_products_name)) {
                header("location:list-status-product.php?message=Status_products updated successfully");
                exit;
            } else {
                header("location:list-status-product.php?error=Error updating status_products");
                exit;
            }
        }

        require_once '../views/editstatusproductView.php';
    }
}
?>