<?php
require_once __DIR__ . '/../models/ListOrder.php';

class OrdersController {
    private $ordersModel;

    public function __construct($db) {
        $this->ordersModel = new OrdersModel($db);
    }

    public function handleDeleteAllOrders() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $success = $this->ordersModel->deleteAllOrders();
            $message = $success ? "All orders have been deleted." : "No orders found to delete.";
            header("Location: list-order.php?message=" . urlencode($message));
            exit;
        }
    }

    public function displayOrders($page, $limit) {
        $totalOrders = $this->ordersModel->getTotalOrders();
        $totalPages = ceil($totalOrders / $limit);
        $offset = ($page - 1) * $limit;
        $orders = $this->ordersModel->getOrders($offset, $limit);

        include __DIR__ . '/../views/listorderView.php';
    }
}
?>
