<?php if($data['banner_image']):?>
<div class="row">
  <div class="col-md-12 service-detail-banner">
    <?php print $data['banner_image'];?>
  </div>
</div>
<?php endif;?>
<div class="row service-detail">
  <div class="col-md-12">
    <h1><?php print $data['title'];?></h1>
    <div class="full-content">
      <?php print $data['body'];?>
    </div>
  </div>
</div>

