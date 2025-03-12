<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">John Doe</h1>

  <div class="row">
    <div class="col-md-10 col-lg-8 col-xl-6">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <img src="<?= base_url('img/' . user()->user_image); ?>" class="img-fluid rounded-start" alt="<?= user()->user_image; ?>">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Personal Profile</h5>
              <hr>
              <p class="card-text"><?= user()->username; ?></p>
              <?php if (user()->fullname) : ?>
                <p class="card-text"><?= user()->fullname; ?></p>
              <?php endif; ?>
              <small class="text-body-secondary d-block mb-3"><?= user()->email; ?></small>
              <a href="/user/<?= user_id(); ?>/edit" class="btn btn-primary"><i class="fa-solid fa-user-pen"></i> Edit Profile</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<?= $this->endSection(); ?>