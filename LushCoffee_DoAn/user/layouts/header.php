<?php
if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        session_destroy();
        header('location:login.php');
    }
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lush Coffee</title>
        <link href='../assets/images/logo_footer.png' rel='icon' type='image/x-icon'/>
        <link rel="stylesheet" type="text/css" href="../assets/css/header.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/index.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <style>
            body {
                font-family: Roboto, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #241916;
                color: #8d6e63;
            }
            .navbar {
                background-color: #241916;
                border-bottom: 1px solid #1f1f1f;
                display: flex;
                align-items: center;
                height: 70px;
                padding: 15px 30px;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 1000;
                justify-content: space-between;
                border-radius: 0;
                transition: background-color 0.3s ease, box-shadow 0.3s ease;
            }
            .navbar .nav-link {
                color: #8d6e63;
                font-size: 16px;
                padding: 10px 20px;
                margin: 0 20px;
                justify-content: flex-start;
                display: flex;
                align-items: center;
                height: 100%; 
            }
            .navbar-nav {
                display: flex;
                align-items: center;
            }

            .cart-modal {
                background: rgba(0, 0, 0, 0.9);
                display: none;
                justify-content: center;
                align-items: center;
                z-index: 9999;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }

            .cart-content {
                background: #D7CCC8;
            }

            .cart-items {
                max-height: 400px; /* Chiều cao tối đa của danh sách sản phẩm */
                overflow-y: auto; /* Thêm thanh cuộn dọc */
                margin-bottom: 10px; /* Khoảng cách với nút bấm */
            }

            .cart-items table {
                width: 100%;
                border-collapse: collapse;
            }

            .cart-items td {
                font-size: 14px !important;
                background: #fff;
            }

            .cart-items th, .cart-items td {
                padding: 7px;
                text-align: center;
                border-bottom: 1px solid #5d4037 ;
            }

            .cart-actions {
                display: flex;
                justify-content: center;
                gap: 20px;
            }

            .cart-actions .btn {
                background-color: #523F31;
                color: #efebe9;
                padding: 10px 20px;
                border-radius: 10px;
                text-align: center;
                transition: background-color 0.3s;
            }

            .cart-actions .btn:hover {
                background-color: #895737;
                color: #efebe9;
            }
            table th {
                background-color: #5d4037;
                color: #efebe9;
            }
            .empty-cart img {
                max-width: 200px;
                display: block;
                margin: 0 auto;
                filter: grayscale(100%);
                opacity: 0.8;
            }
            .empty-cart .btn {
                background-color: #523F31;
                color: #efebe9;
                padding: 10px 20px;
                border-radius: 10px;
                text-align: center;
                transition: background-color 0.3s;
            }
            .empty-cart .btn:hover {
                background-color: #895737;
                color: #efebe9;
            }
            .btn {
                background-color: var(--primary-color);
                color: var(--text-color);
                padding: 10px 20px;
                border: none;
                border-radius: 30px;
                cursor: pointer;
                transition: background-color 0.3s, transform 0.3s;
            }

            .btn:hover {
                background-color: var(--text-color);
                color: var(--primary-color);
                transform: scale(1.05); 
            }
            /* Dropdown menu */
            .nav-item.dropdown.show .megamenu-sub {
                display: block;
            }
            .nav-item.dropdown .megamenu-sub {
                display: none; /* Mặc định ẩn */
            }
            .nav-item.dropdown.show .dropdown-toggle {
                background-color: var(--accent-color); /* Màu nền khi submenu mở */
            }
            .nav-item.dropdown:hover .megamenu-sub {
                display: block; /* Hiển thị submenu khi hover */
                position: absolute;
                z-index: 10;
            }
            .mega-menu-sub {
                background-color: var(--secondary-color); /* Nền submenu */
                border-radius: 10px;
                padding: 20px;
            }
        </style>
    </head>
