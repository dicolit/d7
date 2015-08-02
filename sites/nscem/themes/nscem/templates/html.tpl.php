<?php global $user;?>
<!doctype html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Nestle</title>
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="stylesheet" href="<?php print base_path().path_to_theme();?>/styles/vendor.css">
    <link rel="stylesheet" href="<?php print base_path().path_to_theme();?>/styles/main.css">
    <script src="<?php print base_path().path_to_theme();?>/scripts/vendor/modernizr.js"></script>
  </head>
  <?php if($user->uid > 0):?>
  <body class="logged-in">
  <?php else:?>
  <body class="not-logged-in">
  <?php endif;?>
    <!--[if lt IE 10]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <?php print $page; ?>
    <!-- Common JS -->
    <script src="<?php print base_path().path_to_theme();?>/scripts/vendor.js"></script>
    <script src="<?php print base_path().path_to_theme();?>/scripts/plugins.js"></script>
    <script src="<?php print base_path().path_to_theme();?>/scripts/main.js"></script>
    <!-- /Common JS -->

    <?php $arrMessages = form_get_errors();?>
    <?php if(count($arrMessages)):?>
    <script type="text/javascript">
    var arr_errors = <?php print json_encode($arrMessages);?>;
    </script>
    <?php endif;?>
    <script type="text/javascript">
      //$('#editPhotoModal').modal('show');
      //$('#deletePhotoModal').modal('show');
      //$('#webTourModal').modal('show');
      //$('#forgotPassModal').modal('show');
      //$('#deleteRecipeModal').modal('show');
      //$('#welcomeModal').modal('show');
    </script>

    <?php print $page_bottom; ?>

  </body>
</html>
