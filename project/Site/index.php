<!DOCTYPE>
<html>
<head>
  <title>Grasseh -- Backend programmer</title>
  <meta charset="utf-8">
  <link href='https://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="/public/css/style.css">
  <link rel="stylesheet" href="/public/libs/Skeleton/css/normalize.css">
  <link rel="stylesheet" href="/public/libs/Skeleton/css/skeleton.css">
  <link rel="icon" type="image/png" href="/public/images/logo.png">
  <meta name="google-site-verification" content="5AAUV6kXUaGDfbv0pcyjkZlGkXzefCQJ8-lceyz3eqc" />
  <meta name="description" content="Steve Gagne's personnal website. Contains various projects and a few unique pages for tests and fun." />
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
    <?php
      include("routes.php");
    ?>
  </div>
  <?php
    include("footer.php");
  ?>
</body>
</html>
