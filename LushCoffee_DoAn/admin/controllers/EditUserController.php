<?php
require_once '../models/EditUser.php';
require_once '../config/connection.php';

$userModel = new UserModel($conn);

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $users = $userModel->getUserById($user_id);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_user'])) {
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    if ($userModel->updateUser($user_id, $user_name, $user_email, $user_password)) {
        header('Location: ../views/list_users.php?message=User updated successfully');
        exit;
    } else {
        header('Location: ../views/list_users.php?error=Error updating user');
        exit;
    }
}
