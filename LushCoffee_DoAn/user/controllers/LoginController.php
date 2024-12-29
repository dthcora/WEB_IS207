<?php
class LoginController {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function handleLogin() {
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $stmt = $this->conn->prepare("SELECT user_id, user_name, user_email, user_password 
                                          FROM users 
                                          WHERE user_email = ? AND user_password = ? 
                                          LIMIT 1");
            $stmt->bind_param("ss", $email, $password);

            if ($stmt->execute()) {
                $stmt->bind_result($user_id, $user_name, $user_email, $user_password);
                $stmt->store_result();
                if ($stmt->num_rows() == 1) {
                    $stmt->fetch();

                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_name'] = $user_name;
                    $_SESSION['user_email'] = $user_email;
                    $_SESSION['user_password'] = $user_password;
                    $_SESSION['logged_in'] = true;
                    header("location:index.php");
                } else {
                    header("location:../public/login.php?error=Sai email hoặc mật khẩu!");
                }
            }
        }
    }
}

