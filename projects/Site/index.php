<!DOCTYPE>
<html>
<head>
<title>Under Construction -- Grasseh</title>
<link href='https://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo(ABSOLUTE_SERVER_PATH); ?>/public/css/style.css">
<link rel="stylesheet" href="<?php echo(ABSOLUTE_SERVER_PATH); ?>/public/libs/Skeleton/css/normalize.css">
<link rel="stylesheet" href="<?php echo(ABSOLUTE_SERVER_PATH); ?>/public/libs/Skeleton/css/skeleton.css">
<link rel="icon" type="image/png" href="<?php echo(ABSOLUTE_SERVER_PATH); ?>/public/images/logo.png">
</head>
<body class="container">
<div class="row top">
  <div class="col-2 no-spacing-column">
  <?php
    include("header.php");
  ?>
  </div>
  <div class="col-10 no-spacing-column">
  <?php
    include("menu.php");
  ?>
  </div>

</div>
<div class="content">
  <div class="section_one">
    <div class="col-6 column one-left">
      <p>This page is under construction. Please come back soon!</p>
    </div>
    <div class="col-6 column one-right">
      <img class="one-right" src="<?php echo(ABSOLUTE_SERVER_PATH); ?>/public/images/logo.png">
    </div>
  </div>
  <div class="section_two">
    <div class="col-6 column two-left">
      <img class="one-right" src="<?php echo(ABSOLUTE_SERVER_PATH); ?>/public/images/logo.png">
    </div>
    <div class="col-6 column two-right">
      <p>This page is under construction. Please come back soon!</p>
    </div>
  </div>
  <div class="section_three">
    <div class="col-6 column three-left">
      <p>This page is under construction. Please come back soon!</p>
    </div>
    <div class="col-6 column three-right">
      <img class="one-right" src="<?php echo(ABSOLUTE_SERVER_PATH); ?>/public/images/logo.png">
    </div>
  </div>
</div>
<?php
  include("footer.php");
?>
</body>
</html>
