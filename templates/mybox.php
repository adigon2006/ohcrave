<style type="text/css">
.likelovecrave
{
display: none;    
}
</style>
<div class="row">
<div class="col-md-6">  
    <div class="timeline row" data-toggle="gridalicious">
             
    <div class="timeline-block">
                    <div class="panel panel-default share">
                        <div class="panel-heading panel-heading-gray title">
                         <i class="fa fa-inbox"></i> My Box
                        </div>
                        
                       
                    </div>
                </div>
    </div>
    <div id="mybox">
        
        <?//=$mybox ?>
    </div>
    
      <?php if($totalrows == 0)
    {
  echo "";
    }
    else if($totalrows > 2)
    {
   echo 
    '<div align="center">
<button class="load_more btn btn-primary" style="margin-bottom:50px;" id="load_more_button">Load More</button>
<div class="animation_image" style="display:none;"><img src="../images/ajax-loader.gif"> Loading...</div>
</div>';

}
?>
    </div>
 
     
    
 <!-- <div class="col-md-6"> 
  <div class="panel panel-default">
                        <div class="panel-heading panel-heading-gray">
                            <a href="#" class="btn btn-primary btn-xs pull-right">Add <i class="fa fa-plus"></i></a>
                            <i class="icon-user-1"></i> Trending Plans
                        </div>
      
  </div>
 </div> -->

<!-- try amd display the screenshot of the image dis -->



<!-- end of photo checking code  -->

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
<!-- end the pf the plan image display -->
</div>

<script src="../myscript/showsingleplanimage.js"></script>

