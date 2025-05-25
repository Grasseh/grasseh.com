<!DOCTYPE>
<html>
<head>
    <title>Grasseh -- @yield('title')</title>
    <meta charset="utf-8">
    @yield('head')
</head>
<body class="container">
  <div class="row top">
    <div class="header">
    <a href="/">
        <img src="/public/images/logo.png" class="logo">
    </a>
  </div>
</div>

  </div>
  <div class="content">
    <br>
    <br>
    @yield('content')
  </div>
    <div class="footer">
      <span class="helpFooter">&nbsp;</span>Developed by Grasseh/Steve Gagné 2015 - <?php echo(date("Y",time()));?>
    </div>
</body>
</html>
