<?php
session_start();
require_once '../config/connection.php';
require_once '../controllers/ListSliderController.php';

// Initialize the controller
$sliderController = new SliderController($conn);

// Call the index method
$sliderController->index();
