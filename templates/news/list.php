<div class="page-body news post">
  <div class="header">
    <h1>News</h1>
    <p>Upcoming shows/opennings, updates and other events.</p>
  </div>
  <ul class="cols">
    <li class="col a">
      <h2 class="h-title">All News</h2>

        <?php foreach ($posts as $post): ?>
            <div class="post">
            <h3 class="post-title h-title sub"><a href="/news/<?php echo $post['url'] ?>"><?php echo $post['title']; ?></a></h3>
            <div class="post-details"><?php echo $post['published_date']; ?></div>
                <div class="post-body">
                    <p><?php echo substr($post['content'], 0,100); ?>...<a href="/news/<?php echo $post['url'] ?>">+ read more</a></p>
                </div>
            </div>
        <?php endforeach; ?>

    </li>
    <li class="col b last">
      <h2 class="h-title"><a href="http://twitter.com/baralaye" target="_blank">Twitter</a></h2>
      <a class="twitter-timeline" href="https://twitter.com/baralaye" data-widget-id="391761770735353857" height="700">Tweets by @baralaye</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </li>
    <li class="c-z" />
  </ul>
</div>
