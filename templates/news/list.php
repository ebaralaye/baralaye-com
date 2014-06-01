<div class="page-body news">
  <header>
    <h1>News</h1>
  </header>
  <div class="main">
    <ul class="post-list">
      <?php foreach ($posts as $post): ?>
        <li class="post">
          <h3 class="title h-title sub"><a href="/news/<?php echo $post['url'] ?>"><?php echo $post['title']; ?></a></h3>
          <div class="details"><time><?php $newDate = date("M-d-Y", strtotime($post['published_date'])); echo $newDate; ?></time></div>
          <div class="body">
            <p><?php echo $post['content_blurb']; ?> <a href="/news/<?php echo $post['url'] ?>" class="more">+</a></p>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="side">
    <a class="twitter-timeline" href="https://twitter.com/baralaye" data-widget-id="391761770735353857" height="700">Tweets by @baralaye</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </div>
</div>
