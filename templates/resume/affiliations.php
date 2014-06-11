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
