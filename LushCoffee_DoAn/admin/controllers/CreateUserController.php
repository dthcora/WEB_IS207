<?php
require_once '../models/CreateUser.php';
require_once '../config/connection.php';

class UserController {
    private $userModel;

    public function __construct($conn) {
        $this->userModel = new UserModel($conn);
    }

    public function createUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_user'])) {
            // Prepare data from form
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'full_name' => $_POST['full_name'],
                'phone' => $_POST['phone'],
            ];

            // Check if the email exists
            if (!$this->userModel->createUser($data)) {
                // Email already exists, redirect with an error message
                header('Location: create-user.php?error=Email already exists');
                exit;
            }

            // Create user
            header('Location: list-user.php?message=User added successfully');
            exit;
        }
        // Load the view to show the form
        include __DIR__ . '/../views/createuserView.php';
    }
}

