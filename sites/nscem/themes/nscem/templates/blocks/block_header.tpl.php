<header class="container-fluid clearfix">
  <h1>Dear Nestle</h1>
  <nav>
    <ul class="list-unstyled" id="main-nav">
      <li><?php echo l('Home', '<front>'); ?></li>
      <li><?php echo l('Cook', 'cook'); ?></li>
      <li><?php echo l('Read', 'read'); ?></li>
      <li><?php echo l('Move', 'move'); ?></li>
      <li><?php echo l('Relax', 'relax'); ?></li>
    </ul>
  </nav>
  <div id="search-box">
    <input type="text">
  </div>
  <div class="header--top-links clearfix">
    <div class="top-links--user-info clearfix">
      <a href="#search" id="user-info--search"></a>
      <a href="#snackbox" id="user-info--snackbox" title="Snack Box"></a>
      <a href="#point" id="user-info--point"><span>0</span></a>
      <a href="#menu" id="user-info--menu"></a>
    </div>
    <div class="toplinks--user-actions">
      <?php echo l('Sign Up', 'sign-up', array('attributes' => array('id' => 'user-actions--signup'))); ?>
      <?php echo l('Login', 'sign-in', array('attributes' => array('id' => 'user-actions--login'))); ?>
    </div>
  </div>
  <div class="mobile-menu">
    <div id="menu" class="mobile-menu-inner">
      <div class="menu--user-actions menu--user-actions__not-logged-user">
        <?php echo l('Sign Up', 'sign-up', array('attributes' => array('id' => 'user-actions--signup'))); ?>
        <?php echo l('Login', 'sign-in', array('attributes' => array('id' => 'user-actions--login'))); ?>
      </div>
      <div class="menu--user-actions menu--user-actions__logged-user">
        <div class="logged-user--preview clearfix">
          <div class="logger-user--avatar">
            <img src="<?php print base_path().path_to_theme();?>/images/dummy/avatar.png" alt="">
          </div>
          <div class="logged-user--name">
            <p>Amanda</p>
          </div>
          <button class="logged-user--toggle-profile"></button>
        </div>
        <div class="logged-user--detail">
          <ul class="list-unstyled">
            <li><a href="javascript:void(0);">My Account</a></li>
            <li><a href="javascript:void(0);">My Rewards</a></li>
            <li><a href="javascript:void(0);">My Scoreboard</a></li>
            <li><a href="javascript:void(0);">Sign Out</a></li>
          </ul>
        </div>
      </div>
      <div class="menu--mobile-nav">
        <ul>
          <li><?php echo l('Home', '<front>'); ?></li>
          <li><?php echo l('Cook', 'cook'); ?></li>
          <li><?php echo l('Read', 'read'); ?></li>
          <li><?php echo l('Move', 'move'); ?></li>
          <li><?php echo l('Relax', 'relax'); ?></li>
        </ul>
      </div>
    </div>

    <div id="snackbox" class="mobile-menu-inner">
      <p>Earn points when you share and participate in challenges. Let’s get started!</p>
      <div class="menu--user-actions menu--user-actions__not-logged-user">
        <a href="javascript:void(0);" title="Sign Up" class="menu-actions--signup">Sign Up</a> |
        <a href="javascript:void(0);" title="Log In" class="menu-actions--login">Log In</a>
      </div>
      <p>Earn <strong>1000 points</strong> by signing up for the first time. </p>
    </div>

    <div id="point" class="mobile-menu-inner">
      <p>View your points here. Sign up now to start earning points. The more active you are, the more points you'll earn!</p>
      <div class="menu--user-actions menu--user-actions__not-logged-user">
        <a href="javascript:void(0);" title="Sign Up" class="menu-actions--signup">Sign Up</a> |
        <a href="javascript:void(0);" title="Log In" class="menu-actions--login">Log In</a>
      </div>
      <p>Earn <strong>1000 points</strong> by signing up for the first time. </p>
    </div>

    <div class="menu--mobile-social">
      <p>Share this</p>
      <p>
        <a href="javascript:void(0)" class="mobile-social-1"></a>
        <a href="javascript:void(0)" class="mobile-social-2"></a>
        <a href="javascript:void(0)" class="mobile-social-3"></a>
        <a href="javascript:void(0)" class="mobile-social-4"></a>
        <a href="javascript:void(0)" class="mobile-social-5"></a>
      </p>
    </div>
  </div>
</header>
