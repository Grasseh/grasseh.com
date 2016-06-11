<?php
$files = scandir('project/Blog/entries/');
$filteredFiles = array_diff($files,array('..','.'));
var_dump($filteredFiles);
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
    <h1>Blog</h1>
    <br>
        Welcome to my blog! It contains random diaries about software development and video games.
    </br>
  </div>
  <div class="content">
    <br>
    <br>
  </div>
</body>
</html>

