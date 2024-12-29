<?php
require_once '../models/CartModel.php';

class CartController {
    private $model;

    public function __construct() {
        $this->model = new CartModel();
    }

    public function handleCartActions(&$session, $post) {
        if (isset($post['add_to_cart'])) {
            $message = $this->model->addToCart($session, $post);
            if ($message) echo "<script>alert('$message');</script>";
        } elseif (isset($post['remove_product'])) {
            $message = $this->model->removeFromCart($session, $post);
            if ($message) echo "<script>alert('$message');</script>";
        } elseif (isset($post['update_quantity'])) {
            $message = $this->model->updateQuantity($session, $post);
            if ($message) echo "<script>alert('$message');</script>";
        }
        $this->model->calculateTotalCart($session);
    }

    public function displayCart(&$session) {
        include '../views/CartView.php';
    }
}
?>
