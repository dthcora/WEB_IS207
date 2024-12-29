<?php
session_start();
require_once '../config/connection.php'; // Include database connection
require_once '../controllers/LoginController.php';

$loginController = new LoginController($conn);
$loginController->handleLogin();

include '../views/LoginView.php';

