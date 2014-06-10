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
        <li>
          <h4 class="name"><a href="http://alliedminds.com" target="_blank">Allied Minds</a></h4>
          <div class="images ltbx">
            <a href="/images/tech/portfolio/large/almd_home.jpg" rel="almd" class="main" title="Allied Minds"><img alt="Allied Minds" src="/images/tech/portfolio/small/almd_home.jpg" /></a>
            <a href="/images/tech/portfolio/large/almd_biotectix.jpg" rel="almd" title="Allied Minds"><img alt="Allied Minds" src="/images/tech/portfolio/small/almd_biotectix.jpg" /></a>
            <a href="/images/tech/portfolio/large/almd_board-members.jpg" rel="almd" title="Allied Minds"><img alt="Allied Minds" src="/images/tech/portfolio/small/almd_board-members.jpg" /></a>
            <a href="/images/tech/portfolio/large/almd_cephalogics.jpg" rel="almd" title="Allied Minds"><img alt="Allied Minds" src="/images/tech/portfolio/small/almd_cephalogics.jpg" /></a>
            <a href="/images/tech/portfolio/large/almd_contact-us.jpg" rel="almd" title="Allied Minds"><img alt="Allied Minds" src="/images/tech/portfolio/small/almd_contact-us.jpg" /></a>
            <a href="/images/tech/portfolio/large/almd_process_build.jpg" rel="almd" title="Allied Minds"><img alt="Allied Minds" src="/images/tech/portfolio/small/almd_process_build.jpg" /></a>
            <a href="/images/tech/portfolio/large/almd_process_manage.jpg" rel="almd" title="Allied Minds"><img alt="Allied Minds" src="/images/tech/portfolio/small/almd_process_manage.jpg" /></a>
            <a href="/images/tech/portfolio/large/almd_process.jpg" rel="almd" title="Allied Minds"><img alt="Allied Minds" src="/images/tech/portfolio/small/almd_process.jpg" /></a>
            <a href="/images/tech/portfolio/large/almd_scifluor.jpg" rel="almd" title="Allied Minds"><img alt="Allied Minds" src="/images/tech/portfolio/small/almd_scifluor.jpg" /></a>
            <a href="/images/tech/portfolio/large/almd_subsidiaries.jpg" rel="almd" title="Allied Minds"><img alt="Allied Minds" src="/images/tech/portfolio/small/almd_subsidiaries.jpg" /></a>
            <a href="/images/tech/portfolio/large/almd_team.jpg" rel="almd" title="Allied Minds"><img alt="Allied Minds" src="/images/tech/portfolio/small/almd_team.jpg" /></a>
          </div>
        </li>
        <li>
          <h4 class="name"><a href="http://davidkirschwellness.com" target="_blank">David Kirsch Wellness</a></h4>
          <div class="images ltbx">
            <a href="/images/tech/portfolio/large/dkwc_cleansing.jpg" class="main" rel="dkwc" title="David Kirsch Wellness"><img alt="David Kirsch Wellness" src="/images/tech/portfolio/small/dkwc_cleansing.jpg" /></a>
            <a href="/images/tech/portfolio/large/dkwc_energize-for-life.jpg" rel="dkwc" title="David Kirsch Wellness"><img alt="David Kirsch Wellness" src="/images/tech/portfolio/small/dkwc_energize-for-life.jpg" /></a>
            <a href="/images/tech/portfolio/large/dkwc_hoodia-supreme.jpg" rel="dkwc" title="David Kirsch Wellness"><img alt="David Kirsch Wellness" src="/images/tech/portfolio/small/dkwc_hoodia-supreme.jpg" /></a>
            <a href="/images/tech/portfolio/large/dkwc_msc.jpg" rel="dkwc" title="David Kirsch Wellness"><img alt="David Kirsch Wellness" src="/images/tech/portfolio/small/dkwc_msc.jpg" /></a>
            <a href="/images/tech/portfolio/large/dkwc_philosophy.jpg" rel="dkwc" title="David Kirsch Wellness"><img alt="David Kirsch Wellness" src="/images/tech/portfolio/small/dkwc_philosophy.jpg" /></a>
            <a href="/images/tech/portfolio/large/dkwc_wellness-company.jpg" rel="dkwc" title="David Kirsch Wellness"><img alt="David Kirsch Wellness" src="/images/tech/portfolio/small/dkwc_wellness-company.jpg" /></a>
          </div>
        </li>
        <li>
          <h4 class="name"><a href="http://www.ensaholdingsltd.com/about/" target="_blank">ENSA</a></h4>
          <div class="images ltbx">
            <a href="/images/tech/portfolio/large/ensa_home.jpg" rel="ensa" class="main" title="ENSA"><img alt="ENSA" src="/images/tech/portfolio/small/ensa_home.jpg" /></a>
            <a href="/images/tech/portfolio/large/ensa_introduction.jpg" rel="ensa" title="ENSA"><img alt="ENSA" src="/images/tech/portfolio/small/ensa_introduction.jpg" /></a>
            <a href="/images/tech/portfolio/large/ensa_mission.jpg" rel="ensa" title="ENSA"><img alt="ENSA" src="/images/tech/portfolio/small/ensa_mission.jpg" /></a>
            <a href="/images/tech/portfolio/large/ensa_opportunity.jpg" rel="ensa" title="ENSA"><img alt="ENSA" src="/images/tech/portfolio/small/ensa_opportunity.jpg" /></a>
            <a href="/images/tech/portfolio/large/ensa_strategic-expansion.jpg" rel="ensa" title="ENSA"><img alt="ENSA" src="/images/tech/portfolio/small/ensa_strategic-expansion.jpg" /></a>
            <a href="/images/tech/portfolio/large/ensa_sustainability.jpg" rel="ensa" title="ENSA"><img alt="ENSA" src="/images/tech/portfolio/small/ensa_sustainability.jpg" /></a>
          </div>
        </li>
        <li>
          <h4 class="name"><a href="http://generalcomposites.com" target="_blank">General Composites</a></h4>
          <div class="images ltbx">
            <a href="/images/tech/portfolio/large/gci_home-a.jpg" rel="gci" title="General Composites" class="main"><img alt="General Composites" src="/images/tech/portfolio/small/gci_home-a.jpg" /></a>
            <a href="/images/tech/portfolio/large/gci_home-b.jpg" rel="gci" title="General Composites"><img alt="General Composites" src="/images/tech/portfolio/small/gci_home-b.jpg" /></a>
            <a href="/images/tech/portfolio/large/gci_contact.jpg" rel="gci" title="General Composites"><img alt="General Composites" src="/images/tech/portfolio/small/gci_contact.jpg" /></a>
            <a href="/images/tech/portfolio/large/gci_external-fixation_zoom.jpg" rel="gci" title="General Composites"><img alt="General Composites" src="/images/tech/portfolio/small/gci_external-fixation_zoom.jpg" /></a>
            <a href="/images/tech/portfolio/large/gci_external-fixation.jpg" rel="gci" title="General Composites"><img alt="General Composites" src="/images/tech/portfolio/small/gci_external-fixation.jpg" /></a>
            <a href="/images/tech/portfolio/large/gci_history.jpg" rel="gci" title="General Composites"><img alt="General Composites" src="/images/tech/portfolio/small/gci_history.jpg" /></a>
            <a href="/images/tech/portfolio/large/gci_news.jpg" rel="gci" title="General Composites"><img alt="General Composites" src="/images/tech/portfolio/small/gci_news.jpg" /></a>
            <a href="/images/tech/portfolio/large/gci_sports.jpg" rel="gci" title="General Composites"><img alt="General Composites" src="/images/tech/portfolio/small/gci_sports.jpg" /></a>
            <a href="/images/tech/portfolio/large/gci_violin-shoulder-rest.jpg" rel="gci" title="General Composites"><img alt="General Composites" src="/images/tech/portfolio/small/gci_violin-shoulder-rest.jpg" /></a>
          </div>
        </li>
        <li>
          <h4 class="name"><a href="http://swarchitectural.com/home.htm" target="_blank">Sherle Wagner Architectural</a></h4>
          <div class="images ltbx">
            <a href="/images/tech/portfolio/large/swa_home-a.jpg" rel="swa" title="Sherele Wagner Architectural" class="main"><img alt="Sherele Wagner Architectural" src="/images/tech/portfolio/small/swa_home-a.jpg" /></a>
            <a href="/images/tech/portfolio/large/swa_home-b.jpg" rel="swa" title="Sherele Wagner Architectural"><img alt="Sherele Wagner Architectural" src="/images/tech/portfolio/small/swa_home-b.jpg" /></a>
            <a href="/images/tech/portfolio/large/swa_account-contact.jpg" rel="swa" title="Sherele Wagner Architectural"><img alt="Sherele Wagner Architectural" src="/images/tech/portfolio/small/swa_account-contact.jpg" /></a>
            <a href="/images/tech/portfolio/large/swa_account-login.jpg" rel="swa" title="Sherele Wagner Architectural"><img alt="Sherele Wagner Architectural" src="/images/tech/portfolio/small/swa_account-login.jpg" /></a>
            <a href="/images/tech/portfolio/large/swa_collections.jpg" rel="swa" title="Sherele Wagner Architectural"><img alt="Sherele Wagner Architectural" src="/images/tech/portfolio/small/swa_collections.jpg" /></a>
            <a href="/images/tech/portfolio/large/swa_inspiration.jpg" rel="swa" title="Sherele Wagner Architectural"><img alt="Sherele Wagner Architectural" src="/images/tech/portfolio/small/swa_inspiration.jpg" /></a>
          </div>
        </li>
        <li>
          <h4 class="name">AIR Projects</h4>
          <div class="images ltbx">
            <a href="/images/tech/portfolio/large/airp_home.jpg" rel="airp" title="AIR Projects" class="main"><img alt="AIR Projects" src="/images/tech/portfolio/small/airp_home.jpg" /></a>
            <a href="/images/tech/portfolio/large/airp_contact.jpg" rel="airp" title="AIR Projects"><img alt="AIR Projects" src="/images/tech/portfolio/small/airp_contact.jpg" /></a>
            <a href="/images/tech/portfolio/large/airp_programs_beijing.jpg" rel="airp" title="AIR Projects"><img alt="AIR Projects" src="/images/tech/portfolio/small/airp_programs_beijing.jpg" /></a>
            <a href="/images/tech/portfolio/large/airp_programs_links.jpg" rel="airp" title="AIR Projects"><img alt="AIR Projects" src="/images/tech/portfolio/small/airp_programs_links.jpg" /></a>
            <a href="/images/tech/portfolio/large/airp_programs_residency.jpg" rel="airp" title="AIR Projects"><img alt="AIR Projects" src="/images/tech/portfolio/small/airp_programs_residency.jpg" /></a>
            <a href="/images/tech/portfolio/large/airp_programs_schedule.jpg" rel="airp" title="AIR Projects"><img alt="AIR Projects" src="/images/tech/portfolio/small/airp_programs_schedule.jpg" /></a>
            <a href="/images/tech/portfolio/large/airp_programs_apply.jpg" rel="airp" title="AIR Projects"><img alt="AIR Projects" src="/images/tech/portfolio/small/airp_programs_apply.jpg" /></a>
          </div>
        </li>
        <li>
          <h4 class="name"><a href="http://foodandwine.com" target="_blank">Food &amp; Wine</a></h4>
          <div class="images ltbx">
            <a href="/images/tech/portfolio/large/fw_community-login.jpg" rel="fw" title="Food &amp; Wine" class="main"><img alt="Food &amp; Wine" src="/images/tech/portfolio/small/fw_community-login.jpg" /></a>
            <a href="/images/tech/portfolio/large/fw_community-signup.jpg" rel="fw" title="Food &amp; Wine"><img alt="Food &amp; Wine" src="/images/tech/portfolio/small/fw_community-signup.jpg" /></a>
            <a href="/images/tech/portfolio/large/fw_account-verification.jpg" rel="fw" title="Food &amp; Wine"><img alt="Food &amp; Wine" src="/images/tech/portfolio/small/fw_account-verification.jpg" /></a>
            <a href="/images/tech/portfolio/large/fw_account-address.jpg" rel="fw" title="Food &amp; Wine"><img alt="Food &amp; Wine" src="/images/tech/portfolio/small/fw_account-address.jpg" /></a>
            <a href="/images/tech/portfolio/large/fw_top-menu.jpg" rel="fw" title="Food &amp; Wine"><img alt="Food &amp; Wine" src="/images/tech/portfolio/small/fw_top-menu.jpg" /></a>
          </div>
        </li>
        <li>
          <h4 class="name"><a href="http://travelandleisure.com" target="_blank">Travel &amp; Leisure</a></h4>
          <div class="images ltbx">
            <a href="/images/tech/portfolio/large/tl_login.jpg" rel="tl" title="Travel &amp; Leisure" class="main"><img alt="Travel &amp; Leisure" src="/images/tech/portfolio/small/tl_login.jpg" /></a>
            <a href="/images/tech/portfolio/large/tl_signup.jpg" rel="tl" title="Travel &amp; Leisure"><img alt="Travel &amp; Leisure" src="/images/tech/portfolio/small/tl_signup.jpg" /></a>
            <a href="/images/tech/portfolio/large/tl_verify.jpg" rel="tl" title="Travel &amp; Leisure"><img alt="Travel &amp; Leisure" src="/images/tech/portfolio/small/tl_verify.jpg" /></a>
            <a href="/images/tech/portfolio/large/tl-mobile_homepage.jpg" rel="tl" title="T&amp;L Mobile"><img alt="T&amp;L Mobile" src="/images/tech/portfolio/small/tl-mobile_homepage.jpg" /></a>
            <a href="/images/tech/portfolio/large/tl-mobile_navigation.jpg" rel="tl" title="T&amp;L Mobile"><img alt="T&amp;L Mobile" src="/images/tech/portfolio/small/tl-mobile_navigation.jpg" /></a>
            <a href="/images/tech/portfolio/large/tl-mobile_footer.jpg" rel="tl" title="T&amp;L Mobile"><img alt="T&amp;L Mobile" src="/images/tech/portfolio/small/tl-mobile_footer.jpg" /></a>
            <a href="/images/tech/portfolio/large/tl-mobile_slideshow.jpg" rel="tl" title="T&amp;L Mobile"><img alt="T&amp;L Mobile" src="/images/tech/portfolio/small/tl-mobile_slideshow.jpg" /></a>
            <a href="/images/tech/portfolio/large/tl-mobile_slideshow-body.jpg" rel="tl" title="T&amp;L Mobile"><img alt="T&amp;L Mobile" src="/images/tech/portfolio/small/tl-mobile_slideshow-body.jpg" /></a>
            <a href="/images/tech/portfolio/large/tl-mobile_slideshow-list.jpg" rel="tl" title="T&amp;L Mobile"><img alt="T&amp;L Mobile" src="/images/tech/portfolio/small/tl-mobile_slideshow-list.jpg" /></a>
            <a href="/images/tech/portfolio/large/tl-mobile_slideshow-list-expanded.jpg" rel="tl" title="T&amp;L Mobile"><img alt="T&amp;L Mobile" src="/images/tech/portfolio/small/tl-mobile_slideshow-list-expanded.jpg" /></a>
            <a href="/images/tech/portfolio/large/tl-mobile_outbrain.jpg" rel="tl" title="T&amp;L Mobile"><img alt="T&amp;L Mobile" src="/images/tech/portfolio/small/tl-mobile_outbrain.jpg" /></a>
            <a href="/images/tech/portfolio/large/tl-mobile_search.jpg" rel="tl" title="T&amp;L Mobile"><img alt="T&amp;L Mobile" src="/images/tech/portfolio/small/tl-mobile_search.jpg" /></a>
            <a href="/images/tech/portfolio/large/tl-mobile_search-results.jpg" rel="tl" title="T&amp;L Mobile"><img alt="T&amp;L Mobile" src="/images/tech/portfolio/small/tl-mobile_search-results.jpg" /></a>
          </div>
        </li>
        <li>
          <h4 class="name"><a href="http://pearson.com" target="_blank">Pearson / DOeC</a></h4>
          <div class="images ltbx">
            <a href="/images/tech/portfolio/large/doec_add-address.jpg" rel="doec" title="DOeC" class="main"><img alt="DOeC" src="/images/tech/portfolio/small/doec_add-address.jpg" /></a>
            <a href="/images/tech/portfolio/large/doec_forgotten-password_reset.jpg" rel="doec" title="DOeC"><img alt="DOeC" src="/images/tech/portfolio/small/doec_forgotten-password_reset.jpg" /></a>
            <a href="/images/tech/portfolio/large/doec_forgotten-password.jpg" rel="doec" title="DOeC"><img alt="DOeC" src="/images/tech/portfolio/small/doec_forgotten-password.jpg" /></a>
            <a href="/images/tech/portfolio/large/doec_login-or-register.jpg" rel="doec" title="DOeC"><img alt="DOeC Mobile" src="/images/tech/portfolio/small/doec_login-or-register.jpg" /></a>
            <a href="/images/tech/portfolio/large/doec_my-account.jpg" rel="doec" title="DOeC"><img alt="DOeC" src="/images/tech/portfolio/small/doec_my-account.jpg" /></a>
            <a href="/images/tech/portfolio/large/doec_register_errors.jpg" rel="doec" title="DOeC"><img alt="DOeC" src="/images/tech/portfolio/small/doec_register_errors.jpg" /></a>
            <a href="/images/tech/portfolio/large/doec_register.jpg" rel="doec" title="DOeC"><img alt="DOeC" src="/images/tech/portfolio/small/doec_register.jpg" /></a>
            <a href="/images/tech/portfolio/large/doec_search.jpg" rel="doec" title="DOeC"><img alt="DOeC" src="/images/tech/portfolio/small/doec_search.jpg" /></a>
            <a href="/images/tech/portfolio/large/doec-mobile_add-address.jpg" rel="doec" title="DOeC Mobile"><img alt="DOeC Mobile" src="/images/tech/portfolio/small/doec-mobile_add-address.jpg" /></a>
            <a href="/images/tech/portfolio/large/doec-mobile_forgotten-password_reset.jpg" rel="doec" title="DOeC Mobile"><img alt="DOeC Mobile" src="/images/tech/portfolio/small/doec-mobile_forgotten-password_reset.jpg" /></a>
            <a href="/images/tech/portfolio/large/doec-mobile_forgotten-password.jpg" rel="doec" title="DOeC Mobile"><img alt="DOeC Mobile" src="/images/tech/portfolio/small/doec-mobile_forgotten-password.jpg" /></a>
            <a href="/images/tech/portfolio/large/doec-mobile_login-or-register.jpg" rel="doec" title="DOeC Mobile"><img alt="DOeC Mobile" src="/images/tech/portfolio/small/doec-mobile_login-or-register.jpg" /></a>
            <a href="/images/tech/portfolio/large/doec-mobile_my-account.jpg" rel="doec" title="DOeC Mobile"><img alt="DOeC Mobile" src="/images/tech/portfolio/small/doec-mobile_my-account.jpg" /></a>
            <a href="/images/tech/portfolio/large/doec-mobile_register.jpg" rel="doec" title="DOeC Mobile"><img alt="DOeC Mobile" src="/images/tech/portfolio/small/doec-mobile_register.jpg" /></a>
            <a href="/images/tech/portfolio/large/doec-mobile_search_facets.jpg" rel="doec" title="DOeC Mobile"><img alt="DOeC Mobile" src="/images/tech/portfolio/small/doec-mobile_search_facets.jpg" /></a>
            <a href="/images/tech/portfolio/large/doec-mobile_search.jpg" rel="doec" title="DOeC Mobile"><img alt="DOeC Mobile" src="/images/tech/portfolio/small/doec-mobile_search.jpg" /></a>
          </div>
        </li>
        <li class="c-z"></li>
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
