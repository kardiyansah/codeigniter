<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">User List</h1>

  <div class="row">
    <div class="col-lg-10">
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($users as $user) : ?>
            <tr>
              <th class="align-middle" scope="row"><?= $i++; ?></th>
              <td class="align-middle"><?= $user->username; ?></td>
              <td class="align-middle"><?= $user->email; ?></td>
              <td class="align-middle"><span class="badge badge-<?= ($user->roleName == 'admin') ? 'warning' : 'success'; ?>"><?= $user->roleName; ?></span></td>
              <td>
                <a href="<?= base_url('admin/' . $user->userId); ?>" class="btn btn-info"><i class="fa-solid fa-eye"></i> Detail</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>