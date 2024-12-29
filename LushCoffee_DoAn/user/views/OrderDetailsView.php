<?php include __DIR__ .'/../layouts/header.php'; ?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/userlte.css">
<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f4f4f4 !important;
    }
    .breadcrumb {
        background-color: #f4f4f4 !important;
    }
    #featured {
        padding-top: 54px !important;
        margin-top: 10px !important;
        padding-bottom: 0px !important;
    }
    .my-5 {
        padding-top: 0px !important;
    }
    .table {
        background-color: #C4B6AB;
    }
    .btn-primary {
        background-color: #523F31 !important;
        border-radius: 20px !important;
        border: none !important;
        font-size: 1rem !important;
        padding: 10px !important;
    }
</style>

<section id="featured" class="my-5 py-5 text-center">
    <div class="container">
        <nav aria-label="breadcrumb" class="custom-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">HOME</a></li>
                <li class="breadcrumb-item"><a href="my_orders.php">ĐƠN HÀNG CỦA TÔI</a></li>
                <li class="breadcrumb-item active" aria-current="page">CHI TIẾT ĐƠN HÀNG</li>
            </ol>
        </nav>
        <h4 class="text-uppercase fs-1">CHI TIẾT ĐƠN HÀNG</h4>
        <hr>
    </div>
</section>

<section class="my-5 py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th>Tổng tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?= htmlspecialchars($orderDetails['order_id']); ?></td>
                        <td><?= htmlspecialchars($orderDetails['order_date']); ?></td>
                        <td><?= htmlspecialchars($orderDetails['order_status']); ?></td>
                        <td><?= number_format($orderDetails['order_cost'], 0, '.', '.'); ?> VND</td>
                    </tr>
                    </tbody>
                </table>

                <h5 class="font-weight-bold text-uppercase mt-4">Sản phẩm trong đơn hàng</h5>
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Kích thước</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($orderItems as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['product_name']); ?></td>
                            <td><?= htmlspecialchars($item['product_size']); ?></td>
                            <td><?= htmlspecialchars($item['product_quantity']); ?></td>
                            <td><?= number_format($item['total_price'], 0, '.', '.'); ?> VND</td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="text-end">
                    <a href="my_orders.php" class="btn btn-primary btn-sm">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ .'/../layouts/footer.php'; ?>
