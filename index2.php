<?php  include_once 'snippets/login.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="crave, order pictures, follows friends, cravers">
    <meta name="author" content="">
    <title>Welcome to OHCrave</title>
<link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/purple.css"/>
    <link rel="stylesheet" href="css/vegas.css" />
    <?php include_once 'favicon/favicon2.php'; ?>
	<link href="css/jquery.loader.css" rel="stylesheet" />
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/ap-scroll-top.css" type="text/css" media="all" />

    <style>
        body {
           padding:0;
           margin:0 auto;
/*		   background-image:url(images/bgimage.jpg);*/
/*		   font-family: 'Arvo', serif;*/
                   font-family: 'Lato';
        }
		#registration{            
            -webkit-transition-property: top, bottom;
            -webkit-transition-duration: 4.0s;
			-webkit-transition-property: top, bottom;
            -webkit-transition-duration: 4.0s;
			animation-name:fadeIn;
			-moz-transition: left 1.5s ease-in-out;
            }
			#registration:hover {
            top:100px;
            bottom:100px;
            }
		
		h3 {
	font: 400 1.9em/125% 'Lato';
	color: #333;
}
#clickhere:hover
{
opacity: 0.8;
}
#arvo
{

}
		
        .top {
           /* background: #af86b9; */
		   background: #000;
            text-align: center;
            height:134px;
            margin-bottom: 60px;
        }
        a {
            color:#16aea0;
        }
        .coloredLine {
    height: 1px;
    margin: auto;
    width: 150px;
    background: #FF6863;
    margin-top: 20px;
}
.servicesList .number {
    position: absolute;
    top: 10px;
    left: 0px;
    font-size: 20px;
    font-weight: 700;
    width: 50px;
    height: 50px;
    line-height: 50px;
    text-align: center;
}
.purple {
    background: #774e9c !important;
    color:#ffffff;
}
.red
{
background: #B92319 !important;
    color:#ffffff;

}
.green
{
background: #148228 !important;
    color:#ffffff;

}
 .blue
{
background: #F4C949 !important;
    color:#ffffff;

}
.margin-bottom
{
margin-bottom: 25px;  
}
.animatefromleft
{
left:600px; 
}

.animatefromright
{
left:-800px; 
}
    </style>

</head>
<body>
    <div class="top trans">
  
        <img src="images/newlogo.png"/>
    </div>
   
    <div class="container" style="">
        <div class="row">
		
            <div class="col-md-offset-1 col-md-5 animatefromright text-center" style="margin-bottom: 30px;">
            <div class="trans">
			<div class="all">
			<p class="lead text-primary"><h2 class="text-primary">OHCrave</h2></p>
                        <p style="font-size:18px;color:#FFFFFF;">Keep an eye on your friends' upcoming events.....</p>
				  <br />
          <h2 style="color:#FFFFFF;"><img src="images/newlogo.png"/>Crave Now</h2>
          <h1 style="color:#FFFFFF;">&</h1>
         <h1 style="color:#FFFFFF; font-size:18px;">
         Get photos of upcoming event.....</h1>
          <!--<h1 style="color:#FFFFFF;">Crave it Now !!!</h1><br/> -->
				  <!-- <p style="font-size:14px;color:#FFFFFF; padding-bottom:15px;" class="text-center" >
				  Follow us on<br />
				   <button class="btn btn-default btn-icon-stacked" ><i class="fa fa-fw fa-facebook"></i> <span><br/>Facebook</span>
                        </button>
			   <button class="btn btn-primary btn-icon-stacked"><i class="fa fa-fw fa-twitter"></i> <span><br/>Twitter</span>
                        </button>
					<button class="btn btn-inverse btn-icon-stacked"><i class="fa fa-fw fa-instagram"></i> <span><br/>Instagram</span>
                        </button>	
				 <!-- <i id="facebook" title="Facebook" style="" class="fa fa-fw fa-facebook"></i>
				  <i id="twitter" title="Twitter" style="" class="fa fa-fw fa-twitter"></i>
				  <i id="instagram" title="Instagram" style="" class="fa fa-fw fa-instagram"></i> -->
			<!-- 	  </p> -->
			</div>
			</div>
			
			   
                        
            </div>
            
            
            
            <div class="col-md-offset-1 col-md-5 text-center animatefromleft">
     <ul class="nav nav-pills">
    <li class="active"><a data-toggle="tab" href="#home">Access Account</a></li>
    <li><a data-toggle="tab" href="#menu1">Register</a></li>
  </ul> 
                <div class="panel panel-default">
           <div class="panel-body text-center">
       <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="container-fluid">
            <div class="lock-container">
                
              <div class="panel panel-default text-center">
                  <div class="login">
				  <h3 class="text-primary">Account Access</h3> 
                    <div class="panel-body">
					<div id="displaymsg">
					
					</div>
					<form id="login" method="post">
                        <input class="form-control" type="text" placeholder="Username" id="username">
                        <input class="form-control" type="password" id="password" placeholder="Enter Password">
                        <button class="btn btn-primary">Login <i class="fa fa-fw fa-unlock-alt"></i></button>
						
               					<a href="#" class="forgot-password">Forgot password?</a>
</form>               
			   </div>
					</div>
					<div class="forgotpass" style="display:none;">
					<h3 class="text-primary">Forgot Password</h3> 
          <div id="displaymsg3">
          
          </div>
					  <div class="panel-body">

					<form id="forgot">
					<div class="form-group ">
					<input class="form-control" type="email" id="emailretrieve" placeholder="Email">
					<div>
					 <button class="btn btn-primary">Reset Password<i class="fa fa-fw fa-key"></i></button>
					 <a href="#" class="backlogin">Back to Login</a>
					</form>
					</div>
					</div>
               
			   </div>
			   
			   
					
        </div>
    </div>
                    
                    
                    </div>
                </div>
    </div>         
           
   <div id="menu1" class="tab-pane fade">
       <div class="container-fluid">
            <div class="lock-container">
                
              <div class="panel panel-default text-center">
			  <div id="registration">
                  <h3 class="text-primary">Register</h3> 
                    <div class="panel-body">
					<div id="displaymsg2">
					
					</div>
					<form id="register">
                        <input class="form-control" type="text" placeholder="First Name" id="firstname">
                        <input class="form-control" type="text" placeholder="Last Name" id="lastname">
                       <input class="form-control" type="email" placeholder="Email" id="email">
                        <input class="form-control" type="text" placeholder="Username" id="username2">
                        <input class="form-control" type="password" placeholder="Enter Password" id="password2">
						 <input class="form-control" type="password" placeholder="Confirm Password" id="cpassword">
                        <button class="btn btn-primary">Register <i class="fa fa-fw fa-edit"></i></button>
                    </form>
					</div>
					</div>
					
					
					
					
               </div>
        </div>
    </div>
   </div>        
       

            </div>
        </div>






    </div>
  </div>
</div>
</div>
   <div class="container-fluid" style="background-color:#FFFFFF;" >
<div class="row">
<div class="col-md-12">
<h3 align="center">Next Level Event Discovery</h3>
<div class="coloredLine"></div>
<br/>
<br/>
</div>
</div>
</div>

<div class="container-fluid" style="background-color:#FFFFFF;">
<div class="row" style="margin-left:50px;margin-bottom:50px; margin-right:50px;">
<div class="col-md-8 col-sm-12 col-xs-12 slide" style="">
<img src="images/desktop.png" width="100%">
</div>
<div class="col-md-4 col-sm-12 col-xs-12 margin-bottom slide-right servicesList" style="min-height:50px;">
  <div>
 <span class="number purple">1</span>
 <h3 style="margin-left:40px; ">Post Next Event</h3>
 </div>
 <br/><br/>
 <p style="font-size:20px; font-style:italic; text-align:left;">Post hint on your next event & get friendly suggestions on how to better the event.
E.g: Feel like cooking Oha soup later tonight... <br/>P.S: If you change your mind about an event you posted; click 'expire event'. No need for apologies.</p>
</div>

</div>
</div>
   <div class="container-fluid" style="background-color:#F0F0F0;" >
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<h3 align="center">Discover Next Events</h3>
<div class="coloredLine"></div>
<br/>
<br/>
<br/>
</div>
</div>
</div>

<div class="container-fluid" style="background-color:#F0F0F0;">
<div class="row" style="margin-left:50px; margin-right:50px;">

<div class="col-md-4 col-sm-12 col-xs-12 margin-bottom slide-left servicesList" style="min-height:50px;">
 <span class="number red">2</span>
 <h3 style="margin-left:40px; ">Discover Events</h3>
 <br/><br/>
 <p style="font-size:20px; font-style:italic; text-align:left;">Discover upcoming events in your friends' life & click <i>'crave'</i> to choose which fun events you want to keep an eye on"</p>
</div>
<div class="col-md-8 col-sm-12 col-xs-12" style="">
<img src="images/crave.png" width="100%">
</div>
</div>
</div>


   <div class="container-fluid" style="background-color:#FFFFFF;" >
<div class="row">
<div class="col-md-12">
<h3 align="center">Share Photos of Events</h3>
<div class="coloredLine"></div>
<br/>
<br/>
<br/>
</div>
</div>
</div>

<div class="container-fluid" style="background-color:#FFFFFF;">
<div class="row" style="margin-left:50px; margin-right:50px;">
<div class="col-md-8 col-sm-12 col-xs-12" style="">
<img src="images/uploading.png" width="100%">
</div>
<div class="col-md-4 col-sm-12 col-xs-12 margin-bottom slide-right servicesList" style="min-height:50px;">
 <span class="number green">3</span>
 <h3 style="margin-left:40px; ">Share Event Photos</h3>
 <br/><br/>
 <p style="font-size:18px; font-style:italic; text-align:left;">Ohcrave helps you share event photos only with friends who 'craved' to see the photos.</p>
</div>

