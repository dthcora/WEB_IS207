<?php

class UserModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllUsers() {
        $stmt = $this->conn->prepare('SELECT * FROM users');
        $stmt->execute();
        return $stmt->get_result();
    }
}
