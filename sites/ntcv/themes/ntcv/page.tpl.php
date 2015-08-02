<?php include_once 'inc/header.inc';?>

<div class="row middle-content">

  <div class="large-<?php print (12 - ($page['sidebar_first'] ? 3 : 0) - ($page['sidebar_second'] ? 3 : 0));?> columns main-content">
    <?php print $messages; ?>

    <?php if ($page['highlighted']): ?>
      <div id="highlighted"><?php print render($page['highlighted']); ?></div>
    <?php endif; ?>
    <a id="main-content"></a>
    <?php print render($title_prefix); ?>
    <?php if ($title): ?><h3 class="title block-title" id="page-title"><?php print $title; ?></h3><?php endif; ?>

    <?php print render($title_suffix); ?>
    <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
    <?php print render($page['help']); ?>
    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
    <?php print render($page['content']); ?>
    <?php print $feed_icons; ?>
  </div>
  <?php if ($page['sidebar_first']): ?>
  <div class="large-3 columns">
    <?php print render($page['sidebar_first']);?>
  </div>
  <?php endif;?>
  <?php if ($page['sidebar_second']): ?>
  <div class="large-3 columns">
    <?php print render($page['sidebar_second']);?>
  </div>
  <?php endif;?>
</div>

<?php include_once 'inc/footer.inc';?>