</div>
</div>
   <div class="container-fluid" style="background-color:#F0F0F0;" >
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12" id="getplanimage">
<h3 align="center">Get Event Photos</h3>
<div class="coloredLine"></div>
<br/>
<br/>
<br/>
</div>
</div>
</div>

<div class="container-fluid" style="background-color:#F0F0F0;">
<div class="row" style="margin-left:50px; margin-bottom:40px; margin-right:50px;">

<div class="col-md-4 col-sm-12 col-xs-12 margin-bottom servicesList slide-left" style="min-height:50px;">
 <span class="number blue">4</span>
 <h3 style="margin-left:40px; ">Check Box </h3>
 <br/><br/>
 <p style="font-size:18px; font-style:italic; text-align:left;">Receive live photos from events you craved for. The photos are sent directly to your box.</p>
</div>
<div class="col-md-8 col-sm-12 col-xs-12 " style="">
<img src="images/upload.png" width="100%">
</div>
<div align="center" class="col-md-12 col-sm-12 col-xs-12">
<a href="#home" id="clickhere" style="color:#ffffff; font-size:18px;padding:20px 40px; border-radius:3px; text-decoration:none; background-color:#014784;">Get Started</a>
</div>
</div>
</div>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/holder/2.4.0/holder.js"></script>
	<script src="js/jquery.min.js">
	</script>
	<script src="js/vendor.min.js">
	</script>
	<script src="js/vendor.js">
	</script>
   
    <script type="text/javascript">
$(document).ready(function() {
 $(".animatefromleft").animate({
            left: '0px',
            display:'inline'
        },1500);

 $(".animatefromright").animate({
            left: '0px',
            display:'inline'
        },1500);
});
    </script>
    <script src="js/ap-scroll-top.js"></script>
    <script type="text/javascript">
            // Setup plugin with default settings
            $(document).ready(function() {

                $.apScrollTop({
                    'onInit': function(evt) {
                        console.log('apScrollTop: init');
                    }
                });

                // Add event listeners
                $.apScrollTop().on('apstInit', function(evt) {
                    console.log('apScrollTop: init');
                });

                $.apScrollTop().on('apstToggle', function(evt, details) {
                    console.log('apScrollTop: toggle / is visible: ' + details.visible);
                });

                $.apScrollTop().on('apstCssClassesUpdated', function(evt) {
                    console.log('apScrollTop: cssClassesUpdated');
                });

                $.apScrollTop().on('apstPositionUpdated', function(evt) {
                    console.log('apScrollTop: positionUpdated');
                });

                $.apScrollTop().on('apstEnabled', function(evt) {
                    console.log('apScrollTop: enabled');
                });

                $.apScrollTop().on('apstDisabled', function(evt) {
                    console.log('apScrollTop: disabled');
                });

                $.apScrollTop().on('apstBeforeScrollTo', function(evt, details) {
                    console.log('apScrollTop: beforeScrollTo / position: ' + details.position + ', speed: ' + details.speed);

                    // You can return a single number here, which means that to this position
                    // browser window scolls to
                    /*
                    return 100;
                    */

                    // .. or you can return an object, containing position and speed:
                    /*
                    return {
                        position: 100,
                        speed: 100
                    };
                    */

                    // .. or do not return anything, so the default values are used to scroll
                });

                $.apScrollTop().on('apstScrolledTo', function(evt, details) {
                    console.log('apScrollTop: scrolledTo / position: ' + details.position);
                });

                $.apScrollTop().on('apstDestroy', function(evt, details) {
                    console.log('apScrollTop: destroy');
                });

            });


            // Add change events for options
            $('#option-enabled').on('change', function() {
                var enabled = $(this).is(':checked');
                $.apScrollTop('option', 'enabled', enabled);
            });

            $('#option-visibility-trigger').on('change', function() {
                var value = $(this).val();
                if (value == 'custom-function') {
                    $.apScrollTop('option', 'visibilityTrigger', function(currentYPos) {
                        var imagePosition = $('#image-for-custom-function').offset();
                        return (currentYPos > imagePosition.top);
                    });
                }
                else {
                    $.apScrollTop('option', 'visibilityTrigger', parseInt(value));
                }
            });

            $('#option-visibility-fade-speed').on('change', function() {
                var value = parseInt($(this).val());
                $.apScrollTop('option', 'visibilityFadeSpeed', value);
            });

            $('#option-scroll-speed').on('change', function() {
                var value = parseInt($(this).val());
                $.apScrollTop('option', 'scrollSpeed', value);
            });

            $('#option-position').on('change', function() {
                var value = $(this).val();
                $.apScrollTop('option', 'position', value);
            });
    </script><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
        <script src="js/vegas.js"></script>

      <script src="js/jquery.easing.js"></script>
      <script src="js/jquery.fadethis.min.js"></script>


<script>
      $(document).ready(function() {
        $(window).fadeThis({
          speed: 1000,
        });
      });
    </script>
	<script src="js/jquery.loader.js">
	</script>
	<script src="js/mainindex.js">
	</script>
</body>
</html>