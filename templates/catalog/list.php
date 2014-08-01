<div class="page-body catalog">
  <div class="header">
    <h1><?= $catalog['title']; ?></h1>
    <?php if ($catalog['description'] != null) {echo "<p>".$catalog['description']."</p>";} ?>
  </div>
  <ul class="product-list">
    <?php foreach ($products as $product): ?>
      <li class="item">
        <div class="image"><a href="<?= $product['url']; ?>"><img src="/images/art/portfolio/small/<?= $product['image']; ?>.jpg" alt="<?= $product['name']; ?>" /></a></div>
        <h4 class="title"><a href="<?= $product['url']; ?>">
          <?php if ($product['name'] != null): ?>
            <span class="name"><?= $product['name']; ?></span>
          <?php else: ?>
            <span class="id"><?= $product['id']; ?></span>
          <?php endif; ?>
        </a></h4>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
