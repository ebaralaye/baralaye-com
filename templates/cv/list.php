<?php

global $response;
global $dbh;
$sql = 'SELECT * FROM cv WHERE status >= 1 ORDER BY period_from DESC';
$items = $dbh -> query($sql);

echo "<ul class='section list outside ".$tag_key."'>";
  foreach ($items as $item) {
    $item_tag_array = explode(',',$item['tags']);
    if(in_array($tag_str, $item_tag_array)) {
      echo "<li class='item'>";
      if ($item['title_url']) echo "<a href=".$item['title_url'].">".$item['title']."</a>";
      else echo $item['title'];
      if ($item['title_sub']) {
        if($item['title_sub_url']) echo " - <a href=".$item['title_sub_url'].">".$item['title_sub']."</a>";
        else echo " - ".$item['title_sub'];
      }
      if ($item['title_desc']) echo ', '.$item['title_desc'];
      if ($item['city']) echo ' - '.$item['city'];
      if ($item['state']) echo ', '.$item['state'];
      if ($item['period_year']) echo '<time>'.$item['period_year'].'</time>';
     echo "</li>";
    }
  }
echo "</ul>";
