<?php
require __DIR__ . '/vendor/autoload.php';
$request = strtolower($_SERVER["REQUEST_URI"]);
$matches = [];
preg_match("/\/blog\/(.+)-.+/",$request,$matches);

//Find file
$no = glob("project/Blog/entries/" . $matches[1] . "-*.md");

$data = file_get_contents($no[0]);
$Parsedown = new Parsedown();
?>
<!DOCTYPE>
<html>
<head>
  <title>Grasseh -- Blog --  Backend programmer</title>
  <meta charset="utf-8">
  <link href='https://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="/public/libs/Skeleton/css/normalize.css">
  <link rel="stylesheet" href="/public/libs/Skeleton/css/skeleton.css">
  <link rel="icon" type="image/png" href="/public/images/logo.png">
  <link rel="stylesheet" href="/public/css/style.css">
  <meta name="description" content="Steve Gagné's personnal blog. Contains random diaries about software development and video games.">
</head>
<body class="container">
  <div class="row top">
    <div class="row top">
    <?php
      include("project/Site/header.php");
    ?>
  </div>
    <h1>Blog</h1>
    <br>
    <div class="BlogText">
        <?php
            echo $Parsedown->text($data); 
        ?>
    </div>
    </br>
  </div>
  <div class="content">
    <br>
    <br>
  </div>
</body>
</html>
