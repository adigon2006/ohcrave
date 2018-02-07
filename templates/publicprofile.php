<?php
require_once '../includes/Mydbhandler.php';
$publicprofilehandler = new Mydbhandler();
if(isset($_GET[$profileurl]))
{
 $nsvp = $_GET[$profileurl];
// $publicprofilehandler->redirect_to("http://google.com");
 //echo $publicprofilehandler->simple_decrypt($nsvp,"");
$publicprofilehandler->MyPublicProfileDetails($nsvp);   
}

?>
<div class="row">
                <div class="col-md-6">

                    <div class="panel panel-default profile-user-box">
                        <div class="avatar">
                            <?=$fullimage ?>
                            <!-- <img src="../images/people/110/guy-5.jpg" alt="" class="img-circle" /> -->
                            <h3><?=$firstname.' '.$lastname ?>  <?php if($celebstatus == 1)
                    {

echo '<i  class="celeb fa fa-check-circle"></i>';
                }
                else if($celeb == 0)
                {
echo '';
                }

                ?></h3>
                            <input type="hidden" id="tofollow" value="<?=$nsvp//publicprofilehandler->simple_decrypt($nsvp,"") ?>" />
                             <input type="hidden" id="tounfollow" value="<?=$nsvp//publicprofilehandler->simple_decrypt($nsvp,"") ?>" />
                            <div id="followerdiv">  <?=$ffbuttons ?> 
 
                            </div>
                           
                            <!--<a href="#" class="btn btn-success">Following <i class="fa fa-check-circle fa-fw"></i></a>
                            <a href="#" class="btn btn-default unfollow">Follow <i class="fa fa-share"></i></a>
                            <a href="#" class="btn btn-default follow">Unfollow <i class="fa fa-share"></i></a>-->
                        </div>
                        <div class="profile-icons">
                            <span class="followerno"><i class="fa fa-users text text-primary"></i> <?=$ffno ?></> <!-- <span><i class="fa fa-photo"></i> 43</span> <span><i class="fa fa-video-camera"></i> 3 </span> -->
                        </div>
                       <!-- <p>Hi! I'm Adrian the Senior UI Designer at
                            <strong>MOSAICPRO</strong>. We hope you enjoy the design and quality of Social.</p> -->
                    </div>
                    <!--Friends -->
                    <div class="panel panel-default" id="editthis">
                        <div class="panel-heading panel-heading-gray">
               
                            <i class="fa fa-info-circle" ></i> About <?=$firstname.' '.$lastname ?>
                        </div>
                        <div id="displaymsg">
                                    </div>
                        <div class="panel-body" id="profile">
                            <ul class="list-unstyled profile-about">
                                 <li>
                                    <div class="row">
                                        <div class="col-sm-4" ><span class="text-muted"><i class="fa fa-male"></i>&nbsp;
                                                Gender</span>
                                        </div>
                                        <div class="col-sm-8" id="gender2"><?=$sex; ?></div>
                                    </div>
                                </li>
                              <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-envelope"></i>&nbsp;Email</span>
                                        </div>
                                        <div class="col-sm-8" id="email2"><?=$email; ?></div>
                                    </div>
                                </li>
                               <!-- <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-phone"></i>&nbsp;
                                                Mobile No</span>
                                        </div>
                                        <div class="col-sm-8" id="phoneno2"><?=$phoneno ?></div>
                                    </div>
                                </li> -->
                               <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted">
                                                <i class="fa fa-user"></i>&nbsp;
                                                Username</span>
                                        </div>
                                        <div class="col-sm-8">@ <?=$username ?></div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted">
                                                <i class="fa fa-users"></i>&nbsp;
                                                Bio</span>
                                        </div>
                                        <div class="col-sm-8" id="bio2"><?=$bio ?></div>
                                    </div>
                                </li>
                                <!--   <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-map-marker"></i>&nbsp;
                                                Address</span>
                                        </div>
                                        <div class="col-sm-8" id="address2"><?=$address ?></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-map-marker"></i>&nbsp;
                                               State</span>
                                        </div>
                                        <div class="col-sm-8" id="state2"><?=$state ?></div>
                                    </div>
                                </li>
                                 <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-map-marker"></i>&nbsp;
                                                Country</span>
                                        </div>
                                        <div class="col-sm-8" id="country2"><?=$country ?></div>
                                    </div>
                                </li>
                                 <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-map-marker"></i>&nbsp;
                                                Zipcode</span>
                                        </div>
                                        <div class="col-sm-8" id="zipcode2"><?//=$zipcode ?></div>
                                    </div>
                                </li> -->
                                
                            </ul>
                        </div>
                     
                    </div>
                </div>
         <div class="col-md-6">

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


