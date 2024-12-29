<?php
session_start();
?>
<?php include __DIR__ .'/../layouts/header.php'; ?>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4 !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        #featured {
            padding-top: 150px !important;
            margin-top: 10px !important;
            padding-bottom: 0px !important;
            background-color: #f4f4f4 !important;
        }
        .return-btn {
            background-color: #523F31 !important;
            border-radius: 30px !important;
            border: none !important;
            font-size: 1.5rem !important;
            padding: 10px !important;
            color: #efebe9 !important;
        }
        .return-btn:hover {
            background-color: #895737 !important;
        }

    </style>
    <section id="featured" class="my-5 py-5 text-center">
        <div class="container">
            <h4 class="text-uppercase fs-1">XÁC NHẬN ĐƠN HÀNG ĐÃ THANH TOÁN</h4>
            <hr class="mx-auto">
            <p class="fs-4">Cảm ơn bạn đã sử dụng sản phẩm của chúng tôi!</p>
        </div>
    </section>
    <!--Checkout page-->

    <section class="my-5 py-5">
        <div class="container text-center mx-auto">

            <h2 class="text-center">Tổng cộng:
                <strong><?php echo number_format($_SESSION['total'], 0, '.', '.') . ' VND'; ?>
                </strong>
            </h2>
            <h2 class="text-center pt-4"><?php if (isset($_GET['order_status'])) {
                    echo $_GET['order_status'];
                } ?></h2>
            <!-- Button to return to homepage -->
            <div class="return-btn-container">
                <a href="all_product.php" class="return-btn">Tiếp tục mua sắm</a>
            </div>
        </div>
    </section>

<?php include __DIR__ .'/../layouts/footer.php'; ?>