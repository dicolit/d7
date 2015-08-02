<?php include_once 'inc/header.inc';?>

<div class="row middle-content">
  <div class="large-12 columns">
    <?php if ($page['highlighted']): ?>
      <div id="highlighted"><?php print render($page['highlighted']); ?></div>
    <?php endif; ?>

    <?php print render($title_suffix); ?>
    <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
    <?php print render($page['help']); ?>
    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
    <?php print render($page['content']); ?>
    <?php print $feed_icons; ?>
  </div>
</div>

<?php include_once 'inc/footer.inc';?>
