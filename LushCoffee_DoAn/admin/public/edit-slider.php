<?php
require_once '../config/connection.php';
require_once '../controllers/EditSliderController.php';

$db = new mysqli('localhost', 'root', 'Th@o03112004', 'coffee_shop', '3307');


$sliderController = new SliderController($db);

if (isset($_GET['slider_id'])) {
    $slider_id = $_GET['slider_id'];
    $sliderController->editSlider($slider_id);
} else {
    // Handle invalid request
    header("Location: list_slider.php?error=Invalid request");
    exit;
}
?>