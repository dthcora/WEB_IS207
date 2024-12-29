<?php
require_once __DIR__ . '/../models/Dashboard.php';

class DashboardController {
    private $dashboardModel;

    public function __construct($db) {
        $this->dashboardModel = new Dashboard($db);
    }

    public function displayDashboard() {
        $totalOrders = $this->dashboardModel->getTotalOrders();
        $totalCustomers = $this->dashboardModel->getTotalCustomers();
        $totalSales = $this->dashboardModel->getTotalSales();
        $monthlySales = $this->dashboardModel->getMonthlySales();

        // Format data for charts
        $months = array_map(function ($row) {
            return date('F', mktime(0, 0, 0, $row['month'], 10));
        }, $monthlySales);
        $salesData = array_column($monthlySales, 'sales');

        include __DIR__ . '/../views/dashboardView.php';
    }
}
