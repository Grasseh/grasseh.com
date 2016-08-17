<!DOCTYPE>
<html>
<head>
  <title>Grasseh -- Backend programmer</title>
  <meta charset="utf-8">
  <link href='https://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="/public/libs/Skeleton/css/normalize.css">
  <link rel="stylesheet" href="/public/libs/Skeleton/css/skeleton.css">
  <link rel="icon" type="image/png" href="/public/images/logo.png">
  <link rel="stylesheet" href="/public/css/style.css">
  <meta name="google-site-verification" content="5AAUV6kXUaGDfbv0pcyjkZlGkXzefCQJ8-lceyz3eqc" />
  <meta name="description" content="Steve Gagné's personnal website. Contains various projects and a few unique pages for tests and fun." />
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-70712300-1', 'auto');
    ga('send', 'pageview');

  </script>
</head>
<body class="container">
  <div class="row top">
    <?php
      include("header.php");
    ?>
  </div>
  <div class="content">
<br>
    <br>
    <?php
      include("routes.php");
    ?>
  </div>
</body>
</html>
