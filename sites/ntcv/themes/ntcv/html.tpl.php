<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>

<head profile="<?php print $grddl_profile; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>

</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <script src="<?php print base_path().path_to_theme();?>/js/vendor/jquery.js"></script>
  <script src="<?php print base_path().path_to_theme();?>/js/foundation.min.js"></script>
  <script>
    $(document).foundation();
    $(document).ready(function(){
      $('input[type=submit]').addClass('button radius');
      $('ul.pager').addClass('pagination');
      var current_page = $('ul.pager li.pager-current').text();
      $('ul.pager li.pager-current').removeClass('pager-current').addClass('current').html('<a>' + current_page + '</a>');
      $('.search-block .form-wrapper input[type=submit]').addClass('tiny');
      //$('ul.pager li.pager-item').removeClass('pager-item');

    });
  </script>
  <?php print $page_bottom; ?>
</body>
</html>
