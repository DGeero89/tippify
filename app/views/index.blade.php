<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Tippify.me</title>
  <link rel="stylesheet" href="css/main.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>

<body>
 <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <div  id="headerwrap">
<div class="container" id="header">
        <!-- Navigation -->
        <ul class="nav nav-pills pull-right">
            <!-- When not logged in -->
          @if(!Auth::check())
          <li><h3 style="margin-top: 5px;">Welcome to Tippify.Me!</h3></li>
          <li><a href="/">Home</a></li>
          <li onclick="document.getElementById('loginBox').style.visibility = 'visible';"><a href="#">Login</a></li>
          @else
            <!-- When logged in -->
          <li><h2 style="margin-top: 5px;">Welcome back, {{ Auth::user()->firstname ?: '' }}!</h2></li>
          <li><a href="/">Home</a></li>
          <li>{{ HTML::link('users/dashboard', 'Dashboard') }}</li>
          <li><img id="optionButton" src="http://tippify-110031.use1-2.nitrousbox.com:4000/_img/optionButton.gif" onclick="this.src='http://tippify-110031.use1-2.nitrousbox.com:4000/_img/rotateOptionButton.gif'; document.getElementById('optionsMenu').style.visibility='visible';" /></li>
            
    <div id="optionsMenu">
    	<button onclick="document.getElementById('optionsMenu').style.visibility='hidden';" style="float: right;"><strong>X</strong></button><br /><br />
    	<a href="#">Options</a><br />
        {{ HTML::link('users/logout', 'Logout') }}
    </div><!-- Options Menu -->
            @endif
        </ul>
        <a href="/"><h3 class="text-muted">Tippify.me</h3></a>
      </div>
<div id="loginBox">
    <button class="closeButton" onclick="document.getElementById('loginBox').style.visibility = 'hidden';"><strong>X</strong></button>
    {{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
        <h2 class="form-signin-heading">Please Login</h2>
     
        {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
        {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
     
        {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
    {{ Form::close() }}
</div><!-- Login Box -->
  </div>
<div class="container">
        @if(Session::has('message'))
            <p class="alert">{{ Session::get('message') }}</p>
        @endif
    </div>
<div class="container">
        
<div class="inner cover">
  </div>
  </div>
 <div id="padded" class="navbar-collapse">
   <div class="container" id="intro">          
   <img id="graphic" src="_img/Flaticon_23007.png" alt="First Graphic">
     
@if(!Auth::check())
 {{ Form::open(array('url'=>'users/create', 'class'=>'form-signup', 'id'=>'login')) }}
    <h2 class="form-signup-heading">Please Register</h2>
 
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
 
{{ Form::text('firstname', null, array('class'=>'input-block-level', 'placeholder'=>'First Name')) }}

    {{ Form::text('lastname', null, array('class'=>'input-block-level', 'placeholder'=>'Last Name')) }}

    {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}

    {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}

    {{ Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Confirm Password')) }}
 
    {{ Form::submit('Register', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}
       @else
       <div style="float: right; margin: 15px 3px 3px 3px; overflow: auto;">
       <!-- start feedwind code --><script type="text/javascript">document.write('<script type="text/javascript" src="' + ('https:' == document.location.protocol ? 'https://' : 'http://') + 'feed.mikle.com/js/rssmikle.js"><\/script>');</script><script type="text/javascript">(function() {var params = {rssmikle_url: "http://feeds.marketwatch.com/marketwatch/stockstowatch?format=xml",rssmikle_frame_width: "300",rssmikle_frame_height: "400",rssmikle_target: "_blank",rssmikle_font: "Arial, Helvetica, sans-serif",rssmikle_font_size: "12",rssmikle_border: "off",responsive: "off",rssmikle_css_url: "",text_align: "left",text_align2: "left",corner: "off",autoscroll: "on",scrolldirection: "up",scrollstep: "3",mcspeed: "5",sort: "New",rssmikle_title: "off",rssmikle_title_sentence: "",rssmikle_title_link: "",rssmikle_title_bgcolor: "#0066FF",rssmikle_title_color: "#FFFFFF",rssmikle_title_bgimage: "",rssmikle_item_bgcolor: "#FFFFFF",rssmikle_item_bgimage: "",rssmikle_item_title_length: "100",rssmikle_item_title_color: "#0066FF",rssmikle_item_border_bottom: "on",rssmikle_item_description: "on",rssmikle_item_description_length: "150",rssmikle_item_description_color: "#000000",rssmikle_item_date: "gl2",rssmikle_timezone: "Etc/GMT",datetime_format: "%b %e, %Y %l:%M:%S %p",rssmikle_item_description_tag: "off",rssmikle_item_description_image_scaling: "off",article_num: "15",rssmikle_item_podcast: "off"};feedwind_show_widget_iframe(params);})();</script><div style="font-size:10px; text-align:center; width:300;"><a href="http://feed.mikle.com/" target="_blank" style="color:#CCCCCC;">RSS Feed Widget</a><!--Please display the above link in your web page according to Terms of Service.--></div><!-- end feedwind code -->
       </div>

        @endif
 </div> 
  </div> 
 
  <!--body container -->
  <div class="container" id="body">
   <h2>Tippify.me?</h2>    
    <p class="text-muted">Tippify.me is a new site dedicated to getting our users together with professionals. Increasing our user’s 
      ability to make smart trades based off tips from experts trading in the stocks users are interested in. By
      using Tippify.me you greatly improve your ability to increase your financial gains by seeing what professionals 
      are investing in.</p>
    <h2>Interested in becoming a Pro?</h2>
    <p class="text-muted">With the Pro account you gain the ability to build tips that help users as well as start building your reputation 
      within the Tippify.me realm. The better your tip the more others will follow your trading tips and the more potential 
      clients and jobs that might present them self’s.</p>
  </div><!-- end main body -->
  
  <!-- footerwrap -->
  <div id="footerwrap">
    <!-- footer -->
    <div class="container" id="footer">
      <p>&copy; Tippify.me {{ date("Y")}}</p>
    </div>
  </div>
  
  </body>
</html>

