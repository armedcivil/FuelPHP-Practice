<div class="article show">
  <h1><?php echo $data->title; ?></h1>
  <p><?php echo htmlspecialchars_decode($data->body); ?></p>
</div>
<div class="article show sidebar">
  <p>
    作成日：<?php echo $data->created_at; ?><br>
    更新日：<?php echo $data->updated_at; ?>
  </p>
</div>
