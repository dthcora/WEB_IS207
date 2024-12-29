<?php
session_start();
require_once '../config/connection.php';
require_once '../controllers/RegisterController.php';

$controller = new RegisterController($conn);
$controller->handleRegister();

include '../views/registerView.php';

