<div class="page-body catalog">
  <div class="header">
    <h1><?= $catalog['title']; ?></h1>
    <?php if ($catalog['description'] != null) {echo "<p>".$catalog['description']."</p>";} ?>
  </div>
  <ul class="item-list catalog">
    <?php foreach ($products as $product): ?>
      <li class="item">
        <?php
          // Set the product image based on the presence of poplets
          $product_image = ($product['image']) ? ($product['id']."-".$product['image']) : $product['id'];
          // Set the product url based on availability of a product name (defaults to id)
          $product_url = ($product['name']) ? ($product['url']."/".$product['name']) : ($product['url']."/".$product['id']);
        ?>
        <a href="<?= $product_url; ?>" style="background-image:url(/images/art/portfolio/large/<?= $product_image; ?>.jpg)" />
          <span class="title <?php if($product['title_type'] != null){ echo $product['title_type']; }; ?>"><?= $product['title']; ?></span>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
