    <?php global $user;?>
    <main id="home-page">
      <?php if($user->uid > 0):?>
      <div class="welcome-note">Hi <?php print $user->name;?>, <br>welcome to Dear Nestlé</div>
      <?php else:?>
      <div class="welcome-note">Welcome to Dear Nestlé</div>
      <?php endif;?>
      <section id="hero-banner">
        <div class="gallery">
          <?php foreach($data['sliders'] as $slide):?>
          <div class="gallery-cell">
            <?php print $slide->image;?>
          </div>
          <?php endforeach;?>

        </div>
      </section>
      <section class="main container">
        <div class="filters">
          <dl>
            <dt>Filter</dt>
            <dd><a href="javascript:void(0);" class="active">All</a></dd>
            <dd><a href="javascript:void(0);">Cook</a></dd>
            <dd><a href="javascript:void(0);">Read</a></dd>
            <dd><a href="javascript:void(0);">Move</a></dd>
            <dd><a href="javascript:void(0);">Relax</a></dd>
          </dl>
        </div>
        <div class="listing clearfix">
          <div class="listing--results">
            <div class="listing--list js-isotope">
              <?php foreach($data['items'] as $item):?>
              <div class="list-item-container col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <div class="list-item">
                  <h2 class="has-video"><?php print $item->category_name;?><?php if($item->has_video):?><span class="icon-video"></span><?php endif;?></h2>
                  <img src="<?php print base_path().path_to_theme();?>/images/dummy/list1.jpg" alt="Chicken Breasts with Balsamic Vinegar and Garlic">
                  <div class="list-item--info">
                    <a href="<?php print $item->href;?>">
                      <?php if($item->is_recommended):?><h4>Recommended</h4><?php endif;?>
                      <h3><?php print $item->title;?></h3>
                    </a>
                    <div class="rating">
                      <div class="rating--stars stars--<?php print $item->stars;?>">
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                      </div>
                      <span>(<?php print $item->rated_total;?>)</span>
                    </div>
                    <a href="#" class="add-to-snackbox<?php print $item->is_added?' active':'';?>"></a>
                  </div>
                </div>
              </div>
              <?php endforeach;?>

            </div>
            <div class="listing--load-more">
              <div class="load-more--icon"></div>
            </div>
          </div>
        </div>
      </section>
    </main>
