<div class="page-body catalog">
  <div class="header">
    <h1><?= $catalog['title']; ?></h1>
    <?php if ($catalog['description'] != null) {echo "<p>".$catalog['description']."</p>";} ?>
  </div>
  <ul class="item-list catalog">
    <?php foreach ($products as $product): ?>
      <li class="item">
        <?php if ($product['image']): ?>
          <a href="<?= $product['url']; ?>" style="background-image:url(/images/art/portfolio/large/<?= $product['id']; ?>-<?= $product['image']; ?>.jpg)" />
        <?php else: ?>
          <a href="<?= $product['url']; ?>" style="background-image:url(/images/art/portfolio/large/<?= $product['id']; ?>.jpg)" />
        <?php endif ?>
          <span class="title <?php if($product['title_type'] != null){ echo $product['title_type']; }; ?>"><?= $product['title']; ?></span>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
