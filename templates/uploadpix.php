     <div class="row">
                <div class="col-md-6">

                    <!--Friends -->
                    <div class="panel panel-default" id="editthis">
                        <div class="panel-heading panel-heading-gray">
                            <!-- <a href="#" class="btn btn-white btn-xs pull-right"><i class="fa fa-pencil" id="edit"></i></a> -->
                            <i class="fa fa-photo" ></i> Upload Profile Picture
                        </div>
                        <div id="displaymsg" >
                                    </div>
                      
                       <!--  <form method="post" id="pixupload"> -->
                        <div class="panel-body" id="crop-avatar" >
                            <ul class="list-unstyled profile-about">
                               <!-- <li>
                                    <div class="row">
                                       
                                 <div class="col-sm-12"><input type="file" class="form-control" id="firstname"  value=""/></div>
                                    </div>
                                </li> -->
                           
                                <li>
                                    <div class="container-fluid" id="crop-avatar">
                                    
                                    <div class="row">
                                       <div class="col-sm-4 avatar-view" align="center"> 
                                           <!-- <img src="../images/profilepix/noprofile.jpg" class="" /> -->
                                           <?=$myprofilepix ?>
                                          <!-- <button class="btn btn-primary ">Upload Profile Pix</button> -->
                                       Change Profile Pix
                                       </div>
                                    </div>
                                    
                                         <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form class="avatar-form" action="../snippets/crop.php" enctype="multipart/form-data" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="avatar-modal-label">Change Profile Picture</h4>
            </div>
            <div class="modal-body">
              <div class="avatar-body">

                <!-- Upload image and data -->
                <div class="avatar-upload">
                  <input type="hidden" class="avatar-src" name="avatar_src">
                  <input type="hidden" class="avatar-data" name="avatar_data">
                  <label for="avatarInput">Change Profile Picture</label>
                  <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                </div>

                <!-- Crop and preview -->
                <div class="row">
                  <div class="col-md-9">
                    <div class="avatar-wrapper"></div>
                  </div>
                  <div class="col-md-3">
                    <div class="avatar-preview preview-lg"></div>
                    <div class="avatar-preview preview-md"></div>
                    <div class="avatar-preview preview-sm"></div>
                  </div>
                </div>

                <div class="row avatar-btns">
                  <div class="col-md-9">
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-90" title="Rotate -90 degrees">Rotate Left</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-15">-15deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-30">-30deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45">-45deg</button>
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="90" title="Rotate 90 degrees">Rotate Right</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="15">15deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="30">30deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="45">45deg</button>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-block avatar-save">Done</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
          </form>
        </div>
      </div>
    </div>
                     <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
   </div>
                                    
                                    
                                </li>
                                
                            </ul>
                        </div>
                            
                     <!--   </form>--> 
                     
                     
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
