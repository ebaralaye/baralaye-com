<div class="page-body news">
  <header>
    <h1><a href="/news">News</a></h1>
    <p>Upcoming shows/openings, updates and other events.</p>
  </header>
  <div class="main">
    <div class="post detail">
      <h2 class="title h-title sub"><?php echo $title; ?></h2>
      <p class="details">posted on: <?php echo $published_date; ?></p>
      <ul class="social-btns">
        <li class="tweet"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none" data-via="baralaye">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></li>
        <li class="like last"> 
        <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
        <fb:like href="" send="false" layout="button_count" width="75" show_faces="false"></fb:like>
        </li>
      </ul>
      <div class="body"><?php echo $content; ?></div>
    </div>
    <div class="goBack btn-sub"><a href="/news">Go Back</a></div>
  </div>
  <div class="side">
    <h2 class="h-title">More News...</h2>
    <a href="/news" class="btn-sub">+ See All</a>
  </div>
</div>
