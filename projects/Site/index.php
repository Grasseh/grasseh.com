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
      <h1>Who am I?</h1>
      <p>I'm a 21 years old backend programmer, from Quebec, Canada. I currently study software engineering at the ÉTS, in Montréal. I'm passionate about creating algorithms and discovering new ways to work around problems. The only side I dislike from web development is designing a good looking page. Let's be honest, this page's design is rather basic. I'm all about fonctionnalities, and I much prefer have someone else work on the looks of any I do.</p>
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
      <h1>Favorite languages/programming utilities</h1>
      <ul>
        <li>PHP</li>
        <li>JavaScript</li>
        <li>SQL</li>
        <li>C#</li>
        <li>Git(Seriously, everyone that programs a little should learn Git)</li>
      </ul>
      <h1>Other languages I know</h1>
      <ul>
        <li>HTML/CSS</li>
        <li>Java</li>
        <li>ASP + ASP.net</li>
      </ul>
    </div>
  </div>
  <div class="section_three">
    <div class="col-6 column three-left">
      <h1>Projects</h1>
      <ul>
        <li><a href="www.grasseh.com">This website</a></li>
        <li><a href="<?php echo(ABSOLUTE_SERVER_PATH); ?>/site/projects/airport">Airport package simulator(C#)</a></li>
        <li><a href="<?php echo(ABSOLUTE_SERVER_PATH); ?>/site/projects/progress-quest">Progress Quest</a></li>
      </ul>
    </div>
    <div class="col-6 column three-right">
      <h1>Other pages</h1>
      <ul>
        <li><a href="http://www.github.com/grasseh">GitHub</a></li>
        <li><a href="http://www.steamcommunity.com/id/grasseh">Steam</a></li>
      </ul>
    </div>
  </div>
</div>
<?php
  include("footer.php");
?>
</body>
</html>
