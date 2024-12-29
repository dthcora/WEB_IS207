<?php
require_once '../models/OrdersModel.php';

class OrdersController {
    private $model;

    public function __construct($conn) {
        $this->model = new OrdersModel($conn);
    }

    public function displayOrders() {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit();
        }

        $user_id = $_SESSION['user_id'];
        $search = $_GET['search'] ?? '';
        $status = $_GET['status'] ?? '';
        $date_from = $_GET['date_from'] ?? '';
        $date_to = $_GET['date_to'] ?? '';
        $sort = $_GET['sort'] ?? 'newest';

        $orders = $this->model->getOrders($user_id, $search, $status, $date_from, $date_to, $sort);

        include '../views/OrdersView.php';
    }
}
