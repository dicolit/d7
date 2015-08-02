    <main id="snackbox-page">
      <div class="category-heading">
        <h2>Snackbox <span class="icon-tip" qtip-content="#qtipContent" dock-mobile=".category-heading h2"></span></h2>
        <div id='qtipContent' class="qtipContent">
                        <strong>Snack Box</strong>
                        <p>This is your snack box where you store your recipes, articles or challenges that you like. Earn points when you share them or participate in the challenges.  You can redeem your points for our Nestlé products and vouchers in the near future. </p>
                </div>
        <div class="snack-types">
          <a href="<?php print url('profile/1/saved-snacks');?>">Saved Snacks</a>
          <a href="<?php print url('profile/1/modified-recipes');?>" class="active">Modified Recipes</a>
        </div>
      </div>
      <div class="category-filters snackbox-filters clearfix">
        <div class="category-filters-top clearfix">
          <!-- <div class="container">
            <div class="snack-total">11 snacks</div>
            <div class="cat-filters-menu cat-filters-menu__filters">
              <a href="javascript:void(0);" class="btn-snackbox-filter">More Filters</a>
            </div>
            <!-- <div class="filters">
              <dl>
                <dt>Filter</dt>
                <dd><a href="javascript:void(0);" class="active">All</a></dd>
                <dd><a href="javascript:void(0);">Cook</a></dd>
                <dd><a href="javascript:void(0);">Read</a></dd>
                <dd><a href="javascript:void(0);">Move</a></dd>
                <dd><a href="javascript:void(0);">Relax</a></dd>
              </dl>
            </div> -->
          <!-- </div> -->
          <div class="container">
            <div class="list--btn">
              <a class="recipe-create" href="<?php print url('profile/1/recipe/0/edit');?>">
                <img src="<?php print base_path().path_to_theme();?>/images/global/icon-create.png"/>
                <span>Create New Recipe</span>
              </a>
              <a class="recipe-request" href="<?php print url('profile/1/request-recipe');?>">
                <img src="<?php print base_path().path_to_theme();?>/images/global/icon-request.png"/>
                <span>Request Recipe</span>
              </a>
            </div>
          </div>
        </div>
        <div class="cat-filters-menu__sort--dropdown clearfix">
          <div class="container">
            <form action="" method="post" class="snackbox-filters-form clearfix">
              <fieldset class="snackbox-filters--filters">
                <legend>Category</legend>
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
              </fieldset>
              <fieldset class="snackbox-filters--options">
                <legend>Type</legend>
                <p class="checkbox">
                  <label for="filter-st-new">
                  <input type="checkbox" id="filter-st-new">New</label>
                </p>
                <p class="checkbox">
                  <label for="ffilter-st-in-progress">
                  <input type="checkbox" id="ffilter-st-in-progress">In Progress</label>
                </p>
                <p class="checkbox">
                  <label for="ffilter-st-completed">
                  <input type="checkbox" id="ffilter-st-completed">Completed</label>
                </p>
                <button type="submit">Apply Filters</button>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
      <section class="main container">
        <div class="listing clearfix">
          <div class="listing--results">
            <div class="listing--list js-isotope">
              <div class="list-item-container col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <div class="list-item">
                  <h2>Cook</h2>
                  <img src="<?php print base_path().path_to_theme();?>/images/dummy/list1.jpg" alt="Chicken Breasts with Balsamic Vinegar and Garlic">
                  <div class="list-item--info">
                    <a href="javascript:void(0);">
                      <h4>Recommended</h4>
                      <h3>10-Chicken Breasts with Balsamic Vinegar and Garlic</h3>
                    </a>
                    <div class="rating">
                      <div class="rating--stars stars--1">
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                      </div>
                      <span>(20)</span>
                    </div>

                    <a href="javascript:void(0);" class="add-to-snackbox" title="Add to your snack box"></a>
                    <div class="point">
                      You earn <strong>500 of 750 P</strong>
                      <div class="progress-bar">
                        <div class="pb-inner" style="width: 66.66%"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="list-item-container col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <div class="list-item">
                  <h2>Cook</h2>
                  <img src="<?php print base_path().path_to_theme();?>/images/dummy/list1.jpg" alt="Chicken Breasts with Balsamic Vinegar and Garlic">
                  <div class="list-item--info">
                    <a href="javascript:void(0);">
                      <h4>Recommended</h4>
                      <h3>10 Tips for Stress Free</h3>
                    </a>
                    <div class="rating">
                      <div class="rating--stars stars--1">
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                      </div>
                      <span>(20)</span>
                    </div>

                    <a href="javascript:void(0);" class="add-to-snackbox" title="Add to your snack box"></a>
                    <div class="point">
                      You earn <strong>0 of 2 badges</strong>
                      <div class="progress-bar">
                        <div class="pb-inner"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="list-item-container col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <div class="list-item">
                  <h2>Cook</h2>
                  <img src="<?php print base_path().path_to_theme();?>/images/dummy/list1.jpg" alt="Chicken Breasts with Balsamic Vinegar and Garlic">
                  <div class="list-item--info">
                    <a href="javascript:void(0);">
                      <h3>10-minute morning yoga</h3>
                    </a>
                    <div class="rating">
                      <div class="rating--stars stars--1">
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                      </div>
                      <span>(20)</span>
                    </div>

                    <a href="javascript:void(0);" class="add-to-snackbox" title="Add to your snack box"></a>
                    <div class="point">
                      You earn <strong>500 of 750 P</strong>
                      <div class="progress-bar">
                        <div class="pb-inner" style="width: 66.66%"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="list-item-container col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <div class="list-item">
                  <h2>Relax</h2>
                  <img src="<?php print base_path().path_to_theme();?>/images/dummy/list1.jpg" alt="Chicken Breasts with Balsamic Vinegar and Garlic">
                  <div class="list-item--info">
                    <a href="javascript:void(0);">
                      <h3>Stress Management: Practising Yoga to Relax</h3>
                    </a>
                    <div class="rating">
                      <div class="rating--stars stars--1">
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                      </div>
                      <span>(20)</span>
                    </div>

                    <a href="javascript:void(0);" class="add-to-snackbox" title="Add to your snack box"></a>
                    <div class="point">
                      You earn <strong>0 of 2 badges</strong>
                      <div class="progress-bar">
                        <div class="pb-inner"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="list-item-container col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <div class="list-item">
                  <h2>Cook</h2>
                  <img src="<?php print base_path().path_to_theme();?>/images/dummy/list1.jpg" alt="Chicken Breasts with Balsamic Vinegar and Garlic">
                  <div class="list-item--info">
                    <a href="javascript:void(0);">
                      <h4>Recommended</h4>
                      <h3>10 Tips for Stress Free</h3>
                    </a>
                    <div class="rating">
                      <div class="rating--stars stars--1">
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                      </div>
                      <span>(20)</span>
                    </div>

                    <a href="javascript:void(0);" class="add-to-snackbox" title="Add to your snack box"></a>
                    <div class="point">
                      You earn <strong>0 of 2 badges</strong>
                      <div class="progress-bar">
                        <div class="pb-inner"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="list-item-container col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <div class="list-item">
                  <h2>Cook</h2>
                  <img src="<?php print base_path().path_to_theme();?>/images/dummy/list1.jpg" alt="Chicken Breasts with Balsamic Vinegar and Garlic">
                  <div class="list-item--info">
                    <a href="javascript:void(0);">
                      <h3>10-minute morning yoga</h3>
                    </a>
                    <div class="rating">
                      <div class="rating--stars stars--1">
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                      </div>
                      <span>(20)</span>
                    </div>

                    <a href="javascript:void(0);" class="add-to-snackbox" title="Add to your snack box"></a>
                    <div class="point">
                      You earn <strong>500 of 750 P</strong>
                      <div class="progress-bar">
                        <div class="pb-inner" style="width: 66.66%"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="list-item-container col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <div class="list-item">
                  <h2>Relax</h2>
                  <img src="<?php print base_path().path_to_theme();?>/images/dummy/list1.jpg" alt="Chicken Breasts with Balsamic Vinegar and Garlic">
                  <div class="list-item--info">
                    <a href="javascript:void(0);">
                      <h3>Stress Management: Practising Yoga to Relax</h3>
                    </a>
                    <div class="rating">
                      <div class="rating--stars stars--1">
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                      </div>
                      <span>(20)</span>
                    </div>

                    <a href="javascript:void(0);" class="add-to-snackbox" title="Add to your snack box"></a>
                    <div class="point">
                      You earn <strong>0 of 2 badges</strong>
                      <div class="progress-bar">
                        <div class="pb-inner"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="also-like">
          <h3>You may also like</h3>
          <div class="listing clearfix">
            <div class="listing--results">
              <div class="listing--list js-isotope">
                <div class="list-item-container col-xs-6 col-sm-3 col-md-3 col-lg-3">
                  <div class="list-item">
                    <h2>Cook</h2>
                    <img src="<?php print base_path().path_to_theme();?>/images/dummy/list1.jpg" alt="Chicken Breasts with Balsamic Vinegar and Garlic">
                    <div class="list-item--info">
                      <a href="javascript:void(0);">
                        <h4>SPECIAL SNACK FOR HARI RAYA 2015</h4>
                        <h3>Red Velvet Cookies</h3>
                      </a>
                      <div class="rating">
                        <div class="rating--stars stars--4">
                          <span class="star"></span>
                          <span class="star"></span>
                          <span class="star"></span>
                          <span class="star"></span>
                          <span class="star"></span>
                        </div>
                        <span>(20)</span>
                      </div>

                      <a href="javascript:void(0);" class="add-to-snackbox" title="Add to your snack box"></a>
                      <div class="point">
                        You earn <strong>500 of 750 P</strong>
                        <div class="progress-bar">
                          <div class="pb-inner" style="width: 66.66%"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="list-item-container col-xs-6 col-sm-3 col-md-3 col-lg-3">
                  <div class="list-item">
                    <h2>Cook</h2>
                    <img src="<?php print base_path().path_to_theme();?>/images/dummy/list1.jpg" alt="Chicken Breasts with Balsamic Vinegar and Garlic">
                    <div class="list-item--info">
                      <a href="javascript:void(0);">
                        <h4>SPECIAL SNACK FOR HARI RAYA 2015</h4>
                        <h3>Almond Sugee Cookies</h3>
                      </a>
                      <div class="rating">
                        <div class="rating--stars stars--4">
                          <span class="star"></span>
                          <span class="star"></span>
                          <span class="star"></span>
                          <span class="star"></span>
                          <span class="star"></span>
                        </div>
                        <span>(20)</span>
                      </div>

                      <a href="javascript:void(0);" class="add-to-snackbox" title="Add to your snack box"></a>
                      <div class="point">
                        You earn <strong>500 of 750 P</strong>
                        <div class="progress-bar">
                          <div class="pb-inner" style="width: 66.66%"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="list-item-container col-xs-6 col-sm-3 col-md-3 col-lg-3">
                  <div class="list-item">
                    <h2>Cook</h2>
                    <img src="<?php print base_path().path_to_theme();?>/images/dummy/list1.jpg" alt="Chicken Breasts with Balsamic Vinegar and Garlic">
                    <div class="list-item--info">
                      <a href="javascript:void(0);">
                        <h4>SPECIAL SNACK FOR HARI RAYA 2015</h4>
                        <h3>Heart-shaped Cookies</h3>
                      </a>
                      <div class="rating">
                        <div class="rating--stars stars--4">
                          <span class="star"></span>
                          <span class="star"></span>
                          <span class="star"></span>
                          <span class="star"></span>
                          <span class="star"></span>
                        </div>
                        <span>(20)</span>
                      </div>

                      <a href="javascript:void(0);" class="add-to-snackbox" title="Add to your snack box"></a>
                      <div class="point">
                        You earn <strong>500 of 750 P</strong>
                        <div class="progress-bar">
                          <div class="pb-inner" style="width: 66.66%"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="list-item-container col-xs-6 col-sm-3 col-md-3 col-lg-3">
                  <div class="list-item">
                    <h2>Cook</h2>
                    <img src="<?php print base_path().path_to_theme();?>/images/dummy/list1.jpg" alt="Chicken Breasts with Balsamic Vinegar and Garlic">
                    <div class="list-item--info">
                      <a href="javascript:void(0);">
                        <h4>SPECIAL SNACK FOR HARI RAYA 2015</h4>
                        <h3>Semperit Pandan</h3>
                      </a>
                      <div class="rating">
                        <div class="rating--stars stars--4">
                          <span class="star"></span>
                          <span class="star"></span>
                          <span class="star"></span>
                          <span class="star"></span>
                          <span class="star"></span>
                        </div>
                        <span>(20)</span>
                      </div>

                      <a href="javascript:void(0);" class="add-to-snackbox" title="Add to your snack box"></a>
                      <div class="point">
                        You earn <strong>500 of 750 P</strong>
                        <div class="progress-bar">
                          <div class="pb-inner" style="width: 66.66%"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <a href="javascript:void(0);" id="btn-backtop">Back To Top</a> -->
      </section>
    </main>
