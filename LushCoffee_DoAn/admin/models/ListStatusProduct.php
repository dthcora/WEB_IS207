<?php

class StatusProductModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllStatusProducts() {
        $sql = "SELECT 
                    ROW_NUMBER() OVER (ORDER BY status_products_id ASC) AS stt,
                    status_products_id,
                    status_products_name
                FROM status_products";
        return $this->conn->query($sql);
    }
}
