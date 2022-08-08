<div class="page-body catalog-item">
  <h1 class="title v-align <?php if($title_type != null){ echo $title_type; }; ?>"><?= $title; ?></h1>
  <?php $poplets = explode(',', $image_poplets); ?>
  <?php if (count($poplets) > 1): ?>
    <div class="image-slider v-align">
      <ul class="bxslider catalog">
        <?php foreach($poplets as $poplet): ?>
          <li><a href="/images/art/<?= $catalog ?>/large/<?= $id.'-'.$poplet ?>.jpg" data-fancybox="gallery-1"><img src="/images/art/<?= $catalog ?>/<?= $id ?>/large/<?= $id.'-'.$poplet ?>.jpg" alt="<?= $id.$poplet ?>" /></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <ul id="bx-pager" class="image-poplets v-align">
      <?php foreach($poplets as $key => $poplet): ?>
        <li><a data-slide-index="<?= $key ?>" href=""><img src="/images/art/<?= $catalog ?>/<?= $id ?>/small/<?= $id.'-'.$poplet ?>.jpg" alt="<?= $id.'-'.$poplet ?>" /></a></li>
        <!-- // Run vertical align as each poplet loads -->
      <?php endforeach; ?>
    </ul>
  <?php else: ?>
    <div class="image v-align">
      <a href="/images/art/<?= $catalog ?>/large/<?= $id ?>.jpg"><img class="main" src="/images/art/<?= $catalog ?>/<?= $id ?>/large/<?= $id ?>.jpg" alt="<?= $id ?>" /></a>
    </div>
    <script type="text/javascript">Baralaye.Template.VAlign();</script>
  <?php endif; ?>
  <div class="details">
  <!-- status: 1 - for sale, show price, 2 - for sale, hidden price (inquire), 3 not for sale -->
    <ul>
      <li class="specs">
        <ul>
          <!-- // Exhibitions -->
          <?php if ($catalog == "exhibitions"): ?>
            <li class="period"><?= date("m/d/Y", strtotime($period_from))." - ".date("m/d/Y", strtotime($period_to)); ?></li>
            <?php if ($press_release != NULL): ?>
              <li class="press-release"><a href="/images/art/exhibitions/<?= $id ?>/docs/press-release.pdf">Press Release</a></li>
            <?php endif; ?>
            <?php if ($statement != NULL): ?>
              <li class="statement"><a href="/images/art/exhibitions/<?= $id ?>/docs/statement.pdf">Curatorial Statement</a></li>
            <?php endif; ?>
            <?php if ($press != NULL): ?>
              <li class="press"><a href="/images/art/exhibitions/<?= $id ?>/docs/press.pdf">Selected Press</a></li>
            <?php endif; ?>
          <!-- // Portfolio -->
          <?php else: ?>
            <li class="medium"><?= $medium; ?></li>
            <?php if ($dim_width != null): ?>
              <li class="dimensions"><?= $dim_height," x ", $dim_width," x ",$dim_depth; ?></li>
            <?php endif; ?>
            <li class="year"><?php $year = date("Y", strtotime($date)); echo $year?></li>
            <li class="price">
              <?php if ($status == 1): ?>
                <!-- $<?= $price; ?> -->
                <a href="/contact" target="_blank" class="inquire">Available</a>
              <?php elseif ($status == 2): ?>
                Acquired
              <?php elseif ($status == 3): ?>
                NFS
              <?php endif; ?>
            </li>
            <?php if ($edition_index != null): ?>
              <li class="edition">
                <span><?= $edition_index; ?>/<?= $edition_cap; ?></span>
                <?php if ($stock != NULL) {echo "<strike>stock</strike>";} ?>
              </li>
            <?php endif; ?>
          <?php endif; ?>
        </ul>
      </li>
      <?php if($description != null): ?>
        <li class="description"><?= $description; ?></li>
      <?php endif; ?>
      <?php if($media_cred != null): ?>
        <li class="media_cred">Images: <?= $media_cred; ?></li>
      <?php endif; ?>
    </ul>
  </div>
</div>
