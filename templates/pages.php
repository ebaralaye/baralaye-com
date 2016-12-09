<div class="page-body <?= $name ?>">
  <header>
    <h1><?= $name ?></h1>
    <?php if ($image_src): ?>
      <h2><img src=<?= $image_src ?> alt=<? $image_alt ?> /></h2>
    <?php endif ?>
  </header>
  <div class="page-main">
    <?= $content_long ?>
  </div>
</div>
