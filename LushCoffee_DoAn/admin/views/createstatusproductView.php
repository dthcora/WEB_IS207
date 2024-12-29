<?php include __DIR__ . '/../layouts/app.php'; ?>
<?php include __DIR__ . '/../layouts/sidebar.php'; ?>

<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Status Products</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="list-status-product.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="create-status-product.php" method="POST">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <?php if (isset($_GET['error'])): ?>
                            <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']); ?></div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <label for="status_products_name">Name</label>
                            <input type="text" name="status_products_name" id="status_products_name" class="form-control" placeholder="Enter status product name" required>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" name="create_status_products">Create</button>
                    <a href="list-status-product.php" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
    </section>
</div>

