
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
            <div class="col-lg-6">

            <?= $this->session->flashdata('message'); ?>

                <form action="<?= base_url('user/changepassword'); ?>" method="post">
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" name="current_password" id="current_password">
                        <?= form_error('current_password', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" name="new_password" id="new_password">
                        <?= form_error('new_password', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="repeat_password" class="form-label">Repeat Password</label>
                        <input type="password" class="form-control" name="repeat_password" id="repeat_password">
                        <?= form_error('repeat_password', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                    
                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->