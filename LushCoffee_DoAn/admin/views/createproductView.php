<?php include __DIR__ . '/../layouts/app.php'; ?>
<?php include __DIR__ . '/../layouts/sidebar.php'; ?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Product</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="../public/list-product.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="../public/create-product.php" method="POST" enctype="multipart/form-data">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <!-- Product Name -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <label for="product_name">Product Name</label>
                                <input type="text" name="product_name" id="product_name" class="form-control" required>
                            </div>
                        </div>

                        <!-- Product Category -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <label for="product_category">Product Category</label>
                                <select name="product_category" id="product_category" class="form-control" required>
                                    <option value="">Select Category</option>
                                    <?php
                                    foreach ($categories as $category) {
                                        echo "<option value=\"{$category['category_id']}\">{$category['category_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Product Status -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <label for="product_status">Product Status</label>
                                <select name="product_status" id="product_status" class="form-control" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    foreach ($statuses as $status) {
                                        echo "<option value=\"{$status['status_products_id']}\">{$status['status_products_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Other Fields -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <label for="product_description">Description</label>
                                <textarea name="product_description" id="product_description" class="form-control" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <label for="image">Upload Image</label>
                                <input type="file" name="image" id="image" class="form-control" required>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <label for="product_price">Price</label>
                                <input type="number" name="product_price" id="product_price" class="form-control" step="0.01" required>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary" name="create_product">Create</button>
                    <a href="../public/list-product.php" class="btn btn-primary">Cancel</a>
                </div>
            </div>
        </form>
    </section>
</div>

