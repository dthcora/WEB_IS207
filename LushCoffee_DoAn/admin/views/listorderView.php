<?php include __DIR__ . '/../layouts/app.php'; ?>
<?php include __DIR__ . '/../layouts/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Orders</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <form action="list-order.php" method="POST" onsubmit="return confirm('Are you sure you want to delete all orders? This action cannot be undone.');">
                        <button type="submit" class="btn btn-danger">Delete All Orders</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <form class="d-flex" action="../admin/search-order.php" method="GET">
                            <input class="form-control me-2" type="search" name="query_admin" placeholder="Search Products" required>
                            <button class="btn btn-outline-dark" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <?php if(isset($_GET['message'])): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo htmlspecialchars($_GET['message']); ?>
                        </div>
                    <?php endif; ?>
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Phone</th>
                                <th>Order Cost</th>
                                <th>Order Status</th>
                                <th>Order Date</th>
                                <th>Order Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $stt = $totalOrders - (($page - 1) * $limit);
                            foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo $stt--; ?></td>
                                <td><?php echo htmlspecialchars($order['user_name']); ?></td>
                                <td><?php echo htmlspecialchars($order['user_phone']); ?></td>
                                <td><?php echo number_format($order['order_cost'], 0, '.', '.'); ?></td>
                                <td>
                                    <?php 
                                    $status = $order['order_status'];
                                    $statusClass = 'bg-danger';
                                    if ($status === 'shipped') $statusClass = 'bg-warning';
                                    elseif ($status === 'delivered') $statusClass = 'bg-success';
                                    elseif ($status === 'cancelled') $statusClass = 'bg-primary';
                                    ?>
                                    <span class="badge <?php echo $statusClass; ?> p-2 text-uppercase">
                                        <?php echo htmlspecialchars($status); ?>
                                    </span>
                                </td>
                                <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                                <td>
                                    <form action="../public/order-detail.php" method="POST">
                                        <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                                        <input type="submit" class="btn btn-dark btn-sm" value="Details">
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    <ul class="pagination m-0 float-right">
                        <li class="page-item <?php echo ($page == 1) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $page - 1; ?>">«</a>
                        </li>
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>
                        <li class="page-item <?php echo ($page == $totalPages) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $page + 1; ?>">»</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>

