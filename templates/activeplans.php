<div class="row">
<div class="col-md-6">  
    <div class="timeline row" data-toggle="gridalicious">
             
    <div class="timeline-block">
                    <div class="panel panel-default share">
                        <div class="panel-heading panel-heading-gray title">
                         <i class="fa fa-camera"></i> My Active Events
                        </div>
                        
                       
                    </div>
                </div>
    </div>
    <div id="activehomeplans">
        
        <?//=$activeplans ?>
    </div>
    
       <?php if($totalrows == 0)
    {
  echo "";
    }
    else if($totalrows > 3)
    {
   echo 
    '<div align="center">
<button class="load_more btn btn-primary" style="margin-bottom:50px;" id="load_more_button">Load More</button>
<div class="animation_image" style="display:none;"><img src="../images/ajax-loader.gif"> Loading...</div>
</div>';

}
?>
    </div>
 
     
    
 <div class="col-md-6 hidden-xs"> 
  <div class="panel panel-default userscroll" style="max-height:350px; scroll-y:inherit; overflow:scroll; overflow-x: hidden;">
                        <div class="panel-heading panel-heading-gray">
                            <a href="#" class="btn btn-primary btn-xs pull-right"> Notifications<i class="fa fa-bell"></i></a>
                            <i class="icon-user-1"></i> Latest Notifications
                        </div>
                 <?=$latestnotification ?>       
      
  </div>
 </div>
 <!--  -->
 <div id="planimagemodal" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">    
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"></h4>
</div>

<div class="modal-body">
    <div class="row">
<div class="col-md-7">
<div class="image-container"></div>
<!-- <div class="like-crave-love"></div> -->
    </div>
<div class="col-md-5 comment-section"></div>
    </div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" 
data-dismiss="modal">Close <i class="fa fa-close"></i></button>

</div>
</div>
</div>
</div>
<!--  -->
</div>


