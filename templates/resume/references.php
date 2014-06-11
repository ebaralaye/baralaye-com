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
