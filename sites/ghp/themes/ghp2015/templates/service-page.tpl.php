<div class="row service-list">
  <?php foreach($data['items'] as $item):?>
  <div class="col-md-12">
    <a href="<?php print $item->href;?>">
      <?php print $item->image;?>
    </a>
  </div>
  <?php endforeach;?>
</div>
