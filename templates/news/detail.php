<div class="page-body news">
  <header>
    <h1><a href="/news">News</a></h1>
  </header>
  <div class="main">
    <div class="post detail">
      <div class="head">
        <h2 class="title h-title"><?php echo $post['title']; ?></h2>
        <div class="details"><time><?php $newDate = date("M-d-Y", strtotime($post['published_date'])); echo $newDate; ?></time></div>
        <!--<ul class="social-btns">
          <li class="tweet"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none" data-via="baralaye">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></li>
          <li class="like last">
          <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
          <fb:like href="" send="false" layout="button_count" width="75" show_faces="false"></fb:like>
          </li>
        </ul>-->
      </div>
      <?php if ($post['image'] != null): ?>
        <div class="image">
          <img src="<?php echo $post['image']; ?>" alt="<?php echo $post['image_alt']; ?>">
          <?php if ($image_desc != null): ?>
            <small class="desc"><?php echo $post['image_desc']; ?></small>
          <?php endif; ?>
        </div>
      <?php endif; ?>
      <div class="body"><?php echo $post['content']; ?></div>
    </div>
  </div>
  <div class="side">
    <h2 class="h-title"><a href="/news">Other News</a></h2>
    <ul class="post-list aside">
      <?php foreach ($posts as $post): ?>
        <li class="post">
          <h4 class="title h-title sub"><a href="/news/<?php echo $post['url'] ?>"><?php echo $post['title']; ?></a></h4>
          <div class="details"><time><?php $newDate = date("M-d-Y", strtotime($post['published_date'])); echo $newDate; ?></time></div>
          <div class="body">
            <p><?php echo $post['content_blurb']; ?> <a href="/news/<?php echo $post['url'] ?>" class="more">+</a></p>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
