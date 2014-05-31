<div class="page-body news">
  <header>
    <h1><a href="/news">News</a></h1>
  </header>
  <div class="main">
    <div class="post detail">
      <div class="head">
        <h2 class="title h-title sub"><?php echo $title; ?></h2>
        <div class="details"><time><?php $newDate = date("M-d-Y", strtotime($published_date)); echo $newDate; ?></time></div>
        <ul class="social-btns">
          <li class="tweet"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none" data-via="baralaye">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></li>
          <li class="like last">
          <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
          <fb:like href="" send="false" layout="button_count" width="75" show_faces="false"></fb:like>
          </li>
        </ul>
      </div>
      <?php if ($image != null): ?>
        <div class="image">
          <img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
          <?php if ($image_desc != null): ?>
            <small class="desc"><?php echo $image_desc ?></small>
          <?php endif; ?>
        </div>
      <?php endif; ?>
      <div class="body"><?php echo $content; ?></div>
      <a class="txt-btn" href="/news">+ Back</a>
    </div>
  </div>
  <div class="side">
    <h2 class="h-title sub"><a href="/news">Latest News</a></h2>
    <a href="/news" class="txt-btn">All +</a>
  </div>
</div>
