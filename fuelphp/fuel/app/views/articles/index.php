<?php
use \Fuel\Core\View;
?>

<div>
  <?php
    if (isset($articles)) {
      foreach($articles as $value){
        echo View::forge('articles/parts/list_item', array('data' => $value))->render();
      }
    }
  ?>
</div>