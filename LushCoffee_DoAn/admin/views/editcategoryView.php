<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
</head>
<body>
    <?php include __DIR__ . '/../layouts/app.php'; ?>
    <?php include __DIR__ . '/../layouts/sidebar.php'; ?>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Category</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="list-category.php" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <form action="../public/edit-category.php" method="POST">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <?php if (isset($category)) {
                                    foreach ($category as $categories) { ?>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="name">Name</label>
                                                <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Name" value="<?php echo $categories['category_name']; ?>">
                                                <input type="hidden" name="category_id" value="<?php echo $categories['category_id']; ?>">
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                    <div class="pb-5 pt-3">
                        <button class="btn btn-primary" name="update_category">Update</button>
                        <a href="list-category.php" class="btn btn-primary">Cancel</a>
                    </div>
                </div>
            </form>
        </section>
    </div>
</body>
</html>