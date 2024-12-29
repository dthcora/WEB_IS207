<?php
require_once '../models/RegisterModel.php';

class RegisterController {
    private $model;

    public function __construct($conn) {
        $this->model = new RegisterModel($conn);
    }

    public function handleRegister() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
            $username = $_POST['user_name'];
            $fullname = $_POST['fullname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            // Kiểm tra mật khẩu và xác nhận mật khẩu
            if ($password !== $confirm_password) {
                header('Location: register.php?error=Password are not the same');
                exit();
            }

            // Kiểm tra độ dài mật khẩu
            if (strlen($password) < 6) {
                header('Location: register.php?error=Password must be at least 6 characters');
                exit();
            }

            // Kiểm tra email đã tồn tại chưa
            if ($this->model->checkEmailExists($email)) {
                header('Location: register.php?error=Email already exists');
                exit();
            }

            // Tạo tài khoản người dùng mới
            $user_id = $this->model->registerUser($username, $fullname, $phone, $email, $password);
            if ($user_id) {
                session_start();
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_name'] = $username;
                $_SESSION['fullname'] = $fullname;
                $_SESSION['phone'] = $phone;
                $_SESSION['user_email'] = $email;
                $_SESSION['logged_in'] = true;
                header('Location: login.php?status=Đăng ký thành công!');
                exit();
            } else {
                header('Location: register.php?error=Something went wrong');
                exit();
            }
        }
    }
}

