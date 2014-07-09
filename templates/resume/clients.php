<section id="clients">
  <h3>Clients</h3>
  <ul class="section experience list outside">
    <?php foreach ($clients as $client): ?>
    <?php 
      $period_from = date("M-Y", strtotime($client['period_from']));
      $period_to = date("M-Y", strtotime($client['period_to']));
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
