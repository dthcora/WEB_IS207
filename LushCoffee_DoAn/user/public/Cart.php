<?php
require_once '../controllers/CartController.php';

session_start();

$controller = new CartController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->handleCartActions($_SESSION, $_POST);
}

$controller->displayCart($_SESSION);
?>


