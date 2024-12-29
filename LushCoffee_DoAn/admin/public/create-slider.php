<?php
// Tải các tệp cần thiết
require_once '../models/CreateSlider.php';
require_once '../controllers/CreateSliderController.php';

// Kết nối cơ sở dữ liệu trực tiếp
$db = new mysqli('localhost', 'root', 'Th@o03112004', 'coffee_shop', '3307');


// Tạo instance của SliderController
$sliderController = new SliderController($db);

$error = null;
$success_message = null;

// Xử lý yêu cầu POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $slider_name = $_POST['slider_name'];
    $slider_image_tmp = $_FILES['slider_image']['tmp_name'];
    $slider_image_name = $_FILES['slider_image']['name'];

    $result = $sliderController->createSlider($slider_name, $slider_image_tmp, $slider_image_name);

    if ($result['success']) {
        $success_message = $result['message'];
    } else {
        $error = $result['message'];
    }
}

// Hiển thị giao diện
include '../views/createsliderView.php';
?>
