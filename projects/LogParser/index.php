<!DOCTYPE>
<html>
<head>
<title>LogParser -- Grasseh</title>
<link href='https://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/public/css/style.css">
<link rel="stylesheet" href="/public/libs/Skeleton/css/normalize.css">
<link rel="stylesheet" href="/public/libs/Skeleton/css/skeleton.css">
<link rel="icon" type="image/png" href="/public/images/logo.png">
<script type="text/javascript" src="/public/libs/jquery.js" ></script>
<script src="/public/LogParser/js/main.js" ></script>
</head>
<body class="container">
<div class="content">
JSON Log:<br>
<textarea id="log"></textarea><br>
<button id="parse">Parse</button>
</div>
<div class="dataTablediv">
</div>
<hr><hr><hr>
  <p>
  This is my custom log parser. It loads a JSON log and puts it in a readable format.<br><br>

  Work in Progress.<br><br>

  Current file format takes JSONs.<br>
  JSON Log Example :<br>
  {"type" : 1, "type_message" : "critical", "date" : "2015-11-15 09:49:12.123 UTC-5", "data" : "2"}<br>
  Any other value than type, type_message and date will be in the same "other keys" column.<br>
  </p>
</body>
</html>
