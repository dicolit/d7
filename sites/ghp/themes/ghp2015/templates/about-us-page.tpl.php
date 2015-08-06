<?php if($data['banner_url']):?>
<div class="row">
  <div class="col-md-12 about-us-banner">
    <img src="<?php print $data['banner_url'];?>">
  </div>
</div>
<?php endif;?>
<div class="row">
  <div class="col-md-12">
    <h1><?php print $data['title'];?></h1>
    <div class="contact-body">
      <?php print $data['body'];?>
    </div>
  </div>
</div>

