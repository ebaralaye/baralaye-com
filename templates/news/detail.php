<div class="page-body news detail">
  <header>
    <h1><a href="/news">News</a></h1>
  </header>
  <main>
    <article class="post detail">
      <div class="head">
        <h2 class="title h-title"><?php echo $post['title']; ?></h2>
        <div class="details"><time><?php $newDate = date("M-d-Y", strtotime($post['published_date'])); echo $newDate; ?></time></div>
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
    </article>
    <section class="sub">
      <a href="/news" class="btn back">Back to news list...</a>
    </section>
  </main>
</div>