<body>
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-light bg-black fixed-top">
    <div class="container-fluid">
    <a href="index.php">
        <img src="../assets/images/logo_header.png" width="200px" height="65px" alt="Logo">
    </a>
        <!-- Menu chính -->
        <div class="navbar-nav ms-auto">
            <a class="nav-link menu-link" href="index.php" style="color: #ffffff;">TRANG CHỦ</a>
            <div class="nav-item dropdown menu-list-item" id="productsDropdown">
                <div class="nav-link menu-link dropdown-toggle" style="color: #ffffff;" id="navbarDropdown" role="button" aria-expanded="false">
                    SẢN PHẨM
                </div>
                <div class="megamenu-sub">
                    <div class="megamenu-sub-wrap row">
                        <!-- Tất cả sản phẩm -->
                        <div class="item col-2">
                            <h4><a href="all_product.php">Tất cả sản phẩm</a></h4>
                        </div>
                        <!-- Cà phê -->
                        <div class="item col-2">
                            <h4><a href="CaPhe.php">Cà phê</a></h4>
                            <div class="megamenu-sub-level2">
                                <a href="CaPheNong.php">Nóng</a>
                                <a href="CaPheLanh.php">Lạnh</a>
                            </div>
                        </div>
                        <!-- Trà -->
                        <div class="item col-2">
                            <h4><a href="Tra.php">Trà</a></h4>
                            <div class="megamenu-sub-level2">
                                <a href="TraTraiCay.php">Trái cây</a>
                                <a href="TraSua.php">Trà sữa</a>
                            </div>
                        </div>

                        <!-- Bánh -->
                        <div class="item col-2">
                            <h4><a href="Banh.php">Bánh</a></h4>
                            <div class="megamenu-sub-level2">
                                <a href="BanhMan.php">Mặn</a>
                                <a href="BanhNgot.php">Ngọt</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <a class="nav-link menu-link" href="about-us.php" style="color: #ffffff;">VỀ LUSH</a>

            <form class="search-form" action="search.php" method="GET">
                <input
                        type="text"
                        class="search-input"
                        name="query"
                        placeholder="Tìm kiếm sản phẩm"
                        aria-label="Search"
                        required
                />
                <button class="search-btn" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <div class="nav-icons ms-3">
                <!-- Giỏ hàng -->
                <a href="javascript:void(0);" onclick="toggleCartPopup()" class="cart-icon">
                    <div class="icon-wrapper">
                        <i class="fas fa-shopping-cart"></i>
                        <!-- Badge số lượng sản phẩm -->
                        <div class="cart-badge">3</div>
                    </div>
                </a>

                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                    $username = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Người dùng';
                    ?>
                    <!-- User dropdown -->
                    <div class="dropdown user-dropdown">
                        <a href="#"
                           class="dropdown-toggle nav-link menu-link user-name"
                           id="userMenu"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false"
                        ><div class="icon-wrapper">
                                <i class="fas fa-user"></i>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                            <li>
                                <a class="dropdown-item" href="account.php">
                                    <i class="fas fa-user-circle"></i> Tài khoản
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="my_orders.php">
                                    <i class="fas fa-shopping-bag"></i> Đơn hàng
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="account.php?logout=1">
                                    <i class="fas fa-sign-out-alt"></i> Đăng xuất
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php } else { ?>
                <a href="login.php" class="nav-link menu-link login-link">
                    <div class="icon-wrapper">
                        <i class="fas fa-user"></i>
                    </div>
                </a>
                <?php } ?>
            </div>

   </nav>
</body>
</html>
<!-- Cart Pop-up Modal -->
<div id="cartModal" class="cart-modal">
    <div class="cart-content">
        <span class="close" onclick="toggleCartPopup()">&times;</span>
        <h2>GIỎ HÀNG</h2>
        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { ?>
            <div class="cart-items">
                <table>
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Size</th>
                            <th>Số lượng</th>
                            <th>Giá tiền</th>
                            <th>Tổng cộng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                            <tr>
                                <td>
                                    <div class="product-info">
                                        <img src="../assets/images/<?php echo $value['product_image']; ?>"
                                             alt="<?php echo $value['product_name']; ?>">
                                        <div>
                                            <p class="pt-4"><?php echo $value['product_name']; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo htmlspecialchars($value['product_size']); ?></td>
                                <td><?php echo $value['product_quantity']; ?></td>
                                <td><?php echo number_format($value['product_price'], 0, '.', '.') . ' VND'; ?></td>
                                <td><?php echo number_format($value['product_price'] * $value['product_quantity'], 0, '.', '.') . ' VND'; ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="4"><strong>Tổng cộng</strong></td>
                            <td><strong><?php echo number_format($_SESSION['total'], 0, '.', '.') . ' VND'; ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="cart-actions">
                <a href="checkout.php" class="btn btn-dark">Thanh toán</a>
                <a href="cart.php" class="btn btn-dark">Xem tất cả</a>
            </div>
        <?php } else { ?>
            <div class="empty-cart">
                <img src="../assets/images/empty-cart.png" alt="Giỏ hàng trống">
                <p>Giỏ hàng của bạn đang trống.</p>
                <a href="all_product.php" class="btn btn-dark">Tiếp tục mua sắm</a>
            </div>
        <?php } ?>
    </div>
</div>

<!-- cart -->
<script>
function toggleCartPopup() {
    const cartModal = document.getElementById('cartModal');
    if (cartModal.style.display === 'flex') {
        cartModal.style.display = 'none';
    } else {
        cartModal.style.display = 'flex';
    }
}
// Close the modal when clicking outside of it
window.onclick = function(event) {
    const modal = document.getElementById("cartModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


window.addEventListener('scroll', function() {
    let scrollPosition = window.scrollY; // Vị trí cuộn của trang
    let banner = document.querySelector('.home-slider');

    // Nếu người dùng cuộn xuống, thu nhỏ banner
    if (scrollPosition > 100) {  // Bạn có thể thay đổi giá trị 100 để tùy chỉnh
        banner.classList.add('banner-shrunk');
        banner.classList.remove('banner-expanded');
    }
    // Nếu người dùng cuộn lên, phóng to banner
    else {
        banner.classList.add('banner-expanded');
        banner.classList.remove('banner-shrunk');
    }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0v8FqNXhb5Kh0vVj36u1nxktW5cI9Pt9F6t4c23T08uFjqZy" crossorigin="anonymous"></script>
<script>
    // Get the Products menu item and the submenu
    const productsDropdown = document.getElementById('productsDropdown');
    const megamenuSub = productsDropdown.querySelector('.megamenu-sub');

    // Add a click event listener to the Products menu item
    productsDropdown.addEventListener('click', function(event) {
        // Prevent the default action (e.g., closing the submenu)
        event.stopPropagation();

        // Toggle the visibility of the megamenu
        megamenuSub.style.display = (megamenuSub.style.display === 'block') ? 'none' : 'block';
    });

    // Close the menu if clicked outside of the Products dropdown
    window.addEventListener('click', function(event) {
        if (!productsDropdown.contains(event.target)) {
            megamenuSub.style.display = 'none'; // Close the menu
        }
    });
</script>




