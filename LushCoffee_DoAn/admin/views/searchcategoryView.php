<?php include __DIR__ . '/../layouts/app.php'; ?>
<?php include __DIR__ . '/../layouts/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Search Results for "<?php echo htmlspecialchars($query); ?>"</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="list-category.php" class="btn btn-primary">Back</a>
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
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($categories->num_rows > 0) { 
                                while ($category = $categories->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $category['category_id']; ?></td>
                                        <td><?php echo $category['category_name']; ?></td>
                                        <td>
                                            <a href="edit-category.php?category_id=<?php echo $category['category_id']; ?>" class="text-primary">
                                                Edit
                                            </a>
                                            <a href="delete-category.php?category_id=<?php echo $category['category_id']; ?>" class="text-danger">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="3" class="text-center">No results found</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

