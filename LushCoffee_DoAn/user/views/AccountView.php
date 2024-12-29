
<link rel="stylesheet" href="../assets/css/orders.css">
<link rel="stylesheet" href="../assets/css/account.css">
<link rel="stylesheet" href="../assets/css/userlte.css">

<?php include __DIR__ . '/../layouts/header.php'; ?>

<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f4f4f4 !important;
        margin: 0;
        padding: 0;
    }

    section#featured {
        padding: 50px 0;
        background-color: #ffffff; /* Màu nền trắng */
        text-align: center;
        margin-bottom: 30px;
        border-bottom: 2px solid #eee;
    }

    section#featured h4 {
        font-size: 30px;
        font-weight: bold;
        color: #523F31; /* Màu chữ đồng bộ */
    }

    .breadcrumb {
        background-color: #f4f4f4 !important;
        border-radius: 5px;
        font-size: 14px;
        padding: 10px 40px;
        display: inline-block;
    }

    .breadcrumb-item a {
        color: #523F31;
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: #333;
        font-weight: bold;
    }

    #account-panel .nav-link {
        font-weight: bold;
        color: #523F31;
        font-size: 16px;
        padding: 10px 15px;
        border-radius: 20px;
        background-color: #fff;
        transition: background-color 0.3s ease, color 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    #account-panel .nav-link:hover {
        background-color: #f4f4f4;
        color: #333;
    }

    #account-panel .nav-link.active {
        background-color: #523F31;
        color: #fff;
    }

    .account-update-form {
        background-color: #fff;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .account-update-form label {
        font-size: 14px;
        font-weight: bold;
        color: #523F31;
        margin-bottom: 8px;
    }

    .account-update-form .form-control {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 15px;
    }

    .account-update-form .form-control:focus {
        border-color: #523F31;
        box-shadow: none;
    }

    .account-update-form button {
        background-color: #523F31;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        padding: 12px 20px;
        transition: background-color 0.3s ease;
    }

    .account-update-form button:hover {
        background-color: #876b5d;
        color: #fff;
    }

    @media (max-width: 768px) {
        .account-update-form {
            padding: 20px;
        }

        #account-panel .nav-link {
            font-size: 14px;
            padding: 8px 12px;
        }

        section#featured {
            padding: 40px 0;
        }
    }
</style>

<section id="featured" class="my-5 py-5 text-center">
    <div class="container">
        <nav aria-label="breadcrumb" class="custom-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">HOME</a></li>
                <li class="breadcrumb-item active" aria-current="page">TÀI KHOẢN CỦA TÔI</li>
            </ol>
        </nav>
        <h4 class="text-uppercase fs-1">TÀI KHOẢN CỦA TÔI</h4>
        <hr>
        <div class="container">
            <div class="row">
                <div class="account-update col-lg-8 col-md-10 col-sm-12 mx-auto">
                    <!-- Account Menu -->
                    <ul id="account-panel" class="nav nav-pills justify-content-center mb-4">
                        <li class="nav-item">
                            <a href="account.php" class="nav-link active" role="tab">
                                <i class="fas fa-user-alt"></i> Thông tin
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="my_orders.php" class="nav-link" role="tab">
                                <i class="fas fa-shopping-bag"></i> Đơn hàng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="account.php?logout=1" class="nav-link" role="tab">
                                <i class="fas fa-sign-out-alt"></i> Đăng xuất
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #ffffff !important;
        margin: 0;
        padding: 0;
    }

    .custom-form-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 30px;
        background: #ffffff !important;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .custom-form-container h3 {
        text-align: center;
        font-size: 24px;
        color: #523F31;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .custom-form-container label {
        display: block;
        font-size: 14px;
        font-weight: bold;
        color: #523F31;
        margin-bottom: 5px;
    }

    .custom-form-container input {
        width: 100%;
        padding: 10px 15px;
        margin-bottom: 15px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
        transition: all 0.3s ease;
    }

    .custom-form-container input:focus {
        border-color: #523F31;
        background-color: #ffffff;
        box-shadow: 0 0 5px rgba(82, 63, 49, 0.3);
    }

    /* Làm chìm trường email */
    .custom-form-container input[readonly] {
        background-color: #f1f1f1;
        border: 1px solid #ddd;
        color: #888;
        cursor: not-allowed;
    }

    .custom-form-container input[readonly]:focus {
        border: 1px solid #ddd;
        box-shadow: none;
    }

    .custom-form-container button {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        font-weight: bold;
        color: #ffffff;
        background-color: #523F31;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .custom-form-container button:hover {
        background-color: #876b5d;
        transform: scale(1.02);
    }

    .custom-form-container button:active {
        transform: scale(0.98);
    }

    @media (max-width: 768px) {
        .custom-form-container {
            padding: 20px;
        }

        .custom-form-container input,
        .custom-form-container button {
            font-size: 14px;
        }
    }
</style>

<section class="custom-form-container">
    <h3>Chỉnh sửa tài khoản</h3>
    <form action="account.php" method="POST">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="nptn@gmail.com" readonly>

        <label for="user_name">Tên tài khoản</label>
        <input type="text" id="user_name" name="user_name" value="thnguyen" required>

        <label for="user_fullname">Họ và tên</label>
        <input type="text" id="user_fullname" name="user_fullname" value="Nguyễn Phan Thảo Nguyên" required>

        <label for="user_phone">Số điện thoại</label>
        <input type="text" id="user_phone" name="user_phone" value="0972638449" required>

        <label for="old_password">Mật khẩu cũ</label>
        <input type="password" id="old_password" name="old_password">

        <label for="new_password">Mật khẩu mới</label>
        <input type="password" id="new_password" name="new_password">

        <label for="confirm_password">Xác thực mật khẩu</label>
        <input type="password" id="confirm_password" name="confirm_password">

        <button type="submit" name="update_account">Cập nhật</button>
    </form>
</section>


<?php include __DIR__ . '/../layouts/footer.php'; ?>
