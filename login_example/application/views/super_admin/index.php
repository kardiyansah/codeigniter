
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
            <div class="col-lg-6">

                <?= $this->session->flashdata('message'); ?>
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            
                <a href="" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#accessMenuModal">Create New Role</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($role as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $row['role']; ?></td>
                            <td>
                                <a href="" class="badge rounded-pill text-bg-primary">Edit</a>
                                <a href="<?= base_url('super_admin/roleaccess/') . $row['id']; ?>" class="badge rounded-pill text-bg-warning">Access</a>
                                <a href="" class="badge badge rounded-pill text-bg-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="accessMenuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Menu</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('super_admin'); ?>" method="post">
        <div class="modal-body">
            <div class="">
                <input type="text" class="form-control" id="role" name="role" autocomplete="off" placeholder="Role Title">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Craete New Menu</button>
        </div>
      </form>
    </div>
  </div>
</div>