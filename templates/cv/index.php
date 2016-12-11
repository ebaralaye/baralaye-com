<div class="page-body resume cv">
  <header>
    <h1>Curriculum Vitae</h1>
  </header>
  <div class="page-main">
    <?php
      foreach ($tags as $tag_key => $tag_array) {
        echo "<section id=".$tag_key.">";
        echo "<h3>".$tag_key."</h3>";
        if(empty($tag_array)) {
          $tag_str = $tag_key;
          include 'templates/cv/list.php';
        } else {
          foreach ($tag_array as $tag_str) {
            echo "<h4>".$tag_str."</h4>";
            include 'templates/cv/list.php';
          }
        }
        echo "</section>";
      }
    ?>
  </div>
</div>
