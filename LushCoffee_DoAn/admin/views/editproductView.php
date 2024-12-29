<?php include __DIR__ . '/../layouts/app.php'; ?>
<?php include __DIR__ . '/../layouts/sidebar.php'; ?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Product</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="list-product.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="edit-product.php" method="POST" enctype="multipart/form-data">
            <div class="container-fluid">
                <?php if (isset($product)): ?>
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['product_id']); ?>">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <!-- Product Name -->
                                    <div class="mb-3">
                                        <label for="product_name">Product Name</label>
                                        <input type="text" name="product_name" id="product_name" class="form-control"
                                               value="<?php echo htmlspecialchars($product['product_name']); ?>" required>
                                    </div>

                                    <!-- Product Category -->
                                    <div class="mb-3">
                                        <label for="product_category">Product Category</label>
                                        <select name="product_category" id="product_category" class="form-control" required>
                                            <?php while ($category = $categories->fetch_assoc()): ?>
                                                <option value="<?php echo htmlspecialchars($category['category_id']); ?>"
                                                    <?php echo ($category['category_id'] == $product['category_id']) ? 'selected' : ''; ?>>
                                                    <?php echo htmlspecialchars($category['category_name']); ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>

                                    <!-- Product Status -->
                                    <div class="mb-3">
                                        <label for="product_status">Product Status</label>
                                        <select name="product_status" id="product_status" class="form-control" required>
                                            <?php while ($status_products = $status_products->fetch_assoc()): ?>
                                                <option value="<?php echo htmlspecialchars($status_products['status_products_id']); ?>"
                                                    <?php echo ($status_products['status_products_id'] == $product['status_products_id']) ? 'selected' : ''; ?>>
                                                    <?php echo htmlspecialchars($status_products['status_products_name']); ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>

                                    <!-- Product Price -->
                                    <div class="mb-3">
                                        <label for="product_price">Price</label>
                                        <input type="number" name="product_price" id="product_price" class="form-control"
                                               value="<?php echo htmlspecialchars($product['product_price']); ?>" step="0.01" required>
                                    </div>

                                    <!-- Other fields... -->
                                </div>
                            </div>

                            <!-- Product Images (existing and upload options) -->
                            <!-- Repeat for product_image, product_image2, etc. -->

                            <!-- Product Description -->
                            <div class="mb-3">
                                <label for="product_description">Description</label>
                                <textarea name="product_description" id="product_description" class="form-control">
                                    <?php echo htmlspecialchars($product['product_description']); ?>
                                </textarea>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" name="update_product">Update</button>
                    <a href="list-product.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </section>
</div>