<?php include __DIR__ .'/../layouts/header.php'; ?>
<link href='../assets/images/logo_footer.png' rel='icon' type='image/x-icon'/>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/userlte.css">
<link href="../assets/css/orders.css" rel="stylesheet">
<style>
    /* Tổng thể */
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f8f9fa; /* Màu nền sáng */
        color: #333; /* Màu chữ tối */
        margin: 0;
        padding: 0;
    }

    /* Header và breadcrumb */
    #featured {
        padding: 50px 0;
        text-align: center;
        background-color: #fff;
        margin-bottom: 30px;
        border-bottom: 2px solid #eee;
    }

    #featured h4 {
        font-size: 30px;
        font-weight: bold;
        color: #523F31;
    }

    .breadcrumb {
        background-color: #f4f4f4;
        border-radius: 5px;
        font-size: 14px;
        padding: 10px 20px;
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

    /* Account Menu */
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

    /* Form tìm kiếm đơn hàng */
    #search-orders-form {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    #search-orders-form label {
        font-size: 14px;
        font-weight: bold;
        color: #523F31;
    }

    #search-orders-form .form-control {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
    }

    #search-orders-form .btn {
        background-color: #523F31;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        padding: 8px 15px;
    }

    #search-orders-form .btn:hover {
        background-color: #876b5d;
    }

    /* Bảng dữ liệu */
    .table {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
        padding: 12px;
        font-size: 16px;
        border: 1px solid #ccc;
    }

    .table th {
        background-color: #f4f4f4;
        font-weight: bold;
        color: #523F31;
    }

    .table .btn-primary {
        background-color: #523F31;
        border-radius: 20px;
        font-size: 14px;
        padding: 5px 10px;
        color: #fff;
        border: none;
    }

    .table .btn-primary:hover {
        background-color: #876b5d;
    }

    /* Căn chỉnh cột */
    #search-orders-form .row > div {
        padding-right: 15px;
        padding-left: 15px;
    }
</style>

<section id="featured" class="my-5 py-5 text-center">
    <div class="container">
        <nav aria-label="breadcrumb" class="custom-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">HOME</a></li>
                <li class="breadcrumb-item active" aria-current="page">ĐƠN HÀNG CỦA TÔI</li>
            </ol>
        </nav>
        <h4 class="text-uppercase fs-1">ĐƠN HÀNG CỦA TÔI</h4>
        <hr>
        <div class="container">
            <div class="row">
                <div class="account-update col-lg-8 col-md-10 col-sm-12 mx-auto">
                    <!-- Account Menu -->
                    <ul id="account-panel" class="nav nav-pills justify-content-center mb-4">
                        <li class="nav-item">
                            <a href="account.php" class="nav-link font-weight-bold" role="tab">
                                <i class="fas fa-user-alt"></i> Thông tin
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="my_orders.php" class="nav-link font-weight-bold active" role="tab">
                                <i class="fas fa-shopping-bag"></i> Đơn hàng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="account.php?logout=1" class="nav-link font-weight-bold" role="tab">
                                <i class="fas fa-sign-out-alt"></i> Đăng xuất
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="my-5 py-5">
    <div class="container">
        <form id="search-orders-form" method="GET" class="row mb-4">
            <div class="col-md-3 mb-3">
                <label for="search-order-id">Tìm kiếm mã đơn hàng</label>
                <input type="text" id="search-order-id" name="search" class="form-control" value="<?php echo htmlspecialchars($search); ?>">
            </div>
            <div class="col-md-3 mb-3">
                <label for="order-status">Trạng thái</label>
                <select id="order-status" name="status" class="form-control">
                    <option value="">Tất cả</option>
                    <option value="Pending" <?php echo $status == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                    <option value="Processing" <?php echo $status == 'Processing' ? 'selected' : ''; ?>>Processing</option>
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <label for="date-from">Từ ngày</label>
                <input type="date" id="date-from" name="date_from" class="form-control" value="<?php echo $date_from; ?>">
            </div>
            <div class="col-md-2 mb-3">
                <label for="date-to">Đến ngày</label>
                <input type="date" id="date-to" name="date_to" class="form-control" value="<?php echo $date_to; ?>">
            </div>
            <div class="col-md-2 mb-3">
                <label for="order-sort">Sắp xếp</label>
                <select id="order-sort" name="sort" class="form-control">
                    <option value="newest" <?php echo $sort == 'newest' ? 'selected' : ''; ?>>Mới nhất</option>
                    <option value="oldest" <?php echo $sort == 'oldest' ? 'selected' : ''; ?>>Cũ nhất</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Tìm kiếm
                </button>
                <a href="my_orders.php" class="btn btn-secondary">
                    <i class="fas fa-redo"></i> Khởi động lại
                </a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>
                    <th>Tổng tiền</th>
                    <th>Chi tiết</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($orders)): ?>
                    <?php foreach ($orders as $index => $order): ?>
                        <tr>
                            <th><?php echo $index + 1; ?></th>
                            <td><?php echo $order['order_id']; ?></td>
                            <td><?php echo $order['order_date']; ?></td>
                            <td><?php echo $order['order_status']; ?></td>
                            <td><?php echo number_format($order['order_cost'], 0, '.', '.') . ' VND'; ?></td>
                            <td><a href="order_details.php?order_id=<?php echo $order['order_id']; ?>" class="btn btn-primary btn-sm">Xem</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Không có đơn hàng nào!</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include __DIR__ .'/../layouts/footer.php'; ?>
