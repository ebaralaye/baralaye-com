<div class="page-body catalog">
  <div class="header">
    <h1>{tag_name}</h1>
    <p>{tag_description}</p>
  </div>
  <div class="body">
    <ul class="products">
        <?php foreach ($products as $product): ?>
        <li><h4><?php echo $product['name']; ?></h4></li>
        <?php endforeach; ?>
    </ul>
  </div>
</div>
