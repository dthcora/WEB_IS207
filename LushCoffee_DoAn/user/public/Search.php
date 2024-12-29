<?php
session_start();
require_once '../controllers/SearchController.php';
require_once '../config/connection.php';

$query = isset($_GET['query']) ? htmlspecialchars($_GET['query']) : '';
$category = isset($_GET['categories']) ? htmlspecialchars($_GET['categories']) : '';
$max_price = isset($_GET['price']) ? intval($_GET['price']) : 55000;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$products_per_page = 8;

$controller = new SearchController($conn);
$controller->handleSearch($query, $category, $max_price, $page, $products_per_page);


