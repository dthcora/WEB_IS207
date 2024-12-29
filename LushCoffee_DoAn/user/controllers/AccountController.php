<?php
require_once '../models/AccountModel.php';

class AccountController {
    private $model;

    public function __construct($db) {
        $this->model = new UserModel($db);
    }

    public function showAccountPage($user_id) {
        $userInfo = $this->model->getUserInfo($user_id);
        include '../views/accountView.php';
    }

    public function updateAccount($data, $user_id) {
        $user_name = $data['user_name'];
        $user_fullname = $data['user_fullname'];
        $user_phone = $data['user_phone'];
        $user_email = $data['email'];
        $old_password = $data['old_password'];
        $new_password = $data['new_password'];
        $confirm_password = $data['confirm_password'];

        // Update user info
        $this->model->updateUserInfo($user_id, $user_name, $user_fullname, $user_phone);

        // Update password if provided
        if (!empty($old_password) && !empty($new_password) && !empty($confirm_password)) {
            if ($new_password !== $confirm_password) {
                header('location:account.php?error=Mật khẩu không khớp');
                exit();
            }

            if (!$this->model->verifyPassword($user_email, $old_password)) {
                header('location:account.php?error=Mật khẩu cũ không đúng!');
                exit();
            }

            $this->model->updatePassword($user_email, $new_password);
        }

        header('location:account.php?message=Cập nhật thành công!');
    }

    public function logout() {
        session_destroy();
        header('location:../public/login.php');
        exit();
    }
}
