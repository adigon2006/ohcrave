<?php include_once '../includes/home.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once '../meta/meta.php'; ?>
    <title>OHCrave Home</title>

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
           
         
            <?php include_once '../templates/home.php'; ?>
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
   
    

    <script>
    $(document).ready(function() {

    var track_click = 0; //track user click on "load more" button, righ now it is 0 click
    
    var total_pages = <?php echo $total_pages; ?>;
    $('#activehomeplans').load("../snippets/gethomeplanbypage.php", {'page':track_click}, function() {track_click++;
// delete a comment
// delete a comment 
$('.deletebutton').each(function(index, element) {
$('.deletebutton:eq('+index+')').click(function(e) {
e.preventDefault();
plancommentid = $('.thecommentid:eq('+index+')').val();
planid = $('.planids:eq('+index+')').val();
$(this).parent().parent().parent().parent().remove();

$.post('../snippets/removeacomment.php',{'plancommentid':plancommentid},function(){
//$('.countcomments:eq('+index+')').html(planid);
// $.get('../snippets/getcommentscount.php',{'planid':planid},function(data){$('.countcomments:eq('+index+')').html(data);});
    
});

});    
});



// edit a comment 
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



//add a comment

$('.addcomment').each(function(index, element) {
$('.addcomment:eq('+index+')').click(function(e) {
e.preventDefault(); 
plancomment = $('.plancomment:eq('+index+')').val();
planid = $('.planids:eq('+index+')').val();
//$('.comments:eq('+index+')').prepend('<li>'+plancomment+planid+'</li>');
if(plancomment == '')
{
    
}
else if(plancomment != '')
{
$('.plancomment:eq('+index+')').val(""); 
$.post('../snippets/addcomment.php',{'planid':planid,'plancomment':plancomment},function(data){
$('.comments:eq('+index+')').hide().fadeIn(2000).prepend(data);

$.get('../snippets/getcommentscount.php',{'planid':planid},function(data){$('.countcomments:eq('+index+')').html(data);});
});
}
}); 
/*plancomment = $('.plancomment:eq('+index+')').val();    

$.post('../snippets/addcomment.php','',function(data){$('.comment').hide().append(data).slideDown('2000');});*/
});

//crave a plan
$('.craveplan').each(function(index, element) {
 $('.craveplan:eq('+index+')').click(function(e){
 planid = $('.planids:eq('+index+')').val();
 $.post('../snippets/addcraver.php',{'planid':planid},function(data){
 if(data == 'added')
 {
  $('.cravebox:eq('+index+')').html('<i title="Uncrave This Plan" style="color:#F3565D;" class="cravestyle fa fa-camera uncraveplan"> crave </i><i style="display:none;" title="Crave this Plan" class="cravestyle fa fa-camera craveplan"> crave </i><script src="../myscript/home.js">');
 }
 });
     
  });
    
});


// uncrave a plan
$('.uncraveplan').each(function(index, element) {

$('.uncraveplan:eq('+index+')').click(function(e) {
planid = $('.planids:eq('+index+')').val();
$.post('../snippets/removecraver.php',{'planid':planid},function(data)
{

$('.cravebox:eq('+index+')').html('<i style="display:none;" title="Uncrave This Plan" style="color:#F3565D;" class="cravestyle fa fa-camera uncraveplan"> crave </i> <i title="Crave this Plan" class="cravestyle fa fa-camera craveplan"> crave </i><script src="../myscript/home.js">');  


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
            $.post('../snippets/gethomeplanbypage.php',{'page': track_click}, function(data) {
            
                $(".load_more").show(); //bring back load more button
                
                $("#activehomeplans").append(data); //append data received from server

// delete a comment
// delete a comment 
$('.deletebutton').each(function(index, element) {
$('.deletebutton:eq('+index+')').click(function(e) {
e.preventDefault();
plancommentid = $('.thecommentid:eq('+index+')').val();
planid = $('.planids:eq('+index+')').val();
$(this).parent().parent().parent().parent().remove();

$.post('../snippets/removeacomment.php',{'plancommentid':plancommentid},function(){
//$('.countcomments:eq('+index+')').html(planid);
// $.get('../snippets/getcommentscount.php',{'planid':planid},function(data){$('.countcomments:eq('+index+')').html(data);});
    
});

});    
});

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
$('.addcomment').each(function(index, element) {
$('.addcomment:eq('+index+')').click(function(e) {
e.preventDefault(); 
plancomment = $('.plancomment:eq('+index+')').val();
planid = $('.planids:eq('+index+')').val();
//$('.comments:eq('+index+')').prepend('<li>'+plancomment+planid+'</li>');
if(plancomment == '')
{
    
}
else if(plancomment != '')
{
$('.plancomment:eq('+index+')').val(""); 
$.post('../snippets/addcomment.php',{'planid':planid,'plancomment':plancomment},function(data){
$('.comments:eq('+index+')').hide().fadeIn(2000).prepend(data);


$.get('../snippets/getcommentscount.php',{'planid':planid},function(data){$('.countcomments:eq('+index+')').html(data);});
});
}
}); 
/*plancomment = $('.plancomment:eq('+index+')').val();    

$.post('../snippets/addcomment.php','',function(data){$('.comment').hide().append(data).slideDown('2000');});*/
});

//crave a plan
$('.craveplan').each(function(index, element) {
 $('.craveplan:eq('+index+')').click(function(e){
 planid = $('.planids:eq('+index+')').val();
 $.post('../snippets/addcraver.php',{'planid':planid},function(data){
 if(data == 'added')
 {
  $('.cravebox:eq('+index+')').html('<i title="Uncrave This Plan" style="color:#F3565D;" class="cravestyle fa fa-camera uncraveplan"> crave </i><i style="display:none;" title="Crave this Plan" class="cravestyle fa fa-camera craveplan"> crave </i><script src="../myscript/home.js">');
 }
 });
     
  });
    
});


// uncrave a plan
$('.uncraveplan').each(function(index, element) {

$('.uncraveplan:eq('+index+')').click(function(e) {
planid = $('.planids:eq('+index+')').val();
$.post('../snippets/removecraver.php',{'planid':planid},function(data)
{

$('.cravebox:eq('+index+')').html('<i style="display:none;" title="Uncrave This Plan" style="color:#F3565D;" class="cravestyle fa fa-camera uncraveplan"> crave </i> <i title="Crave this Plan" class="cravestyle fa fa-camera craveplan"> crave </i><script src="../myscript/home.js">');  


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
</body>
</html>