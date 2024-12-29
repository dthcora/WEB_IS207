<?php include __DIR__ .'/../layouts/header.php'; ?>
<link rel="stylesheet" type="text/css" href="../assets/css/sanpham.css">

<!-- CSS Customizations -->
<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f4f4f4 !important;
        margin: 0;
        padding: 0;
    }

    .product-title {
        font-size: 2rem;
        font-weight: 700;
        color: #362017 !important;
    }

    .product-price {
        font-size: 1.5rem;
        color: #2d1e17 !important;
        margin: 10px 0;
    }

    .size-label-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 10px;
        display: block;
    }

    .size-options {
        display: flex;
        gap: 30px !important;
        margin-bottom: 20px;
    }

    .size-label {
        padding: 10px 20px;
        border: 2px solid #ccc;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease, border 0.3s ease;
        font-size: 1rem;
        text-align: center;
    }

    /* Ẩn hoàn toàn input radio */
    input[type="radio"] {
        display: none;
    }

    input[type="radio"]:checked + .size-label {
        background-color:rgb(0, 0, 0);
        color: white;
        border-color: none;
    }

    .product-actions {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-top: 20px;
    }

    .quantity-input {
        width: 70px;
        height: 45px;
        text-align: center;
        border: 2px solid #ccc;
        border-radius: 5px;
        font-size: 1rem;
    }

    .buy-btn {
        background-color: #523F31 !important;
        color: white;
        margin-left: 20% !important;
        padding: 10px 20px;
        font-size: 1rem;
        font-weight: 600;
        border: none !important;
        border-radius: 15px !important;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .buy-btn:hover {
        background-color: #895737 !important;
        transform: scale(1.05);
        color: white !important;
    }

    .p-price {
        font-size: 12px !important; /* Giảm kích thước chữ của giá */
        color: #2d1e17 !important;
    }
    .breadcrumb {
        background-color: #f4f4f4 !important;
    }
    #featured {
        padding-top: 54px !important;
        margin-top: 10px !important;
        padding-bottom: 0px !important;
        background-color: #f4f4f4 !important;
    }
    .container-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
        padding-top: 0;
    }

    .product {
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        width: 220px !important;
        margin: 10px;
    }

    .product:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .img-container {
        position: relative;
        overflow: hidden;
    }

    .img-container img {
        max-width: 100%;
        border-radius: 8px;
        border: none;
    }
    .p-product {
        font-size: 16px !important;
        font-weight: bold;
        margin: 10px 0;
    }
    .main-img {
        max-width: 80% !important; /* Giảm kích thước ảnh xuống 80% so với khung chứa */
        height: auto !important;   /* Đảm bảo tỷ lệ ảnh không bị méo */
        margin: 0 auto !important; /* Căn giữa hình ảnh */
        display: block !important; /* Hiển thị như một khối */
    }
    .single_product {
        padding-top: 0px !important;
    }
    .product-description {
        font-size: 1rem;
        line-height: 1.5;
        color: #555;
        margin-top: 15px;
        margin-bottom: 20px;
    }
</style>

<section id="featured" class="my-5 py-5 text-center">
    <div class="container">
        <nav aria-label="breadcrumb" class="custom-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../public/index.php">HOME</a></li>
                <li class="breadcrumb-item active" aria-current="page">TẤT CẢ SẢN PHẨM</li>
            </ol>
        </nav>
    </div>
</section>

<section class="container single_product my-5 pt-5">
    <div class="row mt-5">
        <?php while ($row = $product->fetch_assoc()) { ?>
            <div class="col-lg-5 col-md-5">
                <img src="../assets/images/<?php echo $row['product_image']; ?>" class="img-fluid w-100 pb-2 main-img" alt="Product Image">
            </div>
            <div class="col-lg-7 col-md-7">
                <h2 class="product-title py-3"><?php echo $row['product_name']; ?></h2>
                <h4 class="product-price" data-base-price="<?php echo $row['product_price']; ?>">
                    <?php echo number_format($row['product_price'], 0, '.', '.'); ?> VND
                </h4>
                <p class="product-description"><?php echo nl2br(htmlspecialchars($row['product_description'])); ?></p>

                <?php if ($row['quantity'] < 10) { ?>
                    <p class="stock-status">⚠️ Chỉ còn <?php echo $row['quantity']; ?> sản phẩm!</p>
                <?php } ?>

                <form action="../public/cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo number_format($row['product_price'], 0, '.', '.'); ?>">

                    <label class="size-label-title">Chọn Size:</label>
                    <div class="size-options">
                        <?php if (strpos($row['category_name'], 'Cà phê') !== false || strpos($row['category_name'], 'Trà') !== false) { ?>
                            <input type="radio" name="product_size" id="size-s" value="S" required>
                            <label for="size-s" class="size-label">S</label>
                            <input type="radio" name="product_size" id="size-m" value="M">
                            <label for="size-m" class="size-label">M</label>
                            <input type="radio" name="product_size" id="size-l" value="L">
                            <label for="size-l" class="size-label">L</label>
                        <?php } else { ?>
                            <p>Không áp dụng size cho sản phẩm này.</p>
                        <?php } ?>
                    </div>

                    <label class="size-label-title">Chọn Số lượng:</label>
                    <div class="product-actions">
                        <input type="number" name="product_quantity" value="1" min="1" class="quantity-input">
                        <button class="buy-btn rounded-2 text-uppercase" type="submit" name="add_to_cart">Thêm vào giỏ</button>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
</section>

<!-- Related Products -->
<section id="featured" class="my-4 py-4">
    <div class="container text-center mt-4 py-4">
        <h3 class="text-uppercase fs-1">SẢN PHẨM LIÊN QUAN</h3>
        <hr>
        <p class="fs-4">Khám phá các sản phẩm được khách hàng yêu thích</p>
    </div>
    <div class="row mx-auto container-row">
        <?php while ($related_product = $related_products->fetch_assoc()) { ?>
            <div class="product text-center col-lg-3 col-md-6 col-sm-12">
                <a href="single_product.php?product_id=<?php echo $related_product['product_id']; ?>" class="product-link">
                    <div class="img-container">
                        <img class="img-fluid mb-3" src="../assets/images/<?php echo htmlspecialchars($related_product['product_image']); ?>" alt="Product Image">
                    </div>
                    <h3 class="p-product"><?php echo htmlspecialchars($related_product['product_name']); ?></h3>
                    <p class="p-price"><?php echo number_format($related_product['product_price'], 0, '.', '.') . ' VND'; ?></p>
                </a>
            </div>
        <?php } ?>
    </div>
</section>

<?php include __DIR__ .'/../layouts/footer.php'; ?>

<script src="../assets/js/single_product.js"></script>

