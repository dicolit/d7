<div id="header">
  <div class="row">
      <div class="large-12 columns">

        <nav class="top-bar" data-topbar>
          <ul class="title-area">

            <li class="name">
              <h1><a href="<?php print url('<front>');?>"><!--<img src="<?php print base_path().path_to_theme();?>/img/nghe-thuat-chu-viet.png" style="height:30px;"> -->Nghệ Thuật Chữ Viết</a></h1>
            </li>
            <li class="toggle-topbar menu-icon">
              <a href="#"><span>Menu</span></a>
            </li>
          </ul>
          <section class="top-bar-section">
            <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('left')), 'heading' => '')); ?>

            <?php print render($page['header']); ?>
            <!--<ul class="right">
              <li class="search">
                <form>
                  <input type="search">
                </form>
              </li>
              <li class="has-button">
                <a class="small button" href="#">Tìm kiếm</a>
              </li>
            </ul>-->
        </section>
      </nav>
    </div>
  </div>
</div>
