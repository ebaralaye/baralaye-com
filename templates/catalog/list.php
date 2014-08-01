<div class="page-body catalog">
  <div class="header">
    <h1><?= $catalog['title']; ?></h1>
    <?php if ($catalog['description'] != null) {echo "<p>".$catalog['description']."</p>";} ?>
  </div>
  <ul class="product-list">
    <?php foreach ($products as $product): ?>
      <?php 
        if($product['name'] == null) {
          $product['title_type'] = "id";
          $product['title'] = $product['id'];
        }
        else {
          $product['title_type'] = "name";
          $product['title'] = $product['name'];
        };
      ?>
      <li class="item">
        <div class="image"><a href="<?= $product['url']; ?>"><img src="/images/art/portfolio/small/<?= $product['image']; ?>.jpg" alt="<?= $product['title']; ?>" /></a></div>
        <h4 class="title <?= $product['title_type'] ?>"><a href="<?= $product['url']; ?>"><?= $product['title']; ?></a></h4>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
