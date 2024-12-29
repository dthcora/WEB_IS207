<?php include __DIR__ .'/../layouts/header.php'; ?>
<link rel="stylesheet" href="../assets/css/login.css">

<section class="login-container">
    <h1>ĐĂNG NHẬP</h1>
    <form action="../public/login.php" method="POST">
        <input type="text" placeholder="Email" name="email" class="form-control">
        <input type="password" placeholder="Mật khẩu" name="password" class="form-control">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="checkbox-container">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Ghi nhớ tôi</label>
            </div>
            <a href="#" class="forgot-password">Quên mật khẩu?</a>
        </div>

        <button type="submit" name="login" class="btn btn-primary btn-filter w-100 py-2">ĐĂNG NHẬP</button>

        <p class="register-prompt">Nếu bạn chưa có tài khoản, hãy <a href="register.php">Đăng ký!</a></p>

        <div class="divider">Hoặc</div>
        <button class="btn btn-google">
            <i class="fab fa-google"></i> Đăng nhập bằng Google
        </button>
        <button class="btn btn-facebook">
            <i class="fab fa-facebook"></i> Đăng nhập bằng Facebook
        </button>
    </form>
</section>

<?php include __DIR__ .'/../layouts/footer.php'; ?>

