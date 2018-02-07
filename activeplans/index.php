<?php include_once '../includes/activeplans.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once '../meta/meta.php'; ?>
    <title>OHCrave Active Plans</title>   
<link rel="stylesheet" href="css/style.css">
<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="../css/jquery.fileupload.css">
<link rel="stylesheet" href="../css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="../css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="../css/jquery.fileupload-ui-noscript.css"></noscript>    
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
   include_once '../chatwindow/chatwindow.php';
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
         
            <?php include_once '../templates/activeplans.php'; ?>
        </div>

        <div id="kashpointmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Event Photos</h4>
      </div>
      <div class="modal-body">
    <form id="fileupload" action="" method="POST" enctype="multipart/form-data">
        <!-- Redirect browsers with JavaScript disabled to the origin page -->
        <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>       
   <div class="row fileupload-buttonbar">
            <div class="col-md-12">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                    <input type="file" name="files[]" multiple>
                </span>
                <button type="submit" class="btn btn-primary start">
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start upload</span>
                </button>
                <button type="reset" class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel upload</span>
                </button>
               <!--  <button type="button" class="btn btn-danger delete">
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" class="toggle"> -->
                <!-- The global file processing state -->
                <span class="fileupload-process"></span>
            </div>
            <!-- The global progress state -->
            <div class="col-lg-5 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
                <!-- The extended global progress state -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
          
         <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
    </form>  
        
        
          <script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}" /></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <!-- <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                     <i class="glyphicon glyphicon-trash"></i>
                     <span>Delete</span>
                 </button> 
                <input type="checkbox" name="delete" value="1" class="toggle">-->
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
        
        
    </div>

  </div>
</div>
        
        <!-- Footer -->
     <?php include('../footer/footer.php'); ?>

        <!-- // Footer -->
        </div>

    <!-- // Content -->
    
<!-- Vendor Scripts Bundle -->
<script src="../js/vendor.min.js"></script>

    <!-- App Scripts Bundle -->
    <script src="../js/scripts.js"></script>
    
    <script src="../js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script >
$(document).ready(function() {

    var track_click = 0; //track user click on "load more" button, righ now it is 0 click
    
    var total_pages = <?php echo $total_pages; ?>;
    $('#activehomeplans').load("../snippets/getactiveplanbypage.php", {'page':track_click}, function() {track_click++;

$('.editbutton').each(function(index, element) {
 $('.editbutton:eq('+index+')').click(function(e) {
e.preventDefault();  
//planid = $('.planids:eq('+index+')').val();
plancommentid = $('.thecommentid:eq('+index+')').val();
  
$.get('../snippets/getplancommentbyid.php',{'plancommentid':plancommentid},function(data){
com = data;
$('.theplancomment:eq('+index+')').html("<input type='hidden' class='indexval' value='"+index+"' /><input type='text' class='updatevalue' value='"+com+"'/>  <a class='editdeletebutton updatecomment'><i class='fa fa-edit'></i>Update</a>");

$('.updatecomment').each(function(index, element) {
$('.updatecomment:eq('+index+')').click(function(e) {
theindexval = $('.indexval:eq('+index+')').val();
thecommentupdate = $('.updatevalue:eq('+index+')').val(); 
$('.theplancomment:eq('+theindexval+')').html(thecommentupdate);

$.post('../snippets/updateplancomment.php',{'plancomment':thecommentupdate,'plancommentid':plancommentid},function(d){
  
});  
});
    
});


});

 });
});

// end 


//add a comment
$('.addplanimage').each(function(index, element) {
 $(".addplanimage:eq("+index+")").click(function(e) {
    e.preventDefault();
 $('.addplanimage').attr("data-toggle","modal");
$('.addplanimage').attr("data-target","#kashpointmodal");  
 planid = $('.planid:eq('+index+')').val();
 $.post('../snippets/initializeplanid.php',{'planid':planid},function(){});   
});
    
}); 


//expire a plan and remove relational information
$('.expireplan').each(function(index, element) {
        
$('.expireplan:eq('+index+')').click(function(e) {
planid = $('.planids:eq('+index+')').val();
//window.scrollTo(0,700);
//window.showModalDialog("ghghhhj hjbhb");

$(this).html("Expiring Plan...");   


$.post('../snippets/expireplan.php',{'planid':planid},function(data){

$.get('../snippets/getMyActivePlanUpdate.php',{},function(d){   
$('#activehomeplans').html(d); 
location = '../activeplans/'; 

      $('.addplanimage').each(function(index, element) {
 $(".addplanimage:eq("+index+")").click(function(e) {
    e.preventDefault();
 $('.addplanimage').attr("data-toggle","modal");
$('.addplanimage').attr("data-target","#kashpointmodal");  
 planid = $('.planid:eq('+index+')').val();
 $.post('../snippets/initializeplanid.php',{'planid':planid},function(){});   
});



    
}); 

// end of plan image


});
    
});

});  
  
});

    }); //initial data to load

    $(".load_more").click(function (e) { //user clicks on button
    
        $(this).hide(); //hide load more button on click
        $('.animation_image').show(); //show loading image

        if(track_click <= total_pages) //make sure user clicks are still less than total pages
        {
            //post page number and load returned data into result element
            $.post('../snippets/getactiveplanbypage.php',{'page': track_click}, function(data) {
            
                $(".load_more").show(); //bring back load more button
                
                $("#activehomeplans").append(data); //append data received from server
$('.editbutton').each(function(index, element) {
 $('.editbutton:eq('+index+')').click(function(e) {
e.preventDefault();  
//planid = $('.planids:eq('+index+')').val();
plancommentid = $('.thecommentid:eq('+index+')').val();
  
$.get('../snippets/getplancommentbyid.php',{'plancommentid':plancommentid},function(data){
com = data;
$('.theplancomment:eq('+index+')').html("<input type='hidden' class='indexval' value='"+index+"' /><input type='text' class='updatevalue' value='"+com+"'/>  <a class='editdeletebutton updatecomment'><i class='fa fa-edit'></i>Update</a>");

$('.updatecomment').each(function(index, element) {
$('.updatecomment:eq('+index+')').click(function(e) {
theindexval = $('.indexval:eq('+index+')').val();
thecommentupdate = $('.updatevalue:eq('+index+')').val(); 
$('.theplancomment:eq('+theindexval+')').html(thecommentupdate);

$.post('../snippets/updateplancomment.php',{'plancomment':thecommentupdate,'plancommentid':plancommentid},function(d){
  
});  
});
    
});


});

 });
});

// end 
              $('.addplanimage').each(function(index, element) {
 $(".addplanimage:eq("+index+")").click(function(e) {
    e.preventDefault();
 $('.addplanimage').attr("data-toggle","modal");
$('.addplanimage').attr("data-target","#kashpointmodal");  
 planid = $('.planid:eq('+index+')').val();
 $.post('../snippets/initializeplanid.php',{'planid':planid},function(){});   
});
    
}); 

              //expire a plan and remove relational information
$('.expireplan').each(function(index, element) {
        
$('.expireplan:eq('+index+')').click(function(e) {
planid = $('.planids:eq('+index+')').val();
//window.scrollTo(0,700);
//window.showModalDialog("ghghhhj hjbhb");

$(this).html("Expiring Plan...");   


$.post('../snippets/expireplan.php',{'planid':planid},function(data){

$.get('../snippets/getMyActivePlanUpdate.php',{},function(d){   
$('#activehomeplans').html(d); 
location = '../activeplans/'; 
// start of plan image
        $('.addplanimage').each(function(index, element) {
 $(".addplanimage:eq("+index+")").click(function(e) {
    e.preventDefault();
 $('.addplanimage').attr("data-toggle","modal");
$('.addplanimage').attr("data-target","#kashpointmodal");  
 planid = $('.planid:eq('+index+')').val();
 $.post('../snippets/initializeplanid.php',{'planid':planid},function(){});   
});
    
}); 

// end of plan image









});
    
});

});  
  
});


                 
                //scroll page to button element
                $("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
                
                //hide loading image
                $('.animation_image').hide(); //hide loading image once data is received
    
                track_click++; //user click increment on load button
            
            }).fail(function(xhr, ajaxOptions, thrownError) { 
                alert(thrownError); //alert any HTTP error
                $(".load_more").show(); //bring back load more button
                $('.animation_image').hide(); //hide loading image once data is received
            });
            
            
            if(track_click >= total_pages-1)
            {
                //reached end of the page yet? disable load button
                $(".load_more").attr("disabled", "disabled");
                $(".load_more").css("display","none");
            }
         }
          
        });
});
</script>
    
    <script src="../myscript/addplanimage.js"></script>
<!-- For use with plan images -->
   

    <script src="../js/jquery.loader.js">
	</script>
    <script src="../myscript/privateprofile.js">
    </script>
 
    
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="../js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="../js/tmp1.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="../js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="../js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<!-- blueimp Gallery script -->
 <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="../js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin --> 
    <script src="../js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="../js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="../js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="../js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="../js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="../js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="../js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="../js/main.js"></script>

<script src="../myscript/activeplan.js"></script>




</body>
</html>