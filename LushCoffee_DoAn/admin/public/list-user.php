<?php
session_start();
require_once '../config/connection.php';
require_once '../controllers/ListUserController.php';

// Instantiate the UserController
$userController = new UserController($conn);

// Call the index method to display the user list
$userController->index();
