<div class="article list">
  <span>
    <a href="<?php echo "/articles/$data->id" ?>"><?php echo $data->title ?></a>
  </span>
  <p>
    <?php echo $data->created_at ?><br/>
    <?php echo $data->updated_at ?>
  </p>
</div>