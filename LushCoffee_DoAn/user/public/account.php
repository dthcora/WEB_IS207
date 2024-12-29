<?php
require_once '../config/connection.php';
require_once '../controllers/AccountController.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$controller = new AccountController($conn);

if (isset($_GET['logout'])) {
    $controller->logout();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->updateAccount($_POST, $_SESSION['user_id']);
} else {
    $controller->showAccountPage($_SESSION['user_id']);
}
