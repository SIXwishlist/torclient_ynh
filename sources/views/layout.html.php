<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?= $locale ?>"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?= T_("Tor Client") ?><?= isset($title) ? " | $title" : '' ?></title>
  <meta name="viewport" content="width=device-width">
  <link media="all" type="text/css" href="<?= PUBLIC_DIR ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link media="all" type="text/css" href="<?= PUBLIC_DIR ?>/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
  <link media="all" type="text/css" href="<?= PUBLIC_DIR ?>/css/bootstrap-toggle.min.css" rel="stylesheet">
  <link media="all" type="text/css" href="<?= PUBLIC_DIR ?>/css/style.css" rel="stylesheet">
  <script src="<?= PUBLIC_DIR ?>/jquery/jquery-2.1.1.min.js"></script>
  <script src="<?= PUBLIC_DIR ?>/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= PUBLIC_DIR ?>/js/bootstrap-toggle.min.js"></script>
  <script src="<?= PUBLIC_DIR ?>/js/custom.js"></script>
</head>
<body>
  <div class="container">
    <?php if(isset($flash['error'])): ?>
      <div class="alert alert-dismissible alert-danger fade in" style="margin-top: 20px" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong><?= T_('Error') ?>:</strong> <?= $flash['error'] ?>
      </div>
    <?php elseif(isset($flash['notice'])): ?>
      <div class="alert alert-dismissible alert-info fade in" style="margin-top: 20px" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong><?= T_('Notice') ?>:</strong> <?= $flash['notice'] ?>
      </div>
    <?php elseif(isset($flash['success'])): ?>
      <div class="alert alert-dismissible alert-success fade in" style="margin-top: 20px" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <?= $flash['success'] ?>
      </div>
    <?php endif; ?>

    <?= $content?>

    <hr />
    <div id="github"><a href="https://github.com/labriqueinternet/torclient_ynh"><?= T_('Any problem? Contribute!') ?></a> - AGPL 3.0</div>
  </div>
</body>
</html>
