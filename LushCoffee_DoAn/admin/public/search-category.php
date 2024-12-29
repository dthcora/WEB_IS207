<?php
// public/index.php

// Tải file khởi tạo cần thiết
include('../config/connection.php');

// Lấy action từ URL (mặc định là home)
$action = isset($_GET['action']) ? $_GET['action'] : 'home';

// Điều phối yêu cầu đến controller tương ứng
switch ($action) {
    case 'search':
        include('../app/controllers/SearchCategoryController.php');
        break;
    default:
        header("Location: ../list-category.php");
        exit();
}
?>
