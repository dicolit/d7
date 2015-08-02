<h1><?php print $title;?></h1>
<?php if($node->custom_content):?>
  <?php print $node->custom_content;?>
<?php else:?>
  <h1>BBB</h1>
<?php endif;?>
