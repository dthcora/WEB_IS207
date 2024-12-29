<?php include __DIR__ .'/../layouts/header.php'; ?>
<link rel="stylesheet" href="../assets/css/userlte.css">
<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #fff  !important;
        margin: 0 !important;
        padding-top: 90px !important;
    }
    /* Đảm bảo bảng có màu chữ hiển thị rõ ràng */
    table {
        width: 100%;
        border-collapse: collapse;
        color: #333; /* Màu chữ chính */
    }

    table th, table td {
        padding: 15px;
        text-align: center;
        border-bottom: 1px solid #ccc;
        font-size: 1rem;
    }

    /* Riêng cho cột Price và Total */
    table td p {
        color: #333; /* Màu chữ rõ ràng cho giá */
        font-weight: normal; /* Bỏ in đậm */
    }

    /* Tổng giá trị */
    .cart-total table {
        width: 100%;
        border-top: 2px solid #ccc;
        margin-top: 20px;
        color: #333;
    }

    .cart-total td {
        padding: 10px 15px;
        font-size: 1.2rem;
        font-weight: bold;
        text-align: right;
    }

    .cart-total table td {
        color: #333; /* Màu chữ đen hoặc màu tối để dễ đọc */
        font-weight: bold;
        font-family: 'Roboto', sans-serif;
    }
    table .remove-btn, .checkout-btn {
        background-color: #5d4037 !important;
        border-radius: 30px !important;
    }
    table .remove-btn:hover, .checkout-btn:hover {
        background-color: #895737 !important;
    }
    .checkout-container .checkout-btn {
        background-color: #5d4037 !important;
        border-radius: 30px !important;
    }
    .checkout-container .checkout-btn:hover {
        background-color: #895737 !important;
    }
    #featured {
        padding: 0px !important;
        margin: 0px !important;
    }
</style>

<section id="featured" class="my-5 py-5 text-center">
    <div class="container">
        <nav aria-label="breadcrumb" class="custom-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">HOME</a></li>
                <li class="breadcrumb-item active" aria-current="page">GIỎ HÀNG</li>
            </ol>
        </nav>
        <h4 class="text-uppercase fs-1">GIỎ HÀNG</h4>
        <hr>
    </div>
</section>

<section class="cart container my-5 pt-5">
    <table class="mt-3 pt-5">
        <tr>
            <th>Sản phẩm</th>
            <th>Size</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Action</th>
            <th>Tổng cộng</th>
        </tr>

        <?php if (isset($session['cart']) && !empty($session['cart'])): ?>
        <?php foreach ($session['cart'] as $key => $value): ?>
        <tr>
            <td>
                <div class="product-info">
                    <img src="../assets/images/<?= $value['product_image']; ?>" alt="<?= $value['product_name']; ?>">
                    <div><p><?= htmlspecialchars($value['product_name']); ?></p></div>
                </div>
            </td>
            <td><?= htmlspecialchars($value['product_size']); ?></td>
            <td>
                <form action="../public/Cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?= $value['product_id']; ?>">
                    <input type="hidden" name="product_size" value="<?= $value['product_size']; ?>">
                    <input type="number" name="product_quantity" value="<?= $value['product_quantity']; ?>" min="1">
                    <button type="submit" name="update_quantity" class="remove-btn">Cập nhật</button>
                </form>
            </td>
            <td><?= number_format($value['product_price'], 0, '.', '.'); ?> VND</td>
            <td>
                <form action="../public/cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?= $value['product_id']; ?>">
                    <input type="hidden" name="product_size" value="<?= $value['product_size']; ?>">
                    <button type="submit" name="remove_product" class="remove-btn">Xóa</button>
                </form>
            </td>
            <td><?= number_format($value['product_price'] * $value['product_quantity'], 0, '.', '.'); ?> VND</td>
        </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">Giỏ hàng của bạn đang trống!</td>
            </tr>
        <?php endif; ?>
    </table>

    <?php if (isset($session['cart']) && !empty($session['cart'])): ?>
        <div class="cart-total">
            <table>
                <tr>
                    <td>Total</td>
                    <td><?= number_format($session['total'], 0, '.', '.'); ?> VND</td>
                </tr>
            </table>
        </div>

        <div class="checkout-container">
            <form action="checkout.php" method="POST">
                <button class="checkout-btn rounded-2 text-uppercase text-white" name="check-out">Thanh toán</button>
            </form>
        </div>
    <?php endif; ?>
</section>

<?php include __DIR__ .'/../layouts/footer.php'; ?>