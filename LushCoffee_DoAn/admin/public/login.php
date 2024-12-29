<?php
require_once '../config/connection.php';
require_once '../controllers/LoginController.php';

// Initialize the login controller
$loginController = new LoginController($conn);

// Handle the login request
$loginController->login();
