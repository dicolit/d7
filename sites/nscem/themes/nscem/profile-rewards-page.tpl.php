    <main id="account-dashboard-page" class="account-dashboard-page">
      <div class="dashboard-heading clearfix">
        <div class="container">
          <div class="row">
            <div class="heading-wrapper">
              <div class="account-info clearfix col-sm-6">
                <div class="account-img">
                  <?php print $data['account']->thumb;?>
                </div>
                <span class="name"><?php print $data['account']->name;?></span>
              </div>
              <div class="dashboard-nav col-sm-6">
                <?php foreach($data['tabs'] as $tab):?>
                <a class="<?php print $tab->class;?> nav-item<?php print ($tab->is_actived?' active':'');?>" href="<?php print $tab->href;?>"><?php print $tab->title;?></a>
                <?php endforeach;?>
                <span class="icon-tip" qtip-content="#qtipContent" dock-mobile=".account-info"></span>
                <div id='qtipContent' class="qtipContent">
                              <strong>Info</strong>
                            <p>This is your snack box where you store your recipes, articles or challenges that you like. Earn points when you share them or participate in the challenges.  You can redeem your points for our Nestlé products and vouchers in the near future. </p>
                        </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <section class="main container">
        <div class="row">
          <div class="profile-comletion col-sm-6">
            <p class="title">
              Profile Completion
            </p>
            <div class="content-wrapper">
              <div class="c100 p60 green small">
                          <span>60%</span>
                          <div class="slice">
                              <div class="bar"></div>
                              <div class="fill"></div>
                          </div>
                      </div>
                      <div class="info-wrapper">
                        <p>Complete your profile to have the website fully personalised.</p>
                        <a class="update-btn btn btn-green" href="<?php print url('profile/1/step1');?>">Update Profile</a>
                      </div>
            </div>
          </div>
          <div class="score-challenge col-sm-6">
            <div class="challenge-wrapper">
              <p class="title">
                Recommended Challenges
              </p>
              <p class="desc">Amanda, based on your profile, we recommend some challenges for you to start living healthier &amp; happier.</p>
              <div class="listing">
                <div class="listing--list clearfix">
                  <div class="list-item-container col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="list-item">
                      <h2 class="has-video">Move <span class="icon-video"></span></h2>
                      <img src="<?php print base_path().path_to_theme();?>/images/dummy/challenge1.jpg" alt="Chicken Breasts with Balsamic Vinegar and Garlic">
                      <div class="list-item--info">
                        <p class="desc">10-minute morning yoga</p>

                        <a href="javascript:void(0);" class="add-to-snackbox" title="Add to your snack box"></a>
                      </div>
                    </div>
                  </div>
                  <div class="list-item-container col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="list-item">
                      <h2 class="has-video">Move <span class="icon-video"></span></h2>
                      <img src="<?php print base_path().path_to_theme();?>/images/dummy/challenge2.jpg" alt="Chicken Breasts with Balsamic Vinegar and Garlic">
                      <div class="list-item--info">
                        <p class="desc">10-minute morning yoga</p>

                        <a href="javascript:void(0);" class="add-to-snackbox" title="Add to your snack box"></a>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="score-wrapper">
              <p class="title">
                Score Board
              </p>
              <p class="desc">
                Score Board content
              </p>
            </div>
          </div>
          <div class="rewards col-sm-6">
            <div class="rewards-wrapper">
              <p class="title">
                Rewards
              </p>
              <p class="desc">
                You don't have any rewards yet.
              </p>
            </div>
          </div>
        </div>
      </section>
    </main>
