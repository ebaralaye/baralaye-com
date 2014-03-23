<div class="page-body catalog">
  <div class="header">
    <h1>{tag_name}</h1>
    <p>{tag_description}</p>
  </div>
  <div class="body">
    <ul class="productSmall">
        <?php foreach ($products as $product): ?>
        <li class="productItem">
            <h4 class="name"><a href="<?php echo $product['url']; ?>"><?php echo $product['name']; ?></a></h4>
            <div class="image">
                <a href="<?php echo $product['url']; ?>"><img src="/images/art/portfolio/small/<?php echo $product['image']; ?>.jpg" alt="<?php echo $product['name']; ?>" /></a>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
  </div>
</div>
