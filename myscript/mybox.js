$(document).ready(function(e) {

$('.viewimages').each(function(index, element) {
$('.likelovecrave').hide();
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

});