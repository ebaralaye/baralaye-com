<div class="page-body <?= $name ?>">
  <header>
    <h1><?= $name ?></h1>
    <?php if ($image_src): ?>
      <h2><img src="<?= $image_src ?>" alt="<? $image_alt ?>" /></h2>
    <?php endif ?>
  </header>
  <main>
    <section>
      <?= $content_long ?>
    </section>
    <?php if ($photoset_id): ?>
      <section>
        <ul id="set_<?= $photoset_id ?>" class="item-list photoset"></ul>
      </section>
    <?php endif ?>
  </main>
</div>
