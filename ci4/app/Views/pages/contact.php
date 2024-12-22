<?php

use PhpParser\Node\Stmt\Foreach_;
?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h2>Contact Us</h2>

      <?php foreach ($personalData as $row) : ?>
        <ul>
          <li><?= $row['name']; ?></li>
          <li><?= $row['address']; ?></li>
          <li><?= $row['phone_numbers']; ?></li>
        </ul>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>