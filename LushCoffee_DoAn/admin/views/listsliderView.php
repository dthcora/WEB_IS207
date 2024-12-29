<?php include __DIR__ . '/../layouts/app.php'; ?>
<?php include __DIR__ . '/../layouts/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Slider</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-slider.php" class="btn btn-primary">New Slider</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools"></div>
                </div>
                <div class="card-body table-responsive p-0">
                    <?php if (isset($_GET['message'])): ?>
                    <div class="alert alert-success" role="alert">
                        <?= htmlspecialchars($_GET['message']); ?>
                    </div>
                    <?php endif; ?>
                    <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= htmlspecialchars($_GET['error']); ?>
                    </div>
                    <?php endif; ?>

                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th width="60">ID</th>
                                <th width="500">Slider Image</th>
                                <th width="10">Slider Name</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if ($sliders->num_rows > 0): 
                                $stt = $offset + 1;
                                while ($slider = $sliders->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $stt++; ?></td>
                                    <td>
                                        <img src="../assets/img/<?= htmlspecialchars($slider['slider_image']); ?>" 
                                             alt="Slider Image" 
                                             style="width: 400px; height: 150px; object-fit: cover; border-radius: 8px;">
                                    </td>
                                    <td><?= htmlspecialchars($slider['slider_name']); ?></td>
                                    <td>
                                        <a href="edit-slider.php?slider_id=<?= $slider['slider_id']; ?>">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="delete-slider.php?slider_id=<?= $slider['slider_id']; ?>" class="text-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr><td colspan="4">No Sliders Found.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
