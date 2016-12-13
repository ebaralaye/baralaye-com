<div class="page-body news">
  <header>
    <?php if ($type == "index"): ?>
      <h1>News</h1>
    <?php else: ?>
      <h1>News - Archive</h1>
    <?php endif ?>
  </header>
  <div class="main">
    <ul class="post-list list-unstyled">
      <?php foreach ($posts as $post): ?>
        <li class="post">
          <h3 class="title h-title sub"><a href="/news/<?php echo $post['url'] ?>"><?php echo $post['title']; ?></a></h3>
          <div class="details"><time><?php $newDate = date("M-d-Y", strtotime($post['published_date'])); echo $newDate; ?></time></div>
          <div class="body">
            <p><?php echo $post['content_blurb']; ?> <a href="/news/<?php echo $post['url'] ?>" class="more">+</a></p>
          </div>
        </li>
      <?php endforeach; ?>
    <?php if ($type == "index"): ?>
      <li><a href="/news/archive" class="btn archive">...More -> Archive</a></li>
    <?php endif ?>
    </ul>
  </div>
  <div class="side">
    <?php include 'templates/includes/twitter-module.php' ?>
  </div>
  <div class="col-sm-8">
    <?php include 'templates/includes/mailing-list.php' ?>
  </div>
</div>
