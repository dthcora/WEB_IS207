<?php
session_start();
require_once '../config/connection.php'; // File kết nối cơ sở dữ liệu

// Kiểm tra nếu form checkout được gửi
if (isset($_POST['checkout'])) {
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {

        // Thông tin khách hàng
        $customer_name = $_POST['customer_name'];
        $customer_email = $_POST['customer_email'];
        $customer_address = $_POST['customer_address'];

        // Kiểm tra xem các trường thông tin có đầy đủ không
        if (empty($customer_name) || empty($customer_email) || empty($customer_address)) {
            echo "<script>alert('Please fill in all the required fields.'); window.location.href='place_order.php';</script>";
            exit(); // Dừng thực hiện nếu thiếu thông tin
        }

        // Lưu thông tin khách hàng vào bảng `customers`
        $query = "INSERT INTO customers (name, email, address) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $customer_name, $customer_email, $customer_address);
        $stmt->execute();
        $customer_id = $stmt->insert_id;

        // Lưu thông tin đơn hàng vào bảng `orders`
        $order_date = date("Y-m-d H:i:s");
        $order_query = "INSERT INTO orders (customer_id, order_date, status) VALUES (?, ?, 'Pending')";
        $stmt = $conn->prepare($order_query);
        $stmt->bind_param("is", $customer_id, $order_date);
        $stmt->execute();
        $order_id = $stmt->insert_id;

        // Lưu từng sản phẩm trong giỏ hàng vào bảng `order_details`
        $detail_query = "INSERT INTO order_details (order_id, product_id, product_name,product_size_id, product_price, quantity) VALUES (?,?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($detail_query);
        foreach ($_SESSION['cart'] as $item) {
            $stmt->bind_param("iisidi", $order_id, $item['product_id'], $item['product_name'],$item['product_size_id'], $item['product_price'], $item['product_quantity']);
            $stmt->execute();
        }

        // Xóa giỏ hàng và chuyển hướng về trang cảm ơn hoặc trang chính
        unset($_SESSION['cart']);
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Your cart is empty!'); window.location.href='cart.php';</script>";
    }
}

function calculateTotalCart()
{
    $total = 0;
    ;
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $price = $value['product_price'];
            $quantity = $value['product_quantity'];
            $total += ($price * $quantity) ;
        }
        $_SESSION['total'] = $total;
    } else {
        $_SESSION['total'] = 0; // Set total to 0 if the cart is empty
    }
}

?>
<?php
// Kiểm tra nếu user đã đăng nhập
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Truy vấn dữ liệu từ bảng users
    $query = "SELECT user_fullname, user_phone FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        $user_name = $user_data['user_fullname'];
        $user_phone = $user_data['user_phone'];
    } else {
        $user_name = '';
        $user_phone = '';
    }
} else {
    // Nếu user chưa đăng nhập, set giá trị rỗng
    $user_name = '';
    $user_phone = '';
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

<!-- Checkout page -->
<section id="featured" class="my-5 py-5 text-center">
    <div class="container">
        <nav aria-label="breadcrumb" class="custom-breadcrumb">
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
        <?php if (isset($_GET['message'])): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['message'] ?>
            </div>
        <?php endif; ?>

        <form action="place_order.php" method="POST">
            <div class="row">
                <div class="d-flex justify-content-between w-100">
                    <!-- Shipping Address -->
                    <div class="col-md-6">
                        <div class="sub-title">
                            <h3>Địa chỉ giao hàng</h3>
                        </div>

                        <div class="checkout-form shadow-lg border-0">
                            <div class="form-group">
                                <input type="text" class="form-control" id="customer_name" name="customer_name" 
                                value="<?php echo htmlspecialchars($user_name); ?>" placeholder="Họ và tên" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="phone" name="phone" 
                                value="<?php echo htmlspecialchars($user_phone); ?>" placeholder="Số điện thoại" required>
                            </div>
                            <div class="form-group">
                                <textarea name="address" id="address" class="form-control" placeholder="Địa chỉ" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="col-md-5">
                        <div class="sub-title">
                            <h3>TỔNG CỘNG</h3>
                        </div>

                        <div class="cart-summery shadow-lg border-0">
                            <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                                <div class="d-flex justify-content-between pb-2">
                                    <h6><?php echo $value['product_name'] ?> (<?php echo !empty($value['product_size']) ? htmlspecialchars($value['product_size']) : "Không áp dụng"; ?>) x <?php echo $value['product_quantity'] ?></h6>
                                    <h6><?php echo number_format($value['product_price']* $value['product_quantity'], 0, '.', '.') . ' VND'; ?></h6>
                                </div>
                            <?php } ?>

                            <div class="d-flex justify-content-between pb-2">
                                <h6>Phí giao hàng</h6>
                                <h6>0 VND</h6>
                            </div>
                            <div class="d-flex justify-content-between summery-end">
                                <h6>Total</h6>
                                <h6><strong><?php echo number_format($_SESSION['total'], 0, '.', '.') . ' VND'; ?></strong></h6>
                            </div>
                            <button class="btn" name="place_order">Thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include __DIR__ .'/../layouts/footer.php'; ?>

