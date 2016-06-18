<?php
//Routing
$request = strtolower($_SERVER["REQUEST_URI"]);
$matches = [];
preg_match("/\/blog\/(.+)-.+/",$request,$matches);
if(count($matches) != 0){
    include("blogEntry.php");
}
else{

$files = scandir('project/Blog/entries/');
$filteredFiles = array_diff($files,array('..','.'));
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
    <?php
        include("project/Site/header.php");
    ?>
    <div class="row top">
    <h1>Blog</h1>
    <br>
        Welcome to my blog! It contains random diaries about software development and video games.
    </br>
  </div>
  <div class="content">
    <?php
        $filteredFiles = array_reverse($filteredFiles);
        foreach ($filteredFiles as $file){
            preg_match("/(.+)-(.+)\.md/",$file,$matches);
            echo "<a href='/blog/".$matches[1].'-'.$matches[2]."'>".$matches[1]." - " .str_replace('_',' ',$matches[2])."</a><br>";
        }
    ?>
    <br>
    <br>
  </div>
</body>
</html>
<?php }?> 
