    <main id="category-page" ng-app="todoApp">
      <div class="category-heading">
        <h2>Cook</h2>
      </div>
      <div class="category-filters clearfix">
        <div class="category-filters-top clearfix">
          <div class="cat-filters-menu cat-filters-menu__filters">
            <a href="javascript:void(0);">Filters</a>
          </div>
          <div class="cat-filters-menu cat-filters-menu__sort">
            <span>Sort by</span>
            <div class="sort-dropdown" id="sort-dropdown">
              <span>Latest</span>
              <ul class="list-unstyled">
                <li><a href="javascript:void(0);">Latest</a></li>
                <li><a href="javascript:void(0);">Oldest</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="cat-filters-menu__sort--dropdown">
          <?php print $data['cook_form'];?>
        </div>
      </div>



      <section class="main container" ng-controller="TodoListController as todoList">
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
                    <a href="<?php print $item->href;?>" class="add-to-snackbox<?php print $item->is_added?' active':'';?>"></a>
                  </div>
                </div>
              </div>
              <?php endforeach;?>

              <div class="list-item-container col-xs-6 col-sm-3 col-md-3 col-lg-3" ng-repeat="todo in todoList.todos">
                <div class="list-item">

                  <h2 class="has-video"><?php print $item->category_name;?><?php if($item->has_video):?><span class="icon-video"></span><?php endif;?></h2>
                  <img src="<?php print base_path().path_to_theme();?>/images/dummy/list1.jpg" alt="Chicken Breasts with Balsamic Vinegar and Garlic">
                  <div class="list-item--info">
                    <a href="<?php print $item->href;?>">
                      <?php if($item->is_recommended):?><h4>Recommended</h4><?php endif;?>
                      <h3>{{todo.text}}</h3>
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
                    <a href="<?php print $item->href;?>" class="add-to-snackbox<?php print $item->is_added?' active':'';?>"></a>
                  </div>
                </div>
              </div>







            </div>

            <form ng-submit="todoList.addTodo()">
              <input type="text" ng-model="todoList.todoText"  size="30" placeholder="add new todo here">
              <input class="btn-primary" type="submit" value="add">
            </form>
            <div class="listing--load-more">
              <div class="load-more--icon"></div>
            </div>
          </div>
        </div>
        <!-- <a href="javascript:void(0);" id="btn-backtop">Back To Top</a> -->
      </section>

    </main>

    <script src="<?php print base_path().path_to_theme();?>/js/angular.min.js"></script>
