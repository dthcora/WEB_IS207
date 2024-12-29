<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
        /* Footer Styles */
        .footer {
            background-color: #241916;
            color: #f0f0f0;
            padding: 30px;
            font-family: 'Roboto', sans-serif;
        }

        .footer-logo {
            width: 150px;
            border-radius: 10px;
        }

        .footer-desc {
            font-size: 14px;
            line-height: 1.6;
            color: #b3b3b3;
            text-align: center;
        }

        .footer-title {
            font-size: 15px !important;
            font-weight: 700;
            margin-bottom: 20px;
            color: #9A8A7C;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            color: #fff;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            text-decoration: none;
            color: #f0f0f0;
            transition: color 0.3s ease;
            font-size: 13px;
        }

        .footer-links a:hover {
            color: #895737;
        }

        .footer-divider {
            border-color: #444;
            margin: 0;
        }

        .footer-copyright {
            font-size: 13px;
            color: #888;
            margin: 15px 0;
        }

        .footer-social-icons {
            margin: 5px 0;
        }

        .footer-social-icons a {
            font-size: 20px;
            color: #f0f0f0;
            margin: 0 12px;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .footer-social-icons a:hover {
            color: #895737;
            transform: scale(1.3);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .footer {
                text-align: center;
            }

            .footer-links {
                padding-left: 0;
            }

            .footer-one img {
                margin: 0 auto;
            }
        }
    </style>
</head>

<body>
<footer class="footer mt-5 py-5">
    <div class="container">
        <div class="row">
            <!-- Logo & Description -->
            <div class="footer-one col-lg-2 col-md-6 col-sm-12">
                <img src="../assets/images/logo_footer.png" class="footer-logo" alt="Logo">
                <p class="footer-desc mt-3">Đậm vị thiên nhiên <br>Trọn từng khoảnh khắc.</p>
            </div>

            <!-- Featured Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="footer-title">SẢN PHẨM</h5>
                <ul class="footer-links">
                    <li><a href="all_product.php">TẤT CẢ</a></li>
                    <li><a href="CaPhe.php">CÀ PHÊ</a></li>
                    <li><a href="Tra.php">TRÀ</a></li>
                    <li><a href="Banh.php">BÁNH</a></li>
                </ul>
            </div>

            <!-- Policies Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="footer-title">CHÍNH SÁCH</h5>
                <ul class="footer-links">
                    <li><a href="BaoMat.php">CHÍNH SÁCH BẢO MẬT</a></li>
                    <li><a href="DKSD.php">ĐIỀU KHOẢN SỬ DỤNG</a></li>
                </ul>
            </div>

            <!-- Contact Information -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="footer-title">LIÊN HỆ</h5>
                <ul class="footer-links">
                    <li><a><strong>Địa chỉ:</strong> Số 1, Hàn Thuyên, khu phố 6 P, Thủ Đức, Hồ Chí Minh</a></li>
                    <li><a><strong>Hotline:</strong> 1800 8386</a></li>
                    <a><strong>Email:</strong> lushcoffee@gmail.com</a>
            </div>

            <!-- Google Map -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="footer-title">BẢN ĐỒ</h5>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.2312402759762!2d106.8030541!3d10.870008899999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527587e9ad5bf%3A0xafa66f9c8be3c91!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiAtIMSQSFFHIFRQLkhDTQ!5e0!3m2!1svi!2s!4v1735059267640!5m2!1svi!2s"  width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <hr class="footer-divider">
        <div class="row">
            <div class="col-12 text-center">
                <p class="footer-copyright mb-1">© 2024 Lush Coffee. Bảo lưu mọi quyền.</p>
                <div class="footer-social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
