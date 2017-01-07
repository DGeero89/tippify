<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tipify.me</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="http://tippify-110031.use1-2.nitrousbox.com:4000/_js/jquery.js"></script>
  <script src="http://tippify-110031.use1-2.nitrousbox.com:4000/_js/sorttable.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <script>
    function preloadImage(url)
    {
        var img=new Image();
        img.src=http://tippify-110031.use1-2.nitrousbox.com:4000/_img/rotateOptionButton.gif;
    }
    </script>
  
  @yield('scripts')

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
{{ HTML::style('css/main.css') }}




</head>

<body>
 <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <div  id="headerwrap">
<div class="container" id="header">
        <ul class="nav nav-pills pull-right">
          @if(!Auth::check())
          <li><a href="/">Home</a></li>
          <li>{{ HTML::link('users/login', 'Login') }}</li> 
          @else
          <li><a href="/">Home</a></li>
          <li>{{ HTML::link('users/dashboard', 'Dashboard') }}</li>
            <li><img id="optionButton" src="http://tippify-110031.use1-2.nitrousbox.com:4000/_img/optionButton.gif" onclick="this.src='http://tippify-110031.use1-2.nitrousbox.com:4000/_img/rotateOptionButton.gif'; document.getElementById('optionsMenu').style.visibility='visible';" /></li>
    <div id="optionsMenu">
    	<button onclick="document.getElementById('optionsMenu').style.visibility='hidden';" style="float: right;">X</button><br /><br />
    	<a href="#">Options</a><br />
        {{ HTML::link('users/logout', 'Logout') }}
    </div><!-- Options Menu -->
            @endif
        </ul>
        <a href="/"><h3 class="text-muted">Tippify.me</h3></a>
      </div>
  </div>
  
  <div class="container" id="dashboard-body">
        @if(Session::has('message'))
            <p class="alert bg-warning">{{ Session::get('message') }}</p>
        @endif
    
    @yield('content')
    </div>
  </body> 
</html>

