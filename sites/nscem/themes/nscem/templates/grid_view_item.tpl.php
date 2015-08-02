<div class="list-item-container col-xs-6 col-sm-3 col-md-3 col-lg-3">
  <div class="list-item">
    <h2><?php echo str_replace('_detail','',$item->type) ?></h2>
    <?php $photo = $item->photos[0];?>
    <?php if($photo->uri):?>
      <img src="<?php echo image_style_url('grid_thumbnail', $photo->uri); ?>"
           alt="<?php echo check_plain($item->title); ?>" class="img-responsive" width="224" height="157">
    <?php endif;?>
    <div class="list-item--info">
      <a href="<?php echo url('node/'.$item->nid)?>">
        <?php if($item->recommend):?>
          <h4><?php echo 'Recommended'?></h4>
        <?php endif;?>
        <h3><?php echo $item->title ?></h3>
      </a>
      <?php $rate_object = get_rating_result($item->nid)?>
      <div class="rating">
        <div class="rating--stars stars--<?php echo $rate_object->average ?>">
          <span class="star"></span>
          <span class="star"></span>
          <span class="star"></span>
          <span class="star"></span>
          <span class="star"></span>
        </div>
        <span>(<?php echo $rate_object->total ?>)</span>
      </div>
      <a href="javascript:void(0);" class="add-to-snackbox" title="Add to your snack box"></a>
    </div>
  </div>
</div>