<?php
session_start();
require_once '../config/connection.php';

// Kiểm tra người dùng đã đăng nhập chưa
if (!isset($_SESSION['logged_in']) || !isset($_SESSION['user_id'])) {
    header('location: checkout.php?message=Please login/register to place an order');
    exit();
} else {
    if (isset($_POST['place_order'])) {

        // Lấy thông tin người dùng từ form
        $name = $_POST['customer_name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        // Kiểm tra thông tin nhập vào có hợp lệ không
        if (empty($name) || empty($phone) || empty($address)) {
            echo "<script>alert('Vui lòng nhập thông tin.'); window.location.href='checkout.php';</script>";
            exit();
        }

        // Kiểm tra định dạng số điện thoại
        if (!preg_match('/^\d{10}$/', $phone)) {
            echo "<script>alert('Vui lòng nhập số điện thoại có 10 số.'); window.location.href='checkout.php';</script>";
            exit();
        }

        // Lấy thông tin từ session
        $user_id = $_SESSION['user_id'];
        $order_status = "Pending";
        $order_cost = $_SESSION['total'];
        $order_date = date('Y-m-d H:i:s');

        // Lưu thông tin đơn hàng vào bảng `orders`
        $stmt = $conn->prepare("INSERT INTO orders (order_cost, order_status, user_id, user_phone, user_address, order_date) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('dsisss', $order_cost, $order_status, $user_id, $phone, $address, $order_date);

        if (!$stmt->execute()) {
            die("Lỗi khi thêm đơn hàng: " . $stmt->error);
        }

        // Lấy ID của đơn hàng vừa thêm
        $order_id = $stmt->insert_id;

        // Đảm bảo rằng bạn lấy dữ liệu đúng từ $_SESSION['cart']
        foreach ($_SESSION['cart'] as $item) {
            $product_id = $item['product_id'];
            $product_name = $item['product_name'];
            $product_price = $item['product_price'];
            $product_quantity = $item['product_quantity'];
            $product_image = $item['product_image'];

            $product_size = $item['product_size'];  // Lấy product_size từ giỏ hàng


            // Kiểm tra số lượng sản phẩm trong kho
            $stmt2 = $conn->prepare("SELECT quantity FROM products WHERE product_id = ?");
            $stmt2->bind_param('i', $product_id);
            $stmt2->execute();
            $stmt2->bind_result($quantity);
            $stmt2->fetch();
            $stmt2->close();

            if ($quantity < $product_quantity) {
                die("Lỗi: Số lượng sản phẩm '$product_name' không đủ trong kho. Chỉ còn $quantity sản phẩm.");
            }

            // Cập nhật số lượng sản phẩm trong kho
            $new_quantity = $quantity - $product_quantity;
            $stmt3 = $conn->prepare("UPDATE products SET quantity = ? WHERE product_id = ?");
            $stmt3->bind_param('ii', $new_quantity, $product_id);
            $stmt3->execute();

            // Lưu thông tin sản phẩm vào bảng `order_items` (chú ý đến product_size)
            $stmt1 = $conn->prepare("INSERT INTO order_items (order_id, product_id, product_quantity, product_size, user_id, order_date, product_price) 
                             VALUES (?, ?, ?, ?, ?, ?, ?)");

            $stmt1->bind_param('iiisssd', $order_id, $product_id, $product_quantity, $product_size, $user_id, $order_date, $product_price);

            if (!$stmt1->execute()) {
                die("Lỗi khi thêm sản phẩm vào order_items: " . $stmt1->error);
            }
        }

        // Xóa giỏ hàng sau khi đặt hàng thành công
        unset($_SESSION['cart']);

        // Chuyển hướng về trang thanh toán hoặc thông báo thành công
        header("Location: payment.php?order_status=" . urlencode("Thanh toán thành công"));
        exit();
    }
}
?>
