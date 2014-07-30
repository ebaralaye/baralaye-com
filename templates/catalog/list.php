<div class="page-body catalog">
  <div class="header">
    <h1><?php echo $catalog['title']; ?></h1>
    <?php if ($catalog['description'] != "") {echo "<p>".$catalog['description']."</p>";} ?>
  </div>
  <ul class="product-list">
    <?php foreach ($products as $product): ?>
      <li class="item">
        <h4 class="title"><a href="<?php echo $product['url']; ?>">
          <?php if ($product['name'] == 'Untitled'): ?>
            <span class="id"><?php echo $product['id']; ?></span>
          <?php else: ?>
            <span class="name"><?php echo $product['name']; ?></span>
          <?php endif; ?>
        </a></h4>
        <div class="image"><a href="<?php echo $product['url']; ?>"><img src="/images/art/portfolio/small/<?php echo $product['image']; ?>.jpg" alt="<?php echo $product['name']; ?>" /></a></div>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
