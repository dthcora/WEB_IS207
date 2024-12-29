<?php include __DIR__ . '/../layouts/app.php'; ?>
<?php include __DIR__ . '/../layouts/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Status Products</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-status-product.php" class="btn btn-primary">Create Status Products</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th width="60">ID</th>
                                <th>Name</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1; ?>
                            <?php if ($statusProducts->num_rows > 0): ?>
                                <?php while ($statusProduct = $statusProducts->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= $counter++ ?></td>
                                        <td><?= $statusProduct['status_products_name'] ?></td>
                                        <td>
                                            <a href="edit-status-products.php?status_products_id=<?= $statusProduct['status_products_id'] ?>"><i class="fas fa-edit"></i></a>
                                            <a href="delete-status-products.php?status_products_id=<?= $statusProduct['status_products_id'] ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3">No Status Products Found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
