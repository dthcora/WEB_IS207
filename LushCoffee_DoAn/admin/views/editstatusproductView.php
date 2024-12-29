<?php include __DIR__ . '/../layouts/app.php'; ?>
<?php include __DIR__ . '/../layouts/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Status_products</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="list-status-product.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="edit-status-products.php?status_products_id=<?php echo $status_product['status_products_id']; ?>" method="POST">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="status_products_name" id="status_products_name" class="form-control" 
                                           placeholder="Name" value="<?php echo $status_product['status_products_name']; ?>">
                                    <input type="hidden" name="status_products_id" 
                                           value="<?php echo $status_product['status_products_id']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" name="update_status_products">Update</button>
                    <a href="list-status-product.php" class="btn btn-primary">Cancel</a>
                </div>
            </div>
        </form>
        </section>
    </div>