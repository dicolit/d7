<main id="category-page">
  <div class="category-heading">
    <h2><?php echo arg(0); ?></h2>
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
    </div><?php //category-filters-top ?>
    <div class="cat-filters-menu__sort--dropdown">
      <?php print $data['filter_form']?>
    </div>
  </div><?php // end .category-filters ?>
  <section class="main container">
    <div class="listing clearfix">
      <div class="listing--results">
        <div class="listing--list js-isotope">
          <?php
          foreach ($data['item_list'] as $item) {
            $item_theme = theme('grid_view_item', array('item' => $item));
            echo render($item_theme);
          }
          ?>
        </div>
        <div class="listing--load-more">
          <div class="load-more--icon"></div>
        </div>
      </div>
    </div>
  </section>
</main>
