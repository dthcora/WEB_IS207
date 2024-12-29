<?php
session_start();
require_once __DIR__ . '/../models/Login.php';

class LoginController {
    private $adminModel;

    public function __construct($conn) {
        $this->adminModel = new AdminModel($conn);
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = $_POST['admin_email'];
            $password = $_POST['admin_password'];

            // Fetch admin by email
            $admin = $this->adminModel->getAdminByEmail($email);

            if ($admin) {
                // Validate password (not hashed)
                if ($password === $admin['admin_password']) {
                    $_SESSION['admin_name'] = $admin['admin_name'];
                    $_SESSION['admin_email'] = $admin['admin_email'];
                    $_SESSION['logged_in'] = true;
                    header("Location: dashboard.php");
                    exit;
                } else {
                    $error_message = "Mật khẩu không đúng!";
                }
            } else {
                $error_message = "Email không tồn tại!";
            }

            // Pass error message to the view
            include __DIR__ . '/../views/LoginView.php';
        } else {
            // Show the login form if not a POST request
            include __DIR__ . '/../views/loginView.php';
        }
    }
}
