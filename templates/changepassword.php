   <div class="row">
                <div class="col-md-6">

                    <!--Friends -->
                    <div class="panel panel-default" id="editthis">
                        <div class="panel-heading panel-heading-gray">
                            <a href="#" class="btn btn-white btn-xs pull-right"><!--<i class="fa fa-pencil" id="edit"></i>--></a>
                            <i class="fa fa-edit" ></i> Change Password
                        </div>
                        <div id="displaymsg">
                                    </div>
                    
                        <form method="post" id="changepass">
                        <div class="panel-body" id="changepassword" >
                            <ul class="list-unstyled profile-about">
                               
                                 <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-lock"></i>&nbsp;
                                                Old Password</span>
                                        </div>
                                        <div class="col-sm-8"><input type="password" class="form-control" id="oldpassword"  
                                                                     value=""/></div>
                                    </div>
                                </li>
                                 <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-lock"></i>&nbsp;
                                                Password</span>
                                        </div>
                                        <div class="col-sm-8"><input type="password" class="form-control" id="password"  
                                                                     value=""/></div>
                                    </div>
                                </li>
                                 <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-lock"></i>&nbsp;
                                                Confirm Password</span>
                                        </div>
                                        <div class="col-sm-8"><input type="password" class="form-control" id="cpassword"  
                                                                     value=""/></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                       <div class="col-sm-4"> 
                                           <button class="btn btn-primary">Change Password</button>
                                       </div>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                        </form>
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
