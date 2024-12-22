<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-6">
      <h2 class="my-3">Form Edit Comic</h2>

      <form action="/comics/<?= $comic['id']; ?>" method="post" enctype="multipart/form-data">
        <!-- CSRF (Cross Site Request Forgery) -->
        <?= csrf_field(); ?>
        <input type="hidden" name="slug" value="<?= $comic['slug']; ?>">
        <input type="hidden" name="cover" value="<?= $comic['cover']; ?>">
        <input type="hidden" name="_method" value="PUT">

        <div class="mb-3 row">
          <label for="title" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">
            <?php if ($validation) : ?>
              <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" placeholder="Enter the title here" value="<?= old('title'); ?>" autofocus>
              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('title'); ?>
              </div>
            <?php else : ?>
              <input type="text" class="form-control" id="title" name="title" placeholder="Enter the title here" value="<?= $comic['title']; ?>" autofocus>
            <?php endif; ?>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="author" class="col-sm-2 col-form-label">Author</label>
          <div class="col-sm-10">
            <?php if ($validation) : ?>
              <input type="text" class="form-control <?= ($validation->getError('author')) ? 'is-invalid' : ''; ?>" id="author" name="author" placeholder="Enter the author's name here" value="<?= old('author') ?>">
              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('author'); ?>
              </div>
            <?php else : ?>
              <input type="text" class="form-control" id="author" name="author" placeholder="Enter the author's name here" value="<?= $comic['author']; ?>">
            <?php endif ?>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
          <div class="col-sm-10">
            <?php if ($validation) : ?>
              <input type="text" class="form-control <?= ($validation->hasError('publisher')) ? 'is-invalid' : ''; ?>" id="publisher" name="publisher" placeholder="Enter the publisher here" value="<?= old('publisher'); ?>">
              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('publisher'); ?>
              </div>
            <?php else : ?>
              <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Enter the publisher here" value="<?= $comic['publisher']; ?>">
            <?php endif ?>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="cover" class="col-sm-2 col-form-label">Cover</label>
          <div class="col-sm-2">
            <img src="/img/<?= $comic['cover']; ?>" class="img-thumbnail img-preview">
          </div>
          <div class="col-sm-8">
            <input class="form-control" type="file" id="cover" name="cover" onchange="previewImage();">
          </div>
        </div>

        <button type="submit" class="btn btn-primary" name="btn-create">Edit Comic</button>
      </form>

    </div>
  </div>
</div>
<?= $this->endSection(); ?>