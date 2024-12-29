<?php
session_start();
require_once '../config/connection.php';
require_once '../controllers/OrderController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new CheckOutController($conn);
    $controller->processCheckout($_POST, $_SESSION['cart']);
}
?>
<?php include __DIR__ .'/../layouts/header.php'; ?>
<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .checkout-page {
        background-color: #ffffff;
        padding-top: 0px !important;
    }

    .breadcrumb {
        background-color: #f8f9fa;
        font-size: 14px;
    }

    h2, h3 {
        font-weight: 600;
        color: #333;
    }

    .sub-title h3 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .checkout-form, .cart-summery {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .checkout-form .form-control {
        border-radius: 5px;
        margin-bottom: 15px;
        padding: 12px;
        font-size: 16px;
        border: 1px solid #ddd;
        transition: border-color 0.3s ease;
    }

    .checkout-form .form-control:focus {
        border-color:#7e8a6d;
    }

    .cart-summery h6 {
        font-size: 16px;
        color: #555;
    }

    .cart-summery .summery-end h6 {
        font-weight: 600;
        font-size: 18px;
        color: #000;
    }

    .cart-summery .btn {
        width: 100%;
        background-color: #523F31;
        border-color: #523F31;
        padding: 15px;
        font-size: 18px;
        font-weight: bold;
        border-radius: 30px;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .cart-summery .btn:hover {
        background-color: #876b5d;
        border-color: #876b5d;
        color: #efebe9;
    }

    .row {
        margin-top: 20px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .checkout-page {
            padding: 20px;
        }

        .d-flex {
            flex-direction: column;
            align-items: flex-start;
        }

        .checkout-form, .cart-summery {
            margin-bottom: 20px;
        }
    }
    #featured {
        padding-top: 54px !important;
        margin: 10px !important;
        padding-bottom: 0px !important;
    }
</style>


<section id="featured" class="my-5 py-5 text-center">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">HOME</a></li>
                <li class="breadcrumb-item"><a href="cart.php">GIỎ HÀNG</a></li>
                <li class="breadcrumb-item active" aria-current="page">THANH TOÁN</li>
            </ol>
        </nav>
        <h4 class="text-uppercase fs-1">THANH TOÁN</h4>
        <hr>
    </div>
</section>

<section class="checkout-page my-5 py-5">
    <div class="container">
        <form action="place_order.php" method="POST">
            <div class="row">
                <!-- Shipping Address -->
                <div class="col-md-6">
                    <h3>Địa chỉ giao hàng</h3>
                    <div class="checkout-form shadow-lg border-0">
                        <div class="form-group">
                            <input type="text" class="form-control" name="customer_name" placeholder="Họ và tên" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" required>
                        </div>
                        <div class="form-group">
                            <textarea name="customer_address" class="form-control" placeholder="Địa chỉ" required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-md-6">
                    <h3>TỔNG CỘNG</h3>
                    <div class="cart-summery shadow-lg border-0">
                        <?php foreach ($_SESSION['cart'] as $key => $item): ?>
                            <div class="d-flex justify-content-between pb-2">
                                <h6><?= htmlspecialchars($item['product_name']) ?> x <?= $item['product_quantity'] ?></h6>
                                <h6><?= number_format($item['product_price']* $value['product_quantity'], 0, '.', '.') ?> VND</h6>
                            </div>
                        <?php endforeach; ?>
                        <div class="d-flex justify-content-between">
                            <h6>Total</h6>
                            <h6><strong><?= number_format($_SESSION['total'], 0, '.', '.') ?> VND</strong></h6>
                        </div>
                        <button class="btn btn-primary w-100 mt-4" name="place_order">Thanh toán</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include __DIR__ .'/../layouts/footer.php'; ?>
