<?php
class UserModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getUserById($user_id) {
        $stmt = $this->conn->prepare('SELECT * FROM users WHERE user_id = ?');
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function updateUser($user_id, $user_name, $user_email, $user_password) {
        $stmt = $this->conn->prepare('UPDATE users SET user_name = ?, user_email = ?, user_password = ? WHERE user_id = ?');
        $stmt->bind_param('sssi', $user_name, $user_email, $user_password, $user_id);
        return $stmt->execute();
    }
}
