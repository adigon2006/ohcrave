    $(document).ready(function() {

    var track_click = 0; //track user click on "load more" button, righ now it is 0 click
    
    var total_pages = <?php echo $total_pages; ?>;
    $('#activehomeplans').load("../snippets/gethomeplanbypage.php", {'page':track_click}, function() {track_click++;
// edit a comment 
$('.editbutton').each(function(index, element) {
 $('.editbutton:eq('+index+')').click(function(e) {
e.preventDefault();  
//planid = $('.planids:eq('+index+')').val();
plancommentid = $('.thecommentid:eq('+index+')').val();
  
$.get('../snippets/getplancommentbyid.php',{'plancommentid':plancommentid},function(data){
com = data;
$('.theplancomment:eq('+index+')').html("<input type='hidden' class='indexval' value='"+index+"' /><input type='text' class='updatevalue' value='"+com+"'/>  <a class='editdeletebutton update'><i class='fa fa-edit'></i>Update</a>");
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