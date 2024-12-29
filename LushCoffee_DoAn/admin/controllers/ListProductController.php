<?php
require_once __DIR__ . '/../models/ListProduct.php';

class ProductController {
    private $productModel;

    public function __construct($db) {
        $this->productModel = new Product($db);
    }

    public function displayProducts($page, $limit) {
        $offset = ($page - 1) * $limit;

        // Lấy danh sách sản phẩm
        $products = $this->productModel->getProducts($offset, $limit);

        // Lấy tổng số sản phẩm để tính tổng số trang
        $totalProducts = $this->productModel->getTotalProducts();
        $totalPages = ceil($totalProducts / $limit);

        // Cập nhật trạng thái sản phẩm hết hàng
        $this->productModel->updateZeroQuantityStatus();

        // Gọi view để hiển thị sản phẩm
        include __DIR__ . '/../views/listproductView.php';
    }
}
?>
