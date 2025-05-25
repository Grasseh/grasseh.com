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
</body>
</html>
