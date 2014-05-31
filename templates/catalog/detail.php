<div class="product-detail">
  <div class="images">
    <h1 class="name"><?php echo $name; ?></h1>
    <div class="main">
      <a href="/images/art/portfolio/big/<?php echo $image; ?>.jpg" class="cloud-zoom" id="zoom1" rel="position: 'inside'"><img src="/images/art/portfolio/large/<?php echo $image; ?>.jpg" alt="<?php echo $name; ?>" /></a>
    </div>
    <ul class="poplets">
      <?php $poplets = explode(',', $image_poplets); ?>
      <?php if (count($poplets) > 1): ?>
        <?php foreach($poplets as $poplet): ?>
          <li><a href="/images/art/portfolio/big/<?php echo $poplet ?>.jpg" rel="useZoom: 'zoom1', smallImage: '/images/art/portfolio/large/<?php echo $poplet ?>.jpg'" class="cloud-zoom-gallery"><img src="/images/art/portfolio/small/<?php echo $poplet ?>.jpg" alt="<?php echo $poplet ?>" /></a></li>
        <?php endforeach; ?>
      <?php endif; ?>
    </ul>
  </div>
  <div class="details">
    <h1 class="name"><?php echo $name; ?></h1>
    <ul>
      <li class="specs">
        <ul>
          <li class="medium">Medium: <?php echo $medium; ?></li>
          <?php if ($dim_width != null): ?>
            <li class="dimensions">Dimensions: <?php echo $dim_width," x ", $dim_height," x ",$dim_depth; ?></li>
          <?php endif; ?>
          <li class="weight">Weight: <span><?php echo $weight; ?></span> lbs</li>
          <li class="year">Year: <?php echo $year; ?></li>
          <li class="edition">Edition: <span><?php echo $edition; ?></span></li>
          <?php if ($price != null): ?>
            <li class="price">Price: $<?php echo $price; ?></a></li>
          <?php endif; ?>
          <li class="code">Code: <span><?php echo $code; ?></span></li>
        </ul>
      </li>
      <!--<li class="social">
        <ul class="social-btns">
          <li class="btn-s purchase"><a href="#purchase-inquiry" class="ltbx win">Buy</a></li>
          <li class="btn-s comment"><a href="#comment-form" class="ltbx win">Comment</a></li>
          <li class="pin"><a href="//www.pinterest.com/pin/create/button/?url=http://baralaye.com{tag_itemurl_nolink}&media=http://baralaye.com{tag_largeimage_path}&description=Ebitenyefa%20Baralaye%20-%20{tag_title}" data-pin-do="buttonPin" data-pin-config="none"><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a></li>
          <li class="tweet"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none" data-via="baralaye">Tweet</a>
          <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
          </li>
          <li class="like last">
            <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
            <fb:like send="false" layout="button_count" width="75" show_faces="false"></fb:like>
          </li>
        </ul>
      </li>-->
      <li class="description"><?php echo $description; ?></li>
    </ul>
  </div>
</div>
