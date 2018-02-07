<?php include_once '../includes/hashtag.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once '../meta/meta.php'; ?>
    <title><?=$thetag; ?></title>

    <!-- App Styling Bundle -->
    <!-- <link href="../css/default.min.css" rel="stylesheet"> -->
<?php include_once '../style/style.php'; ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <?php include_once '../favicon/favicon.php'; ?>
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-main navbar-primary navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" data-toggle="sidebar-menu" id="toggle-sidebar-menu" class="visible-xs"><i class="fa fa-ellipsis-v"></i></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a data-toggle="sidebar-chat" class="btn btn-link navbar-btn visible-xs"><i class="fa fa-search"></i></a>
                 <?php include_once('../logo/logo.php'); ?>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="main-nav">
                <?php include_once('../menunav/menu.php'); ?>
                

                    <!-- User -->
                    <?php include_once '../menuright/menuright.php'; ?>
                
            </div>

            <!-- /.navbar-collapse -->
            </div>
    </div>
    <div class="sidebar left hidden-xs">
        <div data-scrollable>
            
            <?php include_once '../profilenav/leftnav.php'; ?>
        </div>
    </div>
   <?php include_once '../searchbox/search.php'; ?>
     <?php
   include_once '../chatwindow/chatwindow.php';
   ?>
    <div class="chat-window-container"></div>
    <div id="content">
        <nav class="navbar navbar-subnav navbar-static-top" role="navigation">
            <div class="container-fluid">

                <!-- Brand and toggle get grouped for better mobile display -->
                <?php
   include_once '../naviconthird/navicon.php';
   ?>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <?php include_once '../mainmenu/mainmenu.php'; ?>

                <!-- /.navbar-collapse -->
                </div>
        </nav>
        <div class="container-fluid">
           
         
            <?php include_once '../templates/hashtag.php'; ?>
        </div>

        <!-- Footer -->
     <?php include('../footer/footer.php'); ?>

        <!-- // Footer -->
        </div>

    <!-- // Content -->
    
<!-- Vendor Scripts Bundle --><script src="../js/vendor.min.js"></script>

    <!-- App Scripts Bundle -->
    <script src="../js/scripts.js"></script>
    
    <script src="../js/jquery.loader.js">
	</script>

      <script src="../js/jquery.lazyload.js"></script>
    <script>
$(document).ready(function(e) {
 $(".lazyload").lazyload({
    
});    
});
</script>
    <script src="../myscript/home.js">
    </script>
   
    

    
</body>
</html>