<?php
include_once('../models/CreateStatusProduct.php');
require_once('../config/connection.php'); // Kết nối cơ sở dữ liệu
class StatusProductController {

    private $statusProductModel;

    public function __construct($db) {
        $this->statusProductModel = new StatusProductModel($db);
    }

    // Hiển thị form tạo sản phẩm
    public function showCreateForm() {
        include('../views/createstatusproductView.php');
    }

    // Xử lý việc tạo sản phẩm mới
    public function createStatusProduct() {
        // Lấy dữ liệu từ POST
        if (isset($_POST['create_status_products'])) {
            $status_products_name = trim($_POST['status_products_name']);

            // Kiểm tra dữ liệu hợp lệ
            if (!empty($status_products_name)) {
                $isCreated = $this->statusProductModel->addStatusProduct($status_products_name);

                if ($isCreated) {
                    header('Location: list-status-product.php?message=Status product added successfully');
                } else {
                    header('Location: create-status-product.php?error=Error adding status product');
                }
            } else {
                header('Location: create_status_products.php?error=Please enter a valid name');
            }
        }
    }
}
?>
