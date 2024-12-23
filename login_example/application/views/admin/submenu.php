
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
            <div class="col-lg">

                <?= $this->session->flashdata('message'); ?>
                <?= form_error('submenu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('url', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('icon', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            
                <a href="" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#subMenuModal">Create New Submenu</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Menu</th>
                            <th scope="col">URL</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Active</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($submenu as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $row['title']; ?></td>
                            <td><?= $row['menu']; ?></td>
                            <td><?= $row['url']; ?></td>
                            <td><?= $row['icon']; ?></td>
                            <td><?= $row['is_active']; ?></td>
                            <td>
                                <a href="" class="badge rounded-pill text-bg-primary btn-submenu" data-bs-toggle="modal" data-bs-target="#subMenuModal" data-id="<?= $row['id']; ?>">Edit</a>
                                <a href="<?= base_url('admin/deletesubmenu/') . $row['id']; ?>" class="badge badge rounded-pill text-bg-danger" onclick="return confirm('Are you sure ?');">Delete</a>
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
<div class="modal fade" id="subMenuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="submenuModal">Add New Submenu</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('admin/submenu'); ?>" method="post">
        <div class="modal-body">
            
            <div class="mb-3">
                <input type="text" class="form-control" id="submenu" name="submenu" autocomplete="off" placeholder="Submenu Title">
            </div>
            <div class="mb-3">
                <select name="menu" id="menu" class="form-control">
                    <option value="">Select Menu</option>
                    <?php foreach($menu as $row) : ?>
                    <option value="<?= $row['id']; ?>"><?= $row['menu']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="url" name="url" autocomplete="off" placeholder="Submenu URL">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="icon" name="icon" autocomplete="off" placeholder="Submenu Icon">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" checked value="1" id="is_active" name="is_active">
                <label class="form-check-label" for="is_active">
                    Active ?
                </label>
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-submenuModal">Craete New Submenu</button>
        </div>
      </form>
    </div>
  </div>
</div>