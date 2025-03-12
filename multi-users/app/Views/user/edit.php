<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= user()->username; ?></h1>

</div>
<?= $this->endSection(); ?>