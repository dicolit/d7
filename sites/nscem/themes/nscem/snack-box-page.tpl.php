<?php $items = $data['item_list'];?>
<main id="snackbox-page">
    <div class="category-heading">
        <h2>Snackbox</h2>
        <div class="snack-types">
            <a href="javascript:void(0);" class="active">Saved Snacks</a>
            <a href="javascript:void(0);">Modified Recipes</a>
        </div>
    </div>

    <div class="category-filters snackbox-filters clearfix">
        <div class="category-filters-top clearfix">
            <div class="container">
                <div class="snack-total"><?php echo count($items)?> snacks</div>
                <div class="cat-filters-menu cat-filters-menu__filters">
                    <a href="javascript:void(0);" class="btn-snackbox-filter">More Filters</a>
                </div>
            </div>
        </div>

        <div class="cat-filters-menu__sort--dropdown clearfix">
            <div class="container">
                <form action="/snack-box" method="post" class="snackbox-filters-form clearfix">
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
                    <?php foreach($items as $item):?>
                    <div class="list-item-container col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="list-item">
                            <h2><?php echo $item->type ?></h2>
                            <img width="241" height="169" src="<?php echo get_thumbnail_url($item->image);?>" alt="<?php echo $item->name ?>"/>
                            <div class="list-item--info">
                                <a href="javascript:void(0);">
                                    <?php if($item->recommended):?>
                                        <h4><?php echo t('Recommended')?></h4>
                                    <?php endif;?>
                                    <h3><?php echo $item->name ?></h3>
                                </a>
                                <div class="rating">
                                    <div class="rating--stars stars--1">
                                        <span class="star"></span>
                                        <span class="star"></span>
                                        <span class="star"></span>
                                        <span class="star"></span>
                                        <span class="star"></span>
                                    </div>
                                    <span>(<?php echo $item->vote_count ?>)</span>
                                </div>
                                <a href="javascript:void(0);" class="add-to-snackbox" title="Add to your snack box"></a>
                                <div class="point">
                                    <?php if($item->type == 'move'):?>
                                        <?php if($item->earn_badge == $item->max_badge):?>
                                            You earned all badges!
                                        <?php else:?>
                                            You earn <strong><?php echo $item->earn_badge ?> of <?php echo $item->max_badge ?> badges</strong>
                                        <?php endif;?>
                                    <?php else:?>
                                        <?php if($item->earn_point == $item->max_point):?>
                                            You earned all points!
                                        <?php else:?>
                                            You earn <strong><?php echo $item->earn_point ?> of <?php echo $item->max_point ?> P</strong>
                                        <?php endif;?>
                                    <?php endif;?>
                                    <div class="progress-bar">
                                        <div class="pb-inner" style="width: <?php echo get_process_percent($item)?>%"></div>
                                    </div>
                                </div>
                            </div><?php // end .list-item--info ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>

        <div class="also-like">
            <h3>You may also like</h3>
            <div class="listing clearfix">
                <div class="listing--results">
                    <div class="listing--list js-isotope">
                        <?php foreach($data['cross_sell'] as $item):?>
                        <div class="list-item-container col-xs-6 col-sm-3 col-md-3 col-lg-3">
                            <div class="list-item">
                                <h2><?php echo $item->type ?></h2>
                                <img width="241" height="169" src="<?php echo get_thumbnail_url($item->image);?>" alt="<?php echo $item->name ?>"/>
                                <div class="list-item--info">
                                    <a href="javascript:void(0);">
                                        <h4><?php echo $item->label ?></h4>
                                        <h3><?php echo $item->name ?></h3>
                                    </a>
                                    <div class="rating">
                                        <div class="rating--stars stars--4">
                                            <span class="star"></span>
                                            <span class="star"></span>
                                            <span class="star"></span>
                                            <span class="star"></span>
                                            <span class="star"></span>
                                        </div>
                                        <span>(<?php echo $item->vote_count ?>)</span>
                                    </div>

                                    <a href="javascript:void(0);" class="add-to-snackbox" title="Add to your snack box"></a>
                                    <div class="point">
                                        <?php if($item->type == 'move'):?>
                                            <?php if($item->earn_badge == $item->max_badge):?>
                                                You earned all badges!
                                            <?php else:?>
                                                You earn <strong><?php echo $item->earn_badge ?> of <?php echo $item->max_badge ?> badges</strong>
                                            <?php endif;?>
                                        <?php else:?>
                                            <?php if($item->earn_point == $item->max_point):?>
                                                You earned all points!
                                            <?php else:?>
                                                You earn <strong><?php echo $item->earn_point ?> of <?php echo $item->max_point ?> P</strong>
                                            <?php endif;?>
                                        <?php endif;?>
                                        <div class="progress-bar">
                                            <div class="pb-inner" style="width: <?php echo get_process_percent($item)?>%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div><?php // end .also-like?>
    </section>
</main>