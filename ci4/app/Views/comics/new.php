<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-6">
      <h2 class="my-3">Form Add New Comic</h2>

      <form action="/comics" method="post" enctype="multipart/form-data">
        <!-- CSRF (Cross Site Request Forgery) -->
        <?= csrf_field(); ?>
        <div class="mb-3 row">
          <label for="title" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" placeholder="Enter the title here" value="<?= old('title'); ?>" autofocus>
            <?php if ($validation) : ?>
              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('title'); ?>
              </div>
            <?php endif ?>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="author" class="col-sm-2 col-form-label">Author</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('author')) ? 'is-invalid' : ''; ?>" id="author" name="author" placeholder="Enter the author's name here" value="<?= old('author'); ?>">
            <?php if ($validation) : ?>
              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('author'); ?>
              </div>
            <?php endif ?>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('publisher')) ? 'is-invalid' : ''; ?>" id="publisher" name="publisher" placeholder="Enter the publisher here" value="<?= old('publisher'); ?>">
            <?php if ($validation) : ?>
              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('publisher'); ?>
              </div>
            <?php endif ?>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="cover" class="col-sm-2 col-form-label">Cover</label>
          <div class="col-sm-2">
            <img src="/img/default.png" class="img-thumbnail img-preview">
          </div>
          <div class="col-sm-8">
            <input class="form-control <?= ($validation->hasError('cover')) ? 'is-invalid' : ''; ?>" type="file" id="cover" name="cover" onchange="previewImage();">
            <?php if ($validation) : ?>
              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('cover'); ?>
              </div>
            <?php endif ?>
          </div>
        </div>

        <button type="submit" class="btn btn-primary" name="btn-create">Add New Comic</button>
      </form>

    </div>
  </div>
</div>
<?= $this->endSection(); ?>