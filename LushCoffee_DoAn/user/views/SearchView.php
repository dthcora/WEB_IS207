<?php include __DIR__ .'/../layouts/header.php'; ?>

<link rel="stylesheet" type="text/css" href="../assets/css/sanpham.css">
<style>
    .img-container img {
        border: none !important;
    }
    .p-price {
        color: black !important;
    }
    .col-lg-9 .container {
        padding: 0px !important;
        margin: 0px !important;
    }

    .main-container1 {
        padding-top: 130px !important;
    }
</style>

<div class="main-container1">
    <!-- Sidebar -->
    <aside class="sidebar">
        <h4>BỘ LỌC TÌM KIẾM</h4>
        <form action="search.php" method="GET">
            <label for="query">Từ khóa:</label>
            <input type="text" name="query" id="query" value="<?= htmlspecialchars($query); ?>" class="form-control mb-3">

            <label for="categories">Danh mục:</label>
            <input type="text" name="categories" id="categories" value="<?= htmlspecialchars($category); ?>" class="form-control mb-3">

            <label for="priceRange" class="mt-3">Khoảng giá:</label>
            <input
                type="range"
                name="price"
                value="<?= htmlspecialchars($max_price); ?>"
                class="form-range"
                min="5000"
                max="60000"
                id="priceRange"
                oninput="updatePriceLabel(this.value)">
            <div class="d-flex justify-content-between">
                <span>5.000</span>
                <span>60.000</span>
            </div>
            <p class="text-center">Giá tối đa: <span id="selectedPrice"><?= htmlspecialchars($max_price); ?></span> VNĐ</p>
            <button type="submit" class="btn btn-success">TÌM KIẾM</button>
        </form>
    </aside>

    <!-- Products Section -->
    <div class="col-lg-9 col-md-8 col-sm-12">
        <div class="container text-center mt-5 py-5">
            <h3 class="text-uppercase fs-3">TÌM KIẾM <strong><?= htmlspecialchars($query); ?></strong></h3>
            <p class="text-muted">Tìm được <?= $total_products; ?> kết quả</p>
            <hr class="mx-auto">
        </div>

        <?php if ($products->num_rows > 0): ?>
            <section class="product-container">
                <?php while ($row = $products->fetch_assoc()): ?>
                    <div class="product">
                        <a href="Single_Product.php?product_id=<?= $row['product_id']; ?>" class="product-link">
                            <div class="img-container">
                                <img class="img-fluid mb-3" src="../assets/images/<?= $row['product_image']; ?>" alt="Product Image">
                            </div>
                            <h3 class="p-product"><?= $row['product_name']; ?></h3>
                            <p class="p-price"><?= number_format($row['product_price'], 0, ',', '.'); ?> VND</p>
                        </a>
                    </div>
                <?php endwhile; ?>
            </section>
        <?php else: ?>
            <div class="alert alert-danger">Không tìm thấy sản phẩm nào phù hợp!</div>
        <?php endif; ?>
    </div>
</div>
<script src="../assets/js/updatePriceLabel.js"></script>
<script src="../assets/js/radioButton.js"></script>
<?php include __DIR__ .'/../layouts/footer.php'; ?>

