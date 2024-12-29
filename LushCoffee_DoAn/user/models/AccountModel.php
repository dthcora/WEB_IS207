<?php
class UserModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getUserInfo($user_id) {
        $stmt = $this->conn->prepare("SELECT user_name, user_fullname, user_phone, user_email FROM users WHERE user_id = ?");
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateUserInfo($user_id, $user_name, $user_fullname, $user_phone) {
        $stmt = $this->conn->prepare("UPDATE users SET user_name = ?, user_fullname = ?, user_phone = ? WHERE user_id = ?");
        $stmt->bind_param('sssi', $user_name, $user_fullname, $user_phone, $user_id);
        return $stmt->execute();
    }

    public function updatePassword($user_email, $new_password) {
        $stmt = $this->conn->prepare("UPDATE users SET user_password = ? WHERE user_email = ?");
        $stmt->bind_param('ss', $new_password, $user_email);
        return $stmt->execute();
    }

    public function verifyPassword($user_email, $password) {
        $stmt = $this->conn->prepare("SELECT user_password FROM users WHERE user_email = ?");
        $stmt->bind_param('s', $user_email);
        $stmt->execute();
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        return $password === $hashed_password;
    }
}
