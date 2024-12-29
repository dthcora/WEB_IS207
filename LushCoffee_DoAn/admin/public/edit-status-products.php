<?php
require_once '../config/connection.php'; // Assuming you have a database configuration file
require_once '../controllers/EditStatusProductController.php';

$conn = new mysqli('localhost', 'root', 'Th@o03112004', 'coffee_shop', '3307');

$statusProductsController = new StatusProductsController($conn);

if (isset($_GET['status_products_id'])) {
    $status_products_id = $_GET['status_products_id'];
    $statusProductsController->editStatusProduct($status_products_id);
} else {
    // Handle invalid request
    header("Location: list_status_products.php?error=Invalid request");
    exit;
}
?>