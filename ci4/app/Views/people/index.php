<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h1 class="my-3">List People</h1>

      <form action="/people" method="get">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Enter the keyword here.." name="keyword">
          <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
      </form>

    </div>
  </div>

  <div class="row">
    <div class="col">
      <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-primary" role="alert">
          <?= session()->getFlashdata('message'); ?>
        </div>
      <?php endif ?>

      <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 + (6 * ($currentPage - 1)); ?>
          <?php foreach ($people as $person) : ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $person['name']; ?></td>
              <td><?= $person['address']; ?></td>
              <td>
                <a href="" class="btn btn-success">Detail</a>
              </td>
            <?php endforeach; ?>
            </tr>
        </tbody>
      </table>

      <?= $pager->links('people', 'people_pagination'); ?>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>