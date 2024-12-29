<?php

class UserModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Function to check if the email exists
    public function emailExists($email) {
        $stmt = $this->conn->prepare('SELECT COUNT(*) FROM users WHERE user_email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        return $count > 0;
    }

    // Function to create a new user
    public function createUser($data) {
        // Check if the email already exists
        if ($this->emailExists($data['email'])) {
            return false;  // Email already exists
        }

        $stmt = $this->conn->prepare('
            INSERT INTO users (user_name, user_email, user_password, user_fullname, user_phone) 
            VALUES (?, ?, ?, ?, ?)
        ');

        if ($stmt === false) {
            die('Error preparing statement: ' . $this->conn->error);
        }

        // Bind parameters (s = string)
        $stmt->bind_param('sssss', $data['name'], $data['email'], $data['password'], $data['full_name'], $data['phone']);

        return $stmt->execute();
    }
}
