<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-6">
      <h1 class="my-3">Detail Comic</h1>

      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="/img/<?= $comic['cover']; ?>" class="img-fluid rounded-start">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $comic['title']; ?></h5>
              <p class="card-text"><small class="text-body-secondary"><?= $comic['author']; ?></small></p>
              <p class="card-text"><b>Publisher : </b><?= $comic['publisher']; ?></p>
              <p>
                <b>Description : </b> <br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, minima!
              </p>

              <a href="/comics/<?= $comic['slug']; ?>/edit" class="btn btn-warning">Edit</a>
              <form action="/comics/<?= $comic['id']; ?>" method="post" class="d-inline">
                <?php csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure, want to delete this comic ?');">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<?= $this->endSection(); ?>