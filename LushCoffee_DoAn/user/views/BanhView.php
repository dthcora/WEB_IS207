<?php include __DIR__ .'/../layouts/header.php'; ?>
<link rel="stylesheet" type="text/css" href="../assets/css/sanpham.css">
<style>
    .img-container img {
        border: none !important;
    }
    .p-price {
        color: black !important;
    }
</style>
<section id="featured" class="my-5 py-5 text-center">
    <div class="container">
        <nav aria-label="breadcrumb" class="custom-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../public/index.php">HOME</a></li>
                <li class="breadcrumb-item active" aria-current="page">BÁNH</li>
            </ol>
        </nav>
        <h4 class="text-uppercase fs-1">BÁNH</h4>
        <hr>
    </div>
</section>

<div class="main-container1">
    <!-- Sidebar -->
    <aside class="sidebar">
        <h4>BỘ LỌC TÌM KIẾM</h4>
        <form action="Banh.php" method="POST">
            <label for="categories">Theo Danh mục:</label>
            <div class="form-check mb-2">
                <input type="radio" value="BanhMan" class="form-check-input" name="category" id="category_one">
                <label class="form-check-label" for="category_one">Mặn</label>
            </div>
            <div class="form-check">
                <input type="radio" value="BanhNgot" class="form-check-input" name="category" id="category_two">
                <label class="form-check-label" for="category_two">Ngọt</label>
            </div>
            <hr>
            <label for="priceRange" class="mt-3">Khoảng giá:</label>
            <input
                type="range"
                name="price"
                value="5000"
                class="form-range"
                min="5000"
                max="100000"
                id="priceRange"
                oninput="updatePriceLabel(this.value)">
            <div class="d-flex justify-content-between">
                <span>5.000</span>
                <span>100.000</span>
            </div>
            <p class="text-center">Giá: <span id="selectedPrice">5000</span> Đ</p>
            <button type="submit" name="search" class="btn btn-success">ÁP DỤNG</button>
        </form>
    </aside>

    <!-- Products -->
    <section class="product-container">
        <?php while ($row = $products->fetch_assoc()) : ?>
            <div class="product">
                <a href="single_product.php?product_id=<?= $row['product_id']; ?>">
                    <div class="img-container">
                        <img src="../assets/images/<?= $row['product_image']; ?>" alt="<?= $row['product_name']; ?>">
                    </div>
                    <h3 class="p-product"><?= $row['product_name']; ?></h3>
                    <p class="p-price"><?= number_format($row['product_price'], 0, '.', '.') . ' VND'; ?></p>
                </a>
            </div>
        <?php endwhile; ?>
    </section>
</div>

<!-- Pagination -->
<nav class="my-pagination1">
    <ul class="my-pagination1">
        <?php if ($page > 1): ?>
            <li class="my-page-item">
                <a href="Banh.php?page=<?= $page - 1; ?>" class="my-page-link"><<</a>
            </li>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="my-page-item <?= $i == $page ? 'active' : ''; ?>">
                <a href="Banh.php?page=<?= $i; ?>" class="my-page-link"><?= $i; ?></a>
            </li>
        <?php endfor; ?>
        <?php if ($page < $total_pages): ?>
            <li class="my-page-item">
                <a href="Banh.php?page=<?= $page + 1; ?>" class="my-page-link">>></a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<script src="../assets/js/updatePriceLabel.js"></script>
<script src="../assets/js/radioButton.js"></script>
<?php include __DIR__ .'/../layouts/footer.php'; ?>

