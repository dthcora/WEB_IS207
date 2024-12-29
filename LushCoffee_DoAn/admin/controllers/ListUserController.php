<?php
require_once __DIR__ . '/../models/ListUser.php';

class UserController {
    private $userModel;

    public function __construct($conn) {
        $this->userModel = new UserModel($conn);
    }

    public function index() {
        // Fetch all users from the model
        $users = $this->userModel->getAllUsers();

        // Include the view to display the users
        include __DIR__ . '/../views/listuserView.php';
    }
}
