

<?php if ($block->subject): ?>
  <div class="content panel"<?php print $content_attributes; ?>>
    <?php print render($title_prefix); ?>
    <h4 class="block-title"><?php print $block->subject ?></h4>
    <?php print render($title_suffix); ?>
    <?php print $content ?>
  </div>
<?php else:?>
  <?php print $content ?>
<?php endif;?>
