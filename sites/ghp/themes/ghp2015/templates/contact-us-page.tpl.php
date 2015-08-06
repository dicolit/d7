<?php if($data['map_url']):?>
<div class="row">
  <div class="col-md-12 contact-us-banner">
    <img src="<?php print $data['map_url'];?>">
  </div>
</div>
<?php endif;?>
<div class="row">
  <div class="col-md-6 contact-us-address">
    <h1><?php print $data['title'];?></h1>
    <div class="contact-body">
      <?php print $data['body'];?>
    </div>
  </div>
  <div class="col-md-6 contact-us-form">
    <?php print $data['contact_us_form'];?>
  </div>
</div>
