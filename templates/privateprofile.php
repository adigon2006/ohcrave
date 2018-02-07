   <div class="row">
                <div class="col-md-6">

                    <!--Friends -->
                    <div class="panel panel-default" id="editthis">
                        <div class="panel-heading panel-heading-gray">
                            <a href="#" class="btn btn-white btn-xs pull-right"><i class="fa fa-pencil" id="edit"> Edit</i></a>
                            <i class="fa fa-info-circle" ></i> About Me
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
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-phone"></i>&nbsp;
                                                Mobile No</span>
                                        </div>
                                        <div class="col-sm-8" id="phoneno2"><?=$phoneno ?></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted">
                                                <i class="fa fa-user"></i>&nbsp;
                                                Username</span>
                                        </div>
                                        <div class="col-sm-8">@<?=$username ?></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted">
                                                <i class="fa fa-user"></i>&nbsp;
                                                Bio</span>
                                        </div>
                                        <div class="col-sm-8" id="bio2"><?=$bio ?></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-map-marker"></i>&nbsp;
                                                Address</span>
                                        </div>
                                        <div class="col-sm-8" id="address2"><?=$address ?></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-tags"></i>&nbsp;
                                               State</span>
                                        </div>
                                        <div class="col-sm-8" id="state2"><?=$state ?></div>
                                    </div>
                                </li>
                                 <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-globe"></i>&nbsp;
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
                                        <div class="col-sm-8" id="zipcode2"><?=$zipcode ?></div>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                        <form method="post" id="updateprofile">
                        <div class="panel-body displaynone" id="profileedit" >
                            <ul class="list-unstyled profile-about">
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-user"></i> First Name</span>
                                        </div>
                                        <div class="col-sm-8"><input type="text" class="form-control" id="firstname"  value="<?=$firstname; ?>"/></div>
                                    </div>
                                </li>
                                 <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-user"></i>&nbsp;Last Name</span>
                                        </div>
                                        <div class="col-sm-8"><input type="text" class="form-control" id="lastname"  value="<?=$lastname; ?>"/></div>
                                    </div>
                                </li>
                                 <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-male"></i>&nbsp;
                                                Gender</span>
                                        </div>
                                        <div class="col-sm-8"><select class="form-control" id="gender">
                                                <option value="">Select Gender</option>    
                                            <option value="Male" <?php if($sex == 'Male'){ echo 'selected';} ?>>Male</option>
                                            <option valoue="Female" <?php if($sex == 'Female'){ echo 'selected';} ?>>Female</option>
                                            </select></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-envelope"></i>&nbsp;Email</span>
                                        </div>
                                        <div class="col-sm-8"><input type="email" class="form-control" id="email"  value="<?=$email ?>"/></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-phone"></i>&nbsp;
                                                Mobile No</span>
                                        </div>
                                        <div class="col-sm-8"><input type="tel" class="form-control" id="mobile"  value="<?=$phoneno; ?>"/></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-user"></i>&nbsp;
                                                Username</span>
                                        </div>
                                        
                                        <div class="col-sm-8">
                                            <div class="col-sm-2"><label class="control-label">@</label></div>  <div class="col-sm-10">
                                                <input type="text" class="form-control" id="username" readonly  value="<?=$username ?>"/>
                                            </div>
                                        </div>
                                        </div>
                                </li>
                                 <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-users"></i> Bio</span>
                                        </div>
                                        <div class="col-sm-8"><textarea style="resize:none;" class="form-control" id="bio"><?=$bio ?></textarea></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-map-marker"></i>&nbsp;
                                                Address</span>
                                        </div>
                                        <div class="col-sm-8"><input type="text" class="form-control" id="address"  value="<?=$address ?>"/></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-tags"></i>&nbsp;
                                               State</span>
                                        </div>
                                        <div class="col-sm-8"><input type="text" class="form-control" id="state"  value="<?=$state ?>"/></div>
                                    </div>
                                </li>
                                 <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-globe"></i>&nbsp;
                                                Country</span>
                                        </div>
                                        <div class="col-sm-8"><input type="text" class="form-control" id="country"  value="<?=$country ?>"/></div>
                                    </div>
                                </li>
                                 <li>
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><i class="fa fa-map-marker"></i>&nbsp;
                                                Zipcode</span>
                                        </div>
                                        <div class="col-sm-8"><input type="text" class="form-control" id="zipcode"  
                                                                     value="<?=$zipcode ?>"/></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                       <div class="col-sm-4"> 
                                           <button class="btn btn-primary">Update Profile</button>
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
