<ul class="product-list gallery">
  <?php foreach($gallery as $item): ?>
    <li>
      <h4 class="name"><a href="http://<?php echo $item['url']; ?>" target="_blank"><?php echo $item['name']; ?></a></h4>
      <div class="images ltbx">
        <?php $slides = explode(',', $item['images']); ?>
        <?php foreach($slides as $slide): ?>
          <a href="<?php echo $gallery_dirs[1]; ?><?php echo $item['id']; ?>_<?php echo $slide ?>.jpg" 
            <?php if (array_search($slide, $slides)==0): ?>class="main"<?php endif; ?> 
            rel="<?php echo $item['id']; ?>" 
            title="<?php echo $item['name']; ?>">
            <img alt="<?php echo $item['name']; ?>" src="<?php echo $gallery_dirs[0]; ?><?php echo $item['id']; ?>_<?php echo $slide ?>.jpg" />
          </a>
        <?php endforeach; ?>
      </div>
    </li>
  <?php endforeach; ?>
</ul>
