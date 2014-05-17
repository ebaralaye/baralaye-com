<div class="page-body catalog">
    <div class="header">
      <h1><?php echo $catalog['title']; ?></h1>
      <?php if ($catalog['description'] != "") {echo "<p>".$catalog['description']."</p>";} ?>
    </div>
    <div class="body">
        <ul class="product-list">
            <?php foreach ($products as $product): ?>
                <li class="item">
                    <h4 class="name"><a href="<?php echo $product['url']; ?>"><?php echo $product['name']; ?></a></h4>
                    <div class="image"><a href="<?php echo $product['url']; ?>"><img src="/images/art/portfolio/small/<?php echo $product['image']; ?>.jpg" alt="<?php echo $product['name']; ?>" /></a></div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
