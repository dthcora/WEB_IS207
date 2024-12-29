<?php
$servername = "localhost";
$username = "root";  // Tên người dùng MySQL của bạn
$password = "Th@o03112004";      // Mật khẩu MySQL của bạn
$dbname = "coffee_shop";  // Tên cơ sở dữ liệu bạn đã tạo
$port = "3307";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Thiết lập charset để tránh lỗi font tiếng Việt
$conn->set_charset("utf8");
?>

