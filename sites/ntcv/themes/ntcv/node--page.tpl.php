<?php if (!$page): ?>

  <div class="row node node-item">
    <div class="large-3 columns">
      <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
    </div>
    <div class="large-9 columns">
      <?php print render($title_prefix); ?>
      <?php if (!$page): ?>
        <h5<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h5>
      <?php endif; ?>
      <?php print render($title_suffix); ?>

      <?php if ($display_submitted): ?>
        <sub>
          <?php print $submitted; ?>
        </sub>
      <?php endif; ?>
    </div>
  </div>
<?php else:?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <sub>
      <?php print $submitted; ?>
    </sub>
  <?php endif; ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>
  <?php print $node->custom_content;?>
</div>
<?php endif;?>


