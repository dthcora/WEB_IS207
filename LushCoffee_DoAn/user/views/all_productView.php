<?php include __DIR__ . '/../layouts/header.php'; ?>
<style>
    /* CSS styles */
    /* Tổng quan */
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #efede9 !important; /* Nền trắng */
        margin: 0;
        padding: 0;
    }

    /* Căn chỉnh bố cục chính */
    .main-container {
        display: flex;
        gap: 20px;
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        box-sizing: border-box;
        background-color: #efede9 !important;
    }

    /* Cột bên trái (lọc) */
    .sidebar {
        flex: 1;
        max-width: 250px;
        background: #d7ccc8; /* Nền trắng */
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        height: 200px;
    }

    .sidebar h4 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 15px;
        color: #333;
    }

    .sidebar .form-select,
    .sidebar button {
        width: 100%;
        margin-top: 5px;
        margin-bottom: 15px;
        border-radius: 5px;
        font-size: 14px;
    }

    .sidebar button {
        background-color: #523F31;
        color: #fff;
        border: none;
        padding: 10px;
        transition: background-color 0.3s ease;
    }

    .sidebar button:hover {
        background-color:  #895737
    }

    /* Khu vực sản phẩm */
    .product-container {
        flex: 3;
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        padding-top: 0;
        justify-content: center; /* Căn giữa sản phẩm */
        background-color: #efede9 !important;
    }

    /* Khung sản phẩm */
    .product {
        background: #ffffff; /* Nền trắng */
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 10px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        max-width: 200px;
        width: 100%;
    }

    .product:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .img-container {
        width: 100%;
        height: 200px;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 10px;
    }

    .img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
        border: none;
    }

    .img-container:hover img {
        transform: scale(1.1);
    }

    .p-product {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 5px;
        color: #523F31; /* Đảm bảo chữ dễ đọc trên nền trắng */
    }

    .product a {
        text-decoration: none; /* Loại bỏ gạch chân */
        color: inherit; /* Sử dụng màu của phần tử cha */
        transition: color 0.3s ease; /* Thêm hiệu ứng mượt khi hover */
    }

    .product a:hover {
        color: #895737 /* Màu xanh khi hover */
    }

    .p-price {
        font-size: 14px;
        color: black !important;
    }

    .p-price-discount {
        font-size: 12px;
        color: #888;
        text-decoration: line-through;
    }

    /* Phân trang */
    .my-pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: -10px;
        list-style: none;
        padding: 0;
        margin-left: 150px;
    }


    /* Nút phân trang */
    .my-page-item .my-page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background-color: #fff; /* Nền trắng */
        color: #523F31;
        border: 1px solid #ddd; /* Viền nhạt */
        border-radius: 8px; /* Bo góc */
        font-size: 14px;
        font-weight: bold;
        transition: all 0.3s ease;
        text-decoration: none; /* Loại bỏ gạch chân */
        margin: 3px;
    }

    /* Hiệu ứng hover */
    .my-page-item .my-page-link:hover {
        background-color: #895737;
        color: #fff; /* Chữ trắng khi hover */
    }

    /* Nút đang được chọn (active) */
    .my-page-item.active .my-page-link {
        background-color: #523F31;
        color: #fff;
    }

    #featured {
        padding-top: 70px !important;  /* Decrease padding above featured section */
        padding-bottom: 10px !important;  /* Decrease padding below featured section */
    }
</style>

<section id="featured" class="my-5 py-5 text-center">
    <div class="container">
        <h3 class="text-uppercase fs-1">
            <?= !empty($selected_category) ? 'Danh mục: ' . $selected_category : 'Tất cả sản phẩm'; ?>
        </h3>
        <hr>
        <p class="fs-4">Xem các sản phẩm mới nhất của chúng tôi</p>
    </div>
</section>

<div class="main-container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <h4>Lọc sản phẩm</h4>
        <form action="../public/all_product.php" method="POST">
            <label for="categories">Danh mục:</label>
            <select name="categories" id="categories" class="form-select">
                <option value="">Tất cả danh mục</option>
                <?php while ($category = $categories->fetch_assoc()): ?>
                    <option value="<?= $category['category_name']; ?>" <?= $selected_category == $category['category_name'] ? 'selected' : ''; ?>>
                        <?= $category['category_name']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <button type="submit" name="filter_category" class="btn btn-success">Lọc</button>
        </form>
    </aside>

    <!-- Products -->
    <section class="product-container">
        <?php while ($row = $products->fetch_assoc()): ?>
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
<nav class="my-pagination">
    <ul class="my-pagination">
        <?php if ($page > 1): ?>
            <li class="my-page-item">
                <a href="all_product.php?page=<?= $page - 1; ?>&category=<?= $selected_category; ?>" class="my-page-link"><<</a>
            </li>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="my-page-item <?= $i == $page ? 'active' : ''; ?>">
                <a href="all_product.php?page=<?= $i; ?>&category=<?= $selected_category; ?>" class="my-page-link"><?= $i; ?></a>
            </li>
        <?php endfor; ?>
        <?php if ($page < $total_pages): ?>
            <li class="my-page-item">
                <a href="all_product.php?page=<?= $page + 1; ?>&category=<?= $selected_category; ?>" class="my-page-link">>></a>
            </li>
        <?php endif; ?>
    </ul>
</nav>

<?php include __DIR__ . '/../layouts/footer.php'; ?>

