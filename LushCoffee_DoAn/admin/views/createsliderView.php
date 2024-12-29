<?php include __DIR__ . '/../layouts/app.php'; ?>
<?php include __DIR__ . '/../layouts/sidebar.php'; ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Slider</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="list-slider.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php elseif (isset($success_message)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($success_message) ?></div>
        <?php endif; ?>

        <form action="create-slider.php" method="POST" enctype="multipart/form-data">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <!-- Slider Name -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="slider_name">Slider Name</label>
                                    <input type="text" name="slider_name" id="slider_name" class="form-control" placeholder="Name" required>
                                </div>
                            </div>
                        </div>

                        <!-- Slider Image -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Upload Slider Image</h2>
                                <input type="file" name="slider_image" id="slider_image" class="form-control" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pb-5 pt-3">
                            <button class="btn btn-primary" name="create_slider">Create</button>
                            <a href="list-slider.php" class="btn btn-primary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
