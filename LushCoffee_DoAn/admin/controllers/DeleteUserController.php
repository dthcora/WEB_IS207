<?php
require_once '../models/DeleteUser.php';
require_once '../config/connection.php';

$userModel = new UserModel($conn);

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    if ($userModel->deleteUser($user_id)) {
        header("Location: ../public/list-user.php?message=User deleted successfully");
        exit;
    } else {
        header("Location: ../public/list-user.php?error=Error deleting User");
        exit;
    }
}
