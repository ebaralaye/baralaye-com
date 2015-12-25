<ul class="product-list gallery">
  <?php foreach($gallery as $item): ?>
    <li class="item images ltbx">
      <?php $slides = explode(',', $item['images']); ?>
      <?php foreach($slides as $slide): ?>
        <a href="<?php echo $gallery_dirs[1]; ?><?php echo $item['id']; ?>_<?php echo $slide ?>.jpg" 
          <?php if (array_search($slide, $slides)==0): ?>class="main"<?php endif; ?> 
          rel="<?php echo $item['id']; ?>" 
          style="background-image:url(<?php echo $gallery_dirs[1]; ?><?php echo $item['id']; ?>_<?php echo $slide ?>.jpg)" 
          title="<?php echo $item['name']; ?>">
          <span class="title"><?php echo $item['name']; ?></span>
        </a>
      <?php endforeach; ?>
    </li>
  <?php endforeach; ?>
</ul>
