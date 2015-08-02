<?php
$user_is_logged_in = user_is_logged_in();
$slides = get_slides();
?>
<?php if($user_is_logged_in) { ?>
<div class="container">
<?php } ?>
  <section id="hero-banner">
    <div class="gallery">
      <?php if(count($slides) > 0):?>
        <?php foreach($slides as $slide):?>
          <div class="gallery-cell">
            <img src="<?php echo image_style_url('home_slideshow',$slide->uri)?>"/>
          </div>
        <?php endforeach ?>
      <?php endif;?>
    </div>
  </section>
<?php if($user_is_logged_in) { ?>
</div>
<?php } ?>
