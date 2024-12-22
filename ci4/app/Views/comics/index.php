<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="my-3">List Comics</h1>
      <a href="/comics/new" class="btn btn-primary mb-3">Add New Comic</a>
      <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-primary" role="alert">
          <?= session()->getFlashdata('message'); ?>
        </div>
      <?php endif ?>

      <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Cover</th>
            <th scope="col">Title</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($comics as $comic) : ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><img src="/img/<?= $comic['cover']; ?>" class="cover"></td>
              <td><?= $comic['title']; ?></td>
              <td>
                <a href="/comics/<?= $comic['slug']; ?>" class="btn btn-success">Detail</a>
              </td>
            <?php endforeach; ?>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>