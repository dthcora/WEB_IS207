<?php include __DIR__ . '/../layouts/app.php'; ?>
<?php include __DIR__ . '/../layouts/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update User</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="list-user.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <form action="../controllers/EditEditUserController.php" method="POST">
            <div class="container-fluid">
                <div class="card">
                    <?php foreach ($users as $user) { ?>
                        <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="user_name" id="user_name" class="form-control"
                                            placeholder="Name" value="<?php echo $user['user_name'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="text" name="user_email" id="user_email" class="form-control"
                                            placeholder="Email" value="<?php echo $user['user_email'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" name="user_password" id="user_password" class="form-control"
                                            placeholder="Password" value="<?php echo $user['user_password'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" name="update_user">Update</button>
                    <a href="list-user.php" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </form>
    </section>
</div>

