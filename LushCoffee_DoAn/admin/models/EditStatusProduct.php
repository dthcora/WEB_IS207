<?php
class StatusProductsModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getStatusProductById($status_products_id) {
        $stmt = $this->db->prepare('SELECT * FROM status_products WHERE status_products_id = ?');
        $stmt->bind_param('i', $status_products_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $status_products = $result->fetch_assoc();
        return $status_products;
    }

    public function updateStatusProduct($status_products_id, $status_products_name) {
        $stmt = $this->db->prepare('UPDATE status_products SET status_products_name = ? WHERE status_products_id = ?');
        $stmt->bind_param('si', $status_products_name, $status_products_id);
        return $stmt->execute();
    }
}
?>