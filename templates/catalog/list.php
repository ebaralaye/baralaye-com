<div class="page-body catalog">
  <div class="header">
    <h1><?= $catalog['title']; ?></h1>
    <?php if ($catalog['description'] != null) {echo "<p>".$catalog['description']."</p>";} ?>
  </div>
  <ul class="product-list">
    <?php foreach ($products as $product): ?>
      <li class="item">
        <div class="image"><a href="<?= $product['url']; ?>"><img src="/images/art/portfolio/small/<?= $product['image']; ?>.jpg" alt="<?= $product['title']; ?>" /></a></div>
        <h4 class="title <?php if($product['title_type'] != null){ echo $product['title_type']; }; ?>"><a href="<?= $product['url']; ?>"><?= $product['title']; ?></a></h4>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
