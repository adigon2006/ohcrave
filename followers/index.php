<?php include_once '../includes/privateprofile.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once '../meta/meta.php'; ?>
    <title>OHCrave My Followers</title>

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
           <!-- <div class="panel panel-default">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#home" role="tab" data-toggle="tab"><i class="fa fa-picture-o"></i> Photos</a>
                    </li>
                    <li class=""><a href="#profile" role="tab" data-toggle="tab"><i class="fa fa-folder"></i> Albums</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="home">
                        <img src="../images/place1.jpg" alt="image" />
                        <img src="../images/place2.jpg" alt="image" />
                        <img src="../images/food1.jpg" alt="image" />
                    </div>
                    <div class="tab-pane fade" id="profile">
                        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
                    </div>
                    <div class="tab-pane fade" id="dropdown1">
                        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                    </div>
                    <div class="tab-pane fade" id="dropdown2">
                        <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
                    </div>
                </div>
            </div> -->
         
            <?php include_once '../templates/followers.php'; ?>
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
    <script src="../myscript/privateprofile.js">
    </script>
    
</body>
</html>