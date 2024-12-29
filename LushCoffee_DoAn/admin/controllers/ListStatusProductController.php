<?php
require_once __DIR__ . '/../models/ListStatusProduct.php';

class StatusProductController {
    private $statusProductModel;

    public function __construct($conn) {
        $this->statusProductModel = new StatusProductModel($conn);
    }

    public function displayStatusProducts($page, $limit) {
        $offset = ($page - 1) * $limit;

        // Lấy danh sách sản phẩm trạng thái
        $statusProducts = $this->statusProductModel->getAllStatusProducts();

        // Gọi view để hiển thị
        include __DIR__ . '/../views/listStatusProductView.php';
    }
}
?>
