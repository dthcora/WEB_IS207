<?php include __DIR__ . '/../layouts/app.php'; ?>
<?php include __DIR__ . '/../layouts/sidebar.php'; ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order Details</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="list-order.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header pt-3">
                            <?php if ($orders && $orders->num_rows > 0): ?>
                                <?php foreach ($orders as $order): ?>
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 invoice-col">
                                            <h1 class="h5 mb-3">Shipping Address</h1>
                                            <address>
                                                <strong><?php echo htmlspecialchars($order['user_name']); ?></strong><br>
                                                <?php echo htmlspecialchars($order['user_address']); ?><br>
                                                <?php echo htmlspecialchars($order['user_phone']); ?><br>
                                                Email: <?php echo htmlspecialchars($order['user_email']); ?>
                                            </address>
                                        </div>
                                        <div class="col-sm-4 invoice-col">
                                            <br>
                                            <b>Order ID:</b> <?php echo htmlspecialchars($order['order_id']); ?><br>
                                            <b>Total:</b> <?php echo number_format($order['order_cost'], 0); ?> VND<br>
                                            <b>Status:</b>
                                            <?php
                                            $statusClass = 'bg-danger'; 
                                            if ($order['order_status'] === 'shipped') {
                                                $statusClass = 'bg-warning'; 
                                            } elseif ($order['order_status'] === 'delivered') {
                                                $statusClass = 'bg-success'; 
                                            } elseif ($order['order_status'] === 'cancelled') {
                                                $statusClass = 'bg-primary'; 
                                            }
                                            ?>
                                            <span class="badge <?php echo $statusClass; ?> p-2 text-uppercase">
                                                <?php echo htmlspecialchars($order['order_status']); ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>No order details available.</p>
                            <?php endif; ?>
                        </div>
                        <div class="card-body table-responsive p-3">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th width="100">Qty</th>
                                        <th width="100">Size</th>
                                        <th width="100">Price</th>
                                        <th width="100">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($order_details && $order_details->num_rows > 0): ?>
                                        <?php
                                        $subtotal = 0;
                                        while ($row = $order_details->fetch_assoc()) {
                                            $total = $row['product_price'] * $row['product_quantity'];
                                            $subtotal += $total;
                                        ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['product_quantity']); ?></td>
                                            <td><?php echo $row['product_size']; ?></td>
                                            <td><?php echo number_format($row['product_price'], 0); ?> VND</td>
                                            <td><?php echo number_format($total, 0); ?> VND</td>
                                        </tr>
                                        <?php } ?>
                                    <?php else: ?>
                                        <tr><td colspan="5">No products found.</td></tr>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4" class="text-right">Subtotal:</th>
                                        <td><?php echo number_format($subtotal, 0); ?> VND</td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-right">Shipping:</th>
                                        <td>0.000 VND</td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-right">Grand Total:</th>
                                        <td><?php echo number_format($subtotal, 0); ?> VND</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Order Status</h2>
                            <form action="order_details.php" method="POST">
                                <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($order['order_id']); ?>">
                                <div class="mb-3">
                                    <select name="order_status" id="order_status" class="form-control">
                                        <?php
                                        $status_options = ['pending', 'shipped', 'delivered', 'cancelled'];
                                        foreach ($status_options as $status) {
                                            $selected = ($order['order_status'] === $status) ? 'selected' : '';
                                            echo "<option value=\"$status\" $selected>" . ucfirst($status) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" name="update_status">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>