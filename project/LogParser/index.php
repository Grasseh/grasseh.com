<!DOCTYPE>
<html>
<head>
<title>Grasseh -- LogParser</title>
  <meta charset="utf-8">
  <link href='https://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="/public/css/style.css">
  <link rel="stylesheet" href="/public/libs/Skeleton/css/normalize.css">
  <link rel="stylesheet" href="/public/libs/Skeleton/css/skeleton.css">
  <link rel="icon" type="image/png" href="/public/images/logo.png">
  <meta name="description" content="This is my custom log parser. It loads a JSON log and puts it in a readable format." />
  <script type="text/javascript" src="/public/libs/jquery.js" ></script>
  <script src="/public/LogParser/js/main.js" ></script>
</head>
<body class="container">
<div class="content">
JSON Log:<br>
<textarea id="log" style="width:60%;height:250px;" ></textarea><br>
<button id="parse">Parse</button>
</div>
<hr>
<div id="filters"></div>
<div class="dataTablediv">
</div>
<hr><hr><hr>
  <p>
  This is my custom log parser. It loads a JSON log and puts it in a readable format.<br><br>

  Work in Progress.<br><br>

  Current file format takes JSONs.<br>
  JSON Log Example :<br>
  {"type" : 1, "type_message" : "critical", "date" : "2015-11-15 09:49:12.123 UTC-5", "data" : "2"}<br>
  {"type" : 4, "type_message" : "warn", "date" : "2015-11-15 19:39:22.323 UTC-5", "data" : "3", "toaster" : "kk"}<br>
  Any other value than type, type_message and date will be in the same "other keys" column.<br>
  Each line needs to be its own individual JSON.<br>

  To Do :<br>
  <ul>
    <li><strike>Get some object off the JSON</strike></li>
    <li><strike>Check that the JSON is valid</strike></li>
    <li><strike>Create a table of the JSON</strike></li>
    <li>Prettify the table</li>
    <li>Support arrays in data?</li>
    <li><strike>Add some filters to the table</strike></li>
    <li>Add more filters to the table</li>
    <li>Clean up</li>
  </ul>
  </p>
</body>
</html>
