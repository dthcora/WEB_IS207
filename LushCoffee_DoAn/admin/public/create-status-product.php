<?php
require_once '../models/CreateStatusProduct.php';
require_once '../controllers/CreateStatusProductController.php';


$db = new mysqli('localhost', 'root', 'Th@o03112004', 'coffee_shop', '3307');
$controller = new StatusProductController($db);

// Xử lý yêu cầu tạo status sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->createStatusProduct();
} else {
    // Hiển thị form tạo mới status sản phẩm
    $controller->showCreateForm();
}
?>
