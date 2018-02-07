<div class="row">
<div class="col-md-6">  
    <!-- <div class="timeline row" data-toggle="gridalicious">
             
    <div class="timeline-block"> -->
        <div class="timeline row" data-toggle="gridalicious">
             
    <div class="timeline-block">
                    <div class="panel panel-default share">
                        <div class="panel-heading panel-heading-gray title">
                         <i class="fa fa-hashtag"></i> <?php echo $thetag; ?>
                        </div>
                        
                       
                    </div>
                </div>
    </div>
    <div id="hashtag">
        
        <?=$allplantrend ?>
    </div>
     <?php 
     // if($totalrows == 0)
//     {
//   echo "";
//     }
//     else if($totalrows > 3)
//     {
//    echo 
//     '<div align="center">
// <button class="load_more btn btn-primary" style="margin-bottom:50px;" id="load_more_button">Load More</button>
// <div class="animation_image" style="display:none;"><img src="../images/ajax-loader.gif"> Loading...</div>
// </div>';

// }
?>
   
    </div>
 
     
    
 <div class="col-md-6 hidden-xs hidden-sm hidden-md"> 
  <div class="panel panel-default userscroll" style="height:250px; scroll-y:inherit; overflow:scroll; overflow-x: hidden;">
                        <div class="panel-heading panel-heading-gray">
                            <a href="#" class="btn btn-primary btn-xs pull-right">Users <i class="fa fa-users"></i></a>
                            <i class="icon-user-1"></i> Latest Users
                        </div>
      <?=$lasttenusers ?>
      
      
  </div>
     
      <!-- <div class="panel panel-default" style="min-height:150px;">
                        <div class="panel-heading panel-heading-gray">
                            <a href="#" class="btn btn-primary btn-xs pull-right">Plans <i class="fa fa-tags"></i></a>
                            <i class="icon-user-1"></i> Trending Plans
                        </div>
      
      
  </div> -->
       <!--Friends -->
                  <?php include_once '../privateprofilefollowers/mylatestfollowers.php'; ?>
                     <div class="panel panel-default hidden-xs hidden-lg hidden-md hidden-sm">
                        <div class="panel-heading panel-heading-gray">
                            <a href="#" class="btn btn-primary btn-xs pull-right">Ads <i class="fa fa-bullhorn"></i></a>
                            <i class="fa fa-bullhorn"></i> Sponsored Ads
                        </div>
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="../images/ad1.jpg" alt="Chania">
    </div>

    <div class="item">
      <img src="../images/ad2.jpg" alt="Chania">
    </div>

    <div class="item">
      <img src="../images/ad3.jpg" alt="Flower">
    </div>

    
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 
                </div>
 </div>
     <!-- <?php //include_once '../ads/temp1.php'; ?> -->
</div>
