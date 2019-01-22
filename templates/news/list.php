<div class="page-body news list">
  <header>
    <?php if ($type == "index"): ?>
      <h1>News</h1>
    <?php else: ?>
      <h1>News - Archive</h1>
    <?php endif ?>
  </header>
  <main>
    <ul class="post-list list-unstyled">
      <?php foreach ($posts as $post): ?>
        <li class="post">
          <h3 class="title h-title sub"><a href="/news/<?php echo $post['url'] ?>"><?php echo $post['title']; ?></a></h3>
          <div class="details">
            Posted: <?php $newDate = date("M-d-Y", strtotime($post['published_date'])); echo $newDate; ?>
            | City: <?php echo $post['city'] ?>
          </div>
          <div class="body">
            <p><?php echo $post['content_blurb']; ?> <a href="/news/<?php echo $post['url'] ?>" class="more">more +</a></p>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
      <section class="sub">
        <?php if ($type == "index"): ?>
          <a href="/news/archive" class="btn archive">...More -> Archive</a>
        <?php else: ?>
          <a href="/news" class="btn back">Back to news list...</a>
      </section>
    <?php endif ?>
  </main>
</div>
