<div class="page-body catalog-item v-align-parent">
  <h1 class="title v-align <?php if($title_type != null){ echo $title_type; }; ?>"><?= $title; ?></h1>
  <?php $poplets = explode(',', $image_poplets); ?>
  <?php if (count($poplets) > 1): ?>
    <div class="image-slider v-align">
      <ul class="bxslider catalog">
        <?php foreach($poplets as $poplet): ?>
          <li><a href="/images/art/portfolio/big/<?= $id.'-'.$poplet ?>.jpg" rel="gallery-1"><img src="/images/art/portfolio/big/<?= $id.'-'.$poplet ?>.jpg" alt="<?= $id.$poplet ?>" /></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div id="bx-pager" class="image-poplets v-align">
      <?php foreach($poplets as $key => $poplet): ?>
        <a data-slide-index="<?= $key ?>" href=""><img src="/images/art/portfolio/small/<?= $id.'-'.$poplet ?>.jpg" alt="<?= $id.'-'.$poplet ?>" /></a>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <div class="image v-align">
      <a href="/images/art/portfolio/big/<?= $image ?>.jpg"><img class="main" src="/images/art/portfolio/big/<?= $image ?>.jpg" alt="<?= $image ?>" /></a>
    </div>
  <?php endif; ?>
  <div class="details">
    <ul>
      <li class="specs">
        <ul>
          <li class="medium"><?= $medium; ?></li>
          <?php if ($dim_width != null): ?>
            <li class="dimensions"><?= $dim_height,"&quot; x ", $dim_width,"&quot; x ",$dim_depth,"&quot;"; ?></li>
          <?php endif; ?>
          <!--
          <?php if ($weight != null && $status != 2): ?>
            <li class="weight">Weight: <span><?= $weight; ?></span> lbs</li>
          <?php endif; ?>
          -->
          <li class="year"><?php $year = date("Y", strtotime($date)); echo $year?></li>
          <li class="price">
            <?php if ($price != null && $status == 1): ?>
              $<?= $price; ?>
            <?php elseif ($status == 3): ?>
              <a href="/contact" target="_blank" class="inquire">inquire</a>
            <?php else: ?>
              acquired
            <?php endif; ?>
          </li>
          <?php if ($edition_index != null): ?>
            <li class="edition">
              <span><?= $edition_index; ?>/<?= $edition_cap; ?></span>
              <?php if ($stock == 0) {echo "<strike>stock</strike>";} ?>
            </li>
          <?php endif; ?>
        </ul>
      </li>
      <?php if($description != null): ?>
        <li class="description"><?= $description; ?></li>
      <?php endif; ?>
    </ul>
  </div>
</div>
