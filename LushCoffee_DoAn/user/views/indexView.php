<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link href='../assets/images/logo_footer.png' rel='icon' type='image/x-icon'/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }

        /* Adjust margin and padding for the banner section */
        #home {
            margin-bottom: 5px;  /* Reduce space between banner and featured section */
            position: relative;
            width: 100%;
            height: 500px; /* Đặt chiều cao khung banner */
            overflow: hidden;
            padding-top: 50px;
            background-color: #bb8d6f;
        }

        .banner-img {
            width: 100%;
            height: 450px;
            background-size: cover; /* Đảm bảo ảnh phủ toàn bộ khung */
            background-position: center; /* Căn giữa ảnh */
        }

        #featured {
            padding-top: 0px !important;  /* Decrease padding above featured section */
            padding-bottom: 0px !important;  /* Decrease padding below featured section */
        }

        .container-fluid {
            padding: 0;  /* Remove extra padding around the products */
        }

        .product {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            max-width: 200px !important;
            width: 100%;
            margin: 5px;
        }

        .product-status {
            display: inline-block;
            padding: 5px 10px;
            font-size: 12px;
            font-weight: bold;
            color: white;
            text-transform: uppercase;
            border-radius: 15px;
            position: absolute;
            top: 12px;
            left: 12px;
            margin: 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-status.new-product {
            background-color: firebrick; /* Màu cam cho New Product */
        }

        .product-status:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .img-container img {
            border: none !important;
        }

        .p-price {
            color: #555 !important;
            font-size: 16px !important;
        }

        .product-name {
            font-size: 16px !important;
        }

        .container-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 10px;
        }
    </style>
</head>
<body>
<?php include __DIR__ .'/../layouts/header.php'; ?>
<section id="home">
    <!-- Banner -->
    <div class="home-slider">
        <img src="../assets/images/banner.jpg" alt="Banner Image" class="banner-img">
        <img src="../assets/images/banner-2.jpg" alt="Banner Image2" class="banner-img">
        <img src="../assets/images/banner_3.jpg" alt="Banner Image3" class="banner-img">
    </div>
</section>

<!-- Featured Section -->
<section id="featured" class="my-5 py-5">
    <div class="container text-center mt-5 py-5">
        <h4 class="text-uppercase fs-1">SẢN PHẨM MỚI</h4>
        <hr>
        <p class="fs-4">Hãy tìm hiểu các sản phẩm mới nhất của Lush Coffee & Dessert</p>
    </div>
</section>

<div class="container">
    <div class="container-row">
        <?php foreach ($products as $row): ?>
            <div class="product text-center col-lg-3 col-md-6 col-sm-12">
                <a href="single_product.php?product_id=<?= $row['product_id']; ?>" class="product-link">
                    <div class="img-container">
                        <div class="product-status new-product">
                            New Product
                        </div>
                        <img class="img-fluid mb-3" src="../assets/images/<?= $row['product_image']; ?>" alt="<?= $row['product_name']; ?>">
                    </div>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="p-product"><?= $row['product_name']; ?></h3>
                    <p class="p-price"><?= number_format($row['product_price'], 0, '.', '.') . ' VND'; ?></p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include __DIR__ .'/../layouts/footer.php'; ?>
</body>
</html>
