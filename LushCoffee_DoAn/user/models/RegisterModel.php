<?php
class RegisterModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function checkEmailExists($email) {
        $stmt = $this->conn->prepare('SELECT COUNT(*) FROM users WHERE user_email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->bind_result($num_rows);
        $stmt->fetch();
        $stmt->close();
        return $num_rows > 0;
    }

    public function registerUser($username, $fullname, $phone, $email, $password) {
        $stmt = $this->conn->prepare('INSERT INTO users(user_name, user_email, user_password, user_fullname, user_phone) VALUES (?, ?, ?, ?, ?)');
        $stmt->bind_param('sssss', $username, $email, $password, $fullname, $phone);
        if ($stmt->execute()) {
            return $stmt->insert_id;
        }
        return false;
    }
}

