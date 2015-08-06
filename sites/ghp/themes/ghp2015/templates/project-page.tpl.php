<?php foreach($data['items'] as $item):?>
<div class="row category-item style-<?php print $item->is_odd;?> category-style-<?php print $item->category_style;?>">
  <div class="col-md-3 col-sm-12 project-title">
    <h3><?php print $item->title;?></h3>
    <div class="project-summary"><?php print $item->summary;?></div>
  </div>
  <div class="col-md-6 col-sm-12 project-content">
    <?php print $item->content;?>
  </div>
  <div class="col-md-3 col-sm-12 project-image">
    <a href="<?php print $item->href;?>">
      <?php print $item->image;?>
    </a>
  </div>
</div>
<?php endforeach;?>
