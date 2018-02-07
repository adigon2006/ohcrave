<?php include_once '../includes/resetpassword.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Welcome to OHCrave</title>
<link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/purple.css"/>
    <link rel="stylesheet" href="../css/vegas.css" />
    <?php include_once '../favicon/favicon.php'; ?>
	<link href="../css/jquery.loader.css" rel="stylesheet" />
    <style>
        body {
           padding:0;
           margin:0 auto;
/*		   background-image:url(images/bgimage.jpg);*/
/*		   font-family: 'Arvo', serif;*/
                   font-family: 'Droid Sans', sans-serif;
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
	font: 400 1.9em/125% 'Droid Sans', sans-serif;
	color: #333;
}
#arvo
{

}
		
        .top {
           /* background: #af86b9; */
		   background: #ffffff;
            text-align: center;
            height:134px;
            margin-bottom: 60px;
        }
        a {
            color:#16aea0;
        }
    </style>

</head>
<body>
    <div class="top">
  
        <img src="../images/smallest logo.jpg"/>
    </div>
    <div class="container" style="">
        <div class="row">
		
            <div class="col-md-offset-1 col-md-5  text-center" style="margin-bottom: 30px;">
            <div class="trans">
			<div class="all">
			<p class="lead text-primary"><h2 class="text-primary">OHCrave</h2></p>
                        <p style="font-size:20px;color:#FFFFFF;">Reset your password<br/></p>
				  <br />
         
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
            
            
            
            <div class="col-md-offset-1 col-md-5 text-center">
     
                <div class="panel panel-default">
           <div class="panel-body text-center">
       <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="container-fluid">
            <div class="lock-container">
                
              <div class="panel panel-default text-center">
                  <div class="login">
				  <h3 class="text-primary">Reset Password</h3> 
                    <div class="panel-body">
					<div id="displaymsg">
					
					</div>
					<form id="reset" method="post">
                        <input type="hidden" id="forgottoken" value="<?=$forgottoken ?>"/> 
            <label class="control-label text-center">New Password</label>
                        <input class="form-control" type="password" placeholder="New Password" id="password">
                        <label class="control-label text-center">Confirm New Password</label>
                        <input class="form-control" type="password" id="cpassword" placeholder="Confirm New Password">
                        <button class="btn btn-primary">Reset Password <i class="fa fa-fw fa-unlock-alt"></i></button>

                        <br/><br/><a href="../">Proceed to Login</a>
						
               					
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
    <script src="http://cdnjs.cloudflare.com/ajax/libs/holder/2.4.0/holder.js"></script>
	<script src="../js/jquery.min.js">
	</script>
	<script src="../js/vendor.min.js">
	</script>
	<script src="../js/vendor.js">
	</script>
        <script src="../js/vegas2.js"></script>
	<script src="../js/jquery.loader.js">
	</script>
	<script src="../myscript/resetpassword.js">
	</script>
</body>
</html>