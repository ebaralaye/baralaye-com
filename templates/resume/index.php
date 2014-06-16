<div class="page-body resume">
  <header>
  <h1><?php echo $resume['title']; ?></h1>
  <h4><?php echo $resume['docs']; ?></h4>
  </header>
  <div class="page-main">

    <section id="availability">
      <h3>Availability</h3>
      <div class="section">
        <?php echo $resume['availability']; ?>
      </div>
    </section>

    <section id="education">
      <h3>Education</h3>
      <ul class="section list outside">
        <?php echo $resume['education']; ?>
      </ul>
    </section>

    <section id="skills">
      <h3>Skills</h3>
      <div class="section">
        <?php echo $resume['skills']; ?>
      </div>
    </section>

    <?php include 'templates/resume/clients.php'; ?>

    <?php include 'templates/resume/affiliations.php'; ?>

    <?php include 'templates/resume/references.php'; ?>

    <?php if($gallery): ?>
      <section id="portfolio">
        <h3>Portfolio</h3>
        <?php include 'templates/gallery.php'; ?>
      </section>
    <?php endif; ?>

    <?php if($resume['social']): ?>
      <section id="social">
        <h3>Social</h3>
        <div class="social-media">
          <?php echo $resume['social']; ?>
        </div>
      </section>
    <?php endif; ?>

  </div>
</div>
