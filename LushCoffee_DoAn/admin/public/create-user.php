<?php
require_once '../config/connection.php';
require_once '../controllers/CreateUserController.php';

// Initialize controller
$userController = new UserController($conn);

// Handle request
$userController->createUser();
