// JavaScript Document
$(document).ready(function(e) {
   
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
    
 

    // display image one by one

$('.viewimages').each(function(index, element) {
$('.viewimages:eq('+index+')').click(function(e) {
//$('.openimage:eq('+index+')').attr("data-target","#planimagemodal"); 
planid = $('.planids:eq('+index+')').val();
$.loader({
		className:"blue-with-image-2",
		content:''
		});
$.get("../snippets/getplanname.php",{'planid':planid},function(data){
$('.modal-title').html(data+' Images');


$.get("../snippets/getfirstsingleimage.php",{'planid':planid},function(data){
$('.image-container').html(data);	
imageid = $('#current').val();
$.get("../snippets/rightsideofplanimage.php",{'planid':planid,'imageid':imageid},function(data){
$('.comment-section').html(data);
$('.comment-section').append();	
$.loader('close');	
})

	});
	
});

   
});    
});



// 
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
});
	
});

});  
  
});

	
	
	
});

