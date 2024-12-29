<?php include __DIR__ . '/../layouts/app.php'; ?>
<?php include __DIR__ . '/../layouts/sidebar.php'; ?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-product.php" class="btn btn-primary">New Product</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <form class="d-flex" action="../public/search-product.php" method="GET">
                            <input class="form-control me-2" type="search" name="query_admin" placeholder="Search Products" aria-label="Search" required>
                            <button class="btn btn-outline-dark" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th width="60">ID</th>
                                <th width="80">Product Image</th>
                                <th>Product Name</th>
                                <th>Product Category</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $stt = $totalProducts - ($page - 1) * $limit; 
                            if ($products->num_rows > 0): 
                                while ($row = $products->fetch_assoc()): 
                                    $status = $row['status_products_name'];
                                    $badgeClass = 'badge-dark'; 
                                    if ($status === 'New Product') $badgeClass = 'badge-danger';
                                    elseif ($status === 'In Stock') $badgeClass = 'badge-success';
                                    elseif ($status === 'Pre Order') $badgeClass = 'badge-info';
                                    elseif ($status === 'Sold Out') $badgeClass = 'badge-secondary';
                                    ?>
                                    <tr>
                                        <td><?php echo $stt--; ?></td>
                                        <td><img class="img-fluid mb-3" src="../assets/img/<?php echo $row['product_image']; ?>" alt="Product Image"></td>
                                        <td><?php echo $row['product_name']; ?> <br> Quantity: <?php echo $row['quantity']; ?></td>
                                        <td><?php echo $row['category_name']; ?></td>
                                        <td><?php echo number_format($row['product_price'], 0, '.', '.'); ?> VND</td>
                                        <td><span class="badge <?php echo $badgeClass; ?> p-2 text-uppercase"><?php echo htmlspecialchars($status); ?></span></td>
                                        <td>
                                            <a href="edit-product.php?product_id=<?php echo $row['product_id'] ?>"><i class="fas fa-edit"></i></a>
                                            <a href="delete-product.php?product_id=<?php echo $row['product_id'] ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr><td colspan="7">No products found.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <div class="card-footer clearfix">
        <ul class="pagination pagination m-0 float-right">
            <?php if ($page > 1): ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>">«</a></li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php if ($i == $page) echo 'active'; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>
            <?php if ($page < $totalPages): ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1; ?>">»</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>


