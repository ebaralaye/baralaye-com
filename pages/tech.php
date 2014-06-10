<div class="page-body tech resume">
  <header>
    <h1>Web Developer</h1>
  </header>
  <div class="page-main">

    <section id="availability">
      <h3>Availability</h3>
      <div class="section">
        <h4>Contact</h4>
        <p>tech&#64;baralaye&#46;com | 323 West 39th St, New York, NY 10018</p>
        <h4>Status</h4>
        <p>U.S. Citizen - Freelance, contract, part-time, on-site or remote</p>
      </div>
    </section>

    <section id="education">
      <h3>Education</h3>
      <ul class="section list outside">
        <li><a class="school" href="http://www.risd.edu" target="_blank">Rhode Island School of Design</a> - BFA *honors | <span class="date">2002 - 2006</span> Providence, RI</li>
      </ul>
    </section>

    <section id="skills">
      <h3>Skills</h3>
      <div class="section">
        <h4>Services</h4>
        <ul class="list outside disc">
          <li>Developing the frontend presentation layer of ecommerce and Servicespecialty websites</li>
          <li>Planning and wireframing web architecture</li>
          <li>Interpreting, editing and organizing provided design assets for production</li>
          <li>JavaScript development and plugin integration</li>
          <li>Frontend theme development over various backend environments and CMS platforms</li>
          <li>CMS integration, admin and content management</li>
          <li>UX / UI troubleshooting, testing and cross-browser QA</li>
          <li>Project management and account management</li>
        </ul>
        <h4>Languages</h4>
        <p>HTML - HAML, CSS - SASS / LESS, JavaScript - jQuery, PHP</p>
        <h4>Utilities</h4>
        <p>UNIX, VIM, Git, FTP, MYSQL, Drupal, Bootstrap, Business Catalyst</p>
        <h4>Software</h4>
        <p>Mac OS, Adobe Design Suite - Photoshop / Illustrator, MS Office Suite, Mac iWork Suite</p>
        <h4>Administration</h4>
        <p>I'm an articulate and efficient communicator with a professional and friendly demeanor. I'm a goal-oriented team player, a natural organizer, a calm and diplomatic conflict resolver, a focused and discerning manager and a prompt correspondent.</p>
      </div>
    </section>

    <section id="clients">
      <h3>Clients</h3>
      <ul class="section experience list outside">
        <?php foreach ($clients as $client): ?>
        <?php 
          $period_from = date("M-d-Y", strtotime($client['period_from']));
          $period_to = date("M-d-Y", strtotime($client['period_to']));
        ?>
          <li>
            <a class="name" href="<?php echo $client['url']; ?>" target="_blank">
              <?php echo $client['name']; ?>
            </a> - 
            <span class="position"><?php echo $client['title']; ?></span> 
            <span class="type"><?php echo $client['type']; ?></span> | 
            <span class="address">
              <span class="street"><?php echo $client['street']; ?></span> <?php echo $client['city']; ?>, <?php echo $client['state']; ?> <span class="zip"><?php echo $client['zip']; ?></span></span> <span class="phone"><?php echo $client['phone']; ?></span> <span class="date"><?php echo $period_from; ?> - <?php echo $period_to; ?></span><br />
            <span class="desc"><?php echo $client['description']; ?></span>
            <span class="reference"><?php echo $client['ref_name']; ?> - <?php echo $client['ref_title']; ?> <?php echo $client['ref_phone']; ?> <?php echo $client['ref_email']; ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    </section>

    <section id="affiliations">
      <h3>AFFILIATIONS</h3>
      <ul class="section affiliations list outside">
        <?php foreach ($affiliations as $affiliation): ?>
          <?php 
            $period_from = date("M-d-Y", strtotime($client['period_from']));
            $period_to = date("M-d-Y", strtotime($client['period_to']));
          ?>
          <li>
            <a class="name" href="<?php echo $affiliation['url']; ?>" target="_blank">
              <?php echo $affiliation['name']; ?>
            </a> - 
            <span class="position"><?php echo $affiliation['title']; ?></span> 
            <span class="type"><?php echo $affiliation['type']; ?></span> | 
            <span class="address">
              <span class="street"><?php echo $affiliation['street']; ?></span> <?php echo $affiliation['city']; ?>, <?php echo $affiliation['state']; ?> <span class="zip"><?php echo $affiliation['zip']; ?></span></span> <span class="phone"><?php echo $affiliation['phone']; ?></span> <span class="date"><?php echo $period_from; ?> - <?php echo $period_to; ?></span><br />
            <span class="desc"><?php echo $affiliation['description']; ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    </section>

    <section id="references">
      <h3>References</h3>
      <ul class="section references list outside">
        <?php foreach ($clients as $client): ?>
          <li>
            <span class="reference"><?php echo $client['ref_name']; ?> - <?php echo $client['ref_title']; ?> <?php echo $client['ref_phone']; ?> <?php echo $client['ref_email']; ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    </section>

    <section id="clients">
      <h3 id="portfolio">Portfolio</h3>
      <ul class="product-list portfolio web">
        <?php foreach($items as $item): ?>
          <li>
            <h4 class="name"><a href="http://<?php echo $item['url']; ?>" target="_blank"><?php echo $item['name']; ?></a></h4>
            <div class="images ltbx">
              <?php $slides = explode(',', $item['images']); ?>
              <?php foreach($slides as $slide): ?>
                <a href="/images/tech/portfolio/large/<?php echo $item['id']; ?>_<?php echo $slide ?>.jpg" 
                  <?php if (array_search($slide, $slides)==0): ?>class="main"<?php endif; ?> 
                  rel="<?php echo $item['id']; ?>" 
                  title="<?php echo $item['name']; ?>">
                  <img alt="<?php echo $item['name']; ?>" src="/images/tech/portfolio/small/<?php echo $item['id']; ?>_<?php echo $slide ?>.jpg" />
                </a>
              <?php endforeach; ?>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </section>

    <section id="social">
      <h3 id="social">Social</h3>
      <div class="social-media">
        <a href="http://github.com/ebaralaye" target="_blank">Github</a>
        <a href="http://facebook.com/ebaralaye" target="_blank">Facebook</a>
        <a href="http://twitter.com/ebaralaye" target="_blank">Twitter</a>
        <!--<a href="http://linkedin.com/in/baralaye" target="_blank">LinkedIn</a>-->
      </div>
    </section>

  </div>
</div>
