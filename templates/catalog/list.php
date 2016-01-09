<div class="page-body catalog">
  <div class="header">
    <h1><?= $catalog['title']; ?></h1>
    <?php if ($catalog['description'] != null) {echo "<p>".$catalog['description']."</p>";} ?>
  </div>
  <ul class="item-list catalog">
    <?php foreach ($products as $product): ?>
      <li class="item">
        <a href="<?= $product['url']; ?>" style="background-image:url(/images/art/portfolio/large/<?= $product['image']; ?>.jpg)" />
          <span class="title <?php if($product['title_type'] != null){ echo $product['title_type']; }; ?>"><?= $product['title']; ?></span>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
