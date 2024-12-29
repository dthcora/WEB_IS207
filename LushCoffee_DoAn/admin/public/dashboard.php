<?php
session_start();
require_once '../config/connection.php';
require_once '../controllers/DashboardController.php';

// Check login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// Controller
$dashboardController = new DashboardController($conn);
$dashboardController->displayDashboard();
?>
