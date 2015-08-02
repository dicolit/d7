    <header class="container-fluid clearfix">
      <h1><a href="javascript:void(0);" title="Dear Nestlé">Dear Nestlé</a></h1>
      <nav>
        <ul class="list-unstyled" id="main-nav">
          <li><?php print l('Home','<front>');?></a></li>
              <li><?php print l('Cook','cook');?></li>
              <li><?php print l('Read','read');?></a></li>
              <li><?php print l('Move','move');?></a></li>
              <li><?php print l('Relax','relax');?></a></li>
        </ul>
      </nav>
      <div id="search-box">
        <input type="text">
      </div>
      <div class="header--top-links clearfix">
        <div class="top-links--user-info clearfix">
          <a href="javascript:void(0);" id="user-info--search"></a>
          <a href="#snackbox" id="user-info--snackbox" title="Snack Box"></a>
          <a href="#point" id="user-info--point"><span>0</span></a>
          <a href="#menu" id="user-info--menu"></a>
          <div class="drop-down-menu">
            <div id="snackbox" class="drop-down-menu-inner">
              <p>Earn points when you share and participate in challenges. Let’s get started!</p>
              <div class="menu--user-actions menu--user-actions__not-logged-user">
                <a href="<?php print url('sign-up');?>" title="Sign Up" class="menu-actions--signup">Sign Up</a>
                <a href="<?php print url('sign-in');?>" title="Log In" class="menu-actions--login">Log In</a>
              </div>
              <p>Earn <strong>1000 points</strong> by signing up for the first time. </p>
            </div>
            <div id="point" class="drop-down-menu-inner">
              <p>View your points here. Sign up now to start earning points. The more active you are, the more points you'll earn!</p>
              <div class="menu--user-actions menu--user-actions__not-logged-user">
                <a href="<?php print url('sign-up');?>" title="Sign Up" class="menu-actions--signup">Sign Up</a>
                <a href="<?php print url('sign-in');?>" title="Log In" class="menu-actions--login">Log In</a>
              </div>
              <p>Earn <strong>1000 points</strong> by signing up for the first time. </p>
            </div>
          </div>
        </div>
        <div class="toplinks--user-actions">
          <a href="<?php print url('sign-up');?>" title="Sign Up" id="user-actions--signup">Sign Up</a>
          <a href="<?php print url('sign-in');?>" title="Log In" id="user-actions--login">Log In</a>
        </div>
      </div>
      <div class="mobile-menu">
        <div id="mobile-menu" class="mobile-menu-inner">
          <div class="menu--user-actions menu--user-actions__not-logged-user">
            <a href="<?php print url('sign-up');?>" title="Sign Up" class="menu-actions--signup">Sign Up</a>
            <a href="<?php print url('sign-in');?>" title="Log In" class="menu-actions--login">Log In</a>
          </div>
          <div class="menu--user-actions menu--user-actions__logged-user">
            <div class="logged-user--detail">
              <ul class="list-unstyled">
                <li><a href="javascript:void(0);">My Account</a></li>
                <li><a href="javascript:void(0);">My Rewards</a></li>
                <li><a href="javascript:void(0);">My Scoreboard</a></li>
                <li><a href="<?php print url('user/logout');?>">Sign Out</a></li>
              </ul>
            </div>
          </div>
          <div class="menu--mobile-nav">
            <ul>
              <li><?php print l('Home','<front>');?></a></li>
              <li><?php print l('Cook','cook');?></li>
              <li><?php print l('Read','read');?></a></li>
              <li><?php print l('Move','move');?></a></li>
              <li><?php print l('Relax','relax');?></a></li>
            </ul>
          </div>
        </div>

        <div id="mobile-snackbox" class="mobile-menu-inner">
          <p>Earn points when you share and participate in challenges. Let’s get started!</p>
          <div class="menu--user-actions menu--user-actions__not-logged-user">
            <a href="<?php print url('sign-up');?>" title="Sign Up" class="menu-actions--signup">Sign Up</a>
            <a href="<?php print url('sign-in');?>" title="Log In" class="menu-actions--login">Log In</a>
          </div>
          <p>Earn <strong>1000 points</strong> by signing up for the first time. </p>
        </div>

        <div id="mobile-point" class="mobile-menu-inner">
          <p>View your points here. Sign up now to start earning points. The more active you are, the more points you'll earn!</p>
          <div class="menu--user-actions menu--user-actions__not-logged-user">
            <a href="<?php print url('sign-up');?>" title="Sign Up" class="menu-actions--signup">Sign Up</a>
            <a href="<?php print url('sign-in');?>" title="Log In" class="menu-actions--login">Log In</a>
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
