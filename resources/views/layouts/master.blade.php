<!DOCTYPE>
<html>
<head>
    <title>Grasseh -- @yield('title')</title>
    <meta charset="utf-8">
    @yield('head')
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-70712300-1', 'auto');
    ga('send', 'pageview');

    </script>
    <meta name="google-site-verification" content="5AAUV6kXUaGDfbv0pcyjkZlGkXzefCQJ8-lceyz3eqc" />
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
      <span class="helpFooter">&nbsp;</span>Developped by Grasseh/Steve Gagné 2015 - <?php echo(date("Y",time()));?>
    </div>
</body>
</html>
