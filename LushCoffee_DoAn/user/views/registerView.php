<?php include __DIR__ .'/../layouts/header.php'; ?>
<link rel="stylesheet" href="../assets/css/register.css">

<section class="register-container">
    <h1>ĐĂNG KÝ</h1>
    <form id="register-form" action="../public/register.php" method="POST">
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger" role="alert">
                <p><?php echo $_GET['error']; ?></p>
            </div>
        <?php endif; ?>

        <div class="form-row">
            <input type="text" placeholder="Tên tài khoản" id="user_name" name="user_name" class="form-control" required>
            <input type="text" placeholder="Họ và tên" id="fullname" name="fullname" class="form-control" required>
        </div>

        <div class="form-row">
            <input type="text" placeholder="Số điện thoại" id="phone" name="phone" class="form-control" required>
            <input type="email" placeholder="Email" id="email" name="email" class="form-control" required>
        </div>

        <div class="form-row">
            <input type="password" placeholder="Mật khẩu" id="password" name="password" class="form-control" required>
            <input type="password" placeholder="Xác nhận mật khẩu" id="confirm_password" name="confirm_password" class="form-control" required>
        </div>

        <div class="checkbox-container">
            <input type="checkbox" id="terms" name="terms" required>
            <label for="terms">Tôi đã đọc và đồng ý với <a href="#">Điều khoản dịch vụ</a> và <a href="#">Chính sách bảo mật</a>.</label>
        </div>

        <button type="submit" name="register" class="btn btn-primary w-100">TẠO TÀI KHOẢN</button>
    </form>

    <div class="auth-footer">
        Nếu bạn đã có tài khoản, hãy <a href="login.php">Đăng nhập!</a>
    </div>
</section>

<?php include __DIR__ .'/../layouts/footer.php'; ?>

