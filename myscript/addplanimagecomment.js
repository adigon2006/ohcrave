$('.addimagecomment').click(function(e) {
e.preventDefault();
imagecomment = $('.imagecomment').val();
imageid = $('#current').val();
if(imagecomment == '')
{
	
}
else if(imagecomment != '')
{
$('.imagecomment').val("");
$.post('../snippets/addimagecomment.php',{'imagecomment':imagecomment,'imageid':imageid}, function(data){
$('.imagecommentcon').hide().fadeIn(2000).prepend(data);  	
$.get('../snippets/countimagecomment.php',{'imageid':imageid},function(data){
$('.countimagecomments').html(data);	
});	
});	
}
  
});


// handle the like action
$('.likeimage').click(function(e) {
imageid = $('#current').val();
$.post('../snippets/addlike.php',{'imageid':imageid},function(data)
{
if (data == 'added')
{
$('.likebox').html('<i title="Unlike This Image" style="color:#F3565D;" class="cravestyle fa fa-thumbs-up unlikeimage"> like </i><i style="display:none;" title="Like this Image" class="cravestyle fa fa-thumbs-up likeimage"> Like </i><script src="../myscript/addplanimagecomment.js"></script>');	
$('.lovebox').html('<i style="display:none;" title="Unlove This Image" style="color:#F3565D;" class="cravestyle fa fa-love unloveimage"> love </i> <i title="Love this Image" class="cravestyle fa fa-heart loveimage"> Love</i><script src="../myscript/addplanimagecomment.js"></script>');
$('.craveimagebox').html('<i style="display:none;" title="Uncrave This Image" style="color:#F3565D;" class="cravestyle fa fa-love uncraveimage"> crave </i> <i title="Crave this Image" class="cravestyle fa fa-heart craveimage"> Crave</i><script src="../myscript/addplanimagecomment.js"></script>');	
$.get('../snippets/countphotolike.php',{'imageid':imageid},function(data){$('.photolike').html(data);});
$.get('../snippets/countphotolove.php',{'imageid':imageid},function(data){$('.photolove').html(data);});
$.get('../snippets/countphotocrave.php',{'imageid':imageid},function(data){$('.photocrave').html(data);});
}
	
});	
    
});

$('.unlikeimage').click(function(e) {
imageid = $('#current').val();
$.post('../snippets/removelike.php',{'imageid':imageid},function(data)
{

$('.likebox').html('<i style="display:none;" title="Unlike This Image" style="color:#F3565D;" class="cravestyle fa fa-thumbs-up unlikeimage"> crave </i> <i title="Like this Image" class="cravestyle fa fa-thumbs-up likeimage"> Like</i><script src="../myscript/addplanimagecomment.js"></script>');	
$.get('../snippets/countphotolike.php',{'imageid':imageid},function(data){$('.photolike').html(data);});

	
});	
    
});


$('.loveimage').click(function(e) {
imageid = $('#current').val();
$.post('../snippets/addlove.php',{'imageid':imageid},function(data)
{
if (data == 'added')
{
$('.lovebox').html('<i title="Unlove This Image" style="color:#F3565D;" class="cravestyle fa fa-heart unloveimage"> love </i><i style="display:none;" title="Love this Image" class="cravestyle fa fa-heart loveimage"> Love </i><script src="../myscript/addplanimagecomment.js"></script>');	
$('.likebox').html('<i style="display:none;" title="Unlike This Image" style="color:#F3565D;" class="cravestyle fa fa-thumbs-up unlikeimage"> crave </i> <i title="Like this Image" class="cravestyle fa fa-thumbs-up likeimage"> Like</i><script src="../myscript/addplanimagecomment.js"></script>');
$('.craveimagebox').html('<i style="display:none;" title="Uncrave This Image" style="color:#F3565D;" class="cravestyle fa fa-heart uncraveimage"> crave </i> <i title="Crave this Image" class="cravestyle fa fa-heart craveimage"> Crave</i><script src="../myscript/addplanimagecomment.js"></script>');
$.get('../snippets/countphotolike.php',{'imageid':imageid},function(data){$('.photolike').html(data);});
$.get('../snippets/countphotolove.php',{'imageid':imageid},function(data){$('.photolove').html(data);});
$.get('../snippets/countphotocrave.php',{'imageid':imageid},function(data){$('.photocrave').html(data);});
}
	
});	
    
});


$('.unloveimage').click(function(e) {
imageid = $('#current').val();
$.post('../snippets/removelove.php',{'imageid':imageid},function(data)
{

$('.lovebox').html('<i style="display:none;" title="Unlove This Image" style="color:#F3565D;" class="cravestyle fa fa-heart unloveimage"> love </i> <i title="Love this Image" class="cravestyle fa fa-heart loveimage"> Love</i><script src="../myscript/addplanimagecomment.js"></script>');	
$.get('../snippets/countphotolove.php',{'imageid':imageid},function(data){$('.photolove').html(data);});

	
});	
    
});

$('.craveimage').click(function(e) {
imageid = $('#current').val();
$.post('../snippets/addcraveimage.php',{'imageid':imageid},function(data)
{
if (data == 'added')
{
$('.craveimagebox').html('<i title="Uncrave This Image" style="color:#F3565D;" class="cravestyle fa fa-heart uncraveimage"> crave </i><i style="display:none;" title="Crave this Image" class="cravestyle fa fa-heart craveimage"> Crave </i><script src="../myscript/addplanimagecomment.js"></script>');
$('.lovebox').html('<i style="display:none;" title="Unlove This Image" style="color:#F3565D;" class="cravestyle fa fa-heart unloveimage"> love </i> <i title="Love this Image" class="cravestyle fa fa-heart loveimage"> Love</i><script src="../myscript/addplanimagecomment.js"></script>');
$('.likebox').html('<i style="display:none;" title="Unlike This Image" style="color:#F3565D;" class="cravestyle fa fa-thumbs-up unlikeimage"> crave </i> <i title="Like this Image" class="cravestyle fa fa-thumbs-up likeimage"> Like</i><script src="../myscript/addplanimagecomment.js"></script>');	
$.get('../snippets/countphotolike.php',{'imageid':imageid},function(data){$('.photolike').html(data);});
$.get('../snippets/countphotolove.php',{'imageid':imageid},function(data){$('.photolove').html(data);});
$.get('../snippets/countphotocrave.php',{'imageid':imageid},function(data){$('.photocrave').html(data);});

}
	
});	
    
});

$('.uncraveimage').click(function(e) {
imageid = $('#current').val();
$.post('../snippets/removecrave.php',{'imageid':imageid},function(data)
{

$('.craveimagebox').html('<i style="display:none;" title="Uncrave This Image" style="color:#F3565D;" class="cravestyle fa fa-heart uncraveimage"> crave </i> <i title="Crave this Image" class="cravestyle fa fa-heart craveimage"> Crave</i><script src="../myscript/addplanimagecomment.js"></script>');	
$.get('../snippets/countphotocrave.php',{'imageid':imageid},function(data){$('.photocrave').html(data);});

	
});	
    
});

$('.next').click(function(e) {
	$.loader({
		className:"blue-with-image-2",
		content:''
		});
nextimage = $('#next').val();	
planid = $('.myplanid').val(); 
$.get("../snippets/getotherplanimage.php",{'planid':planid,'imageid':nextimage},function(data){
$('.image-container').html(data);

$.get("../snippets/rightsideofplanimage.php",{'planid':planid,'imageid':nextimage},function(data){
$('.comment-section').html(data);
/*$('.comment-section').append();	*/
$.loader('close');	
})
});
//$('.navicon').html(planid);  
}); 


$('.prev').click(function(e) {
	$.loader({
		className:"blue-with-image-2",
		content:''
		});
nextimage = $('#prev').val();	
planid = $('.myplanid').val(); 
$.get("../snippets/getotherplanimage.php",{'planid':planid,'imageid':nextimage},function(data){
$('.image-container').html(data);

$.get("../snippets/rightsideofplanimage.php",{'planid':planid,'imageid':nextimage},function(data){
$('.comment-section').html(data);
/*$('.comment-section').append();	*/
$.loader('close');	
})
});
//$('.navicon').html(planid);  
});


$(document).keydown(function(e) {
switch(e.which)
{
case 37:
if($('.prev').is(':visible'))
{
	$.loader({
		className:"blue-with-image-2",
		content:''
		});
nextimage = $('#prev').val();	
planid = $('.myplanid').val(); 
$.get("../snippets/getotherplanimage.php",{'planid':planid,'imageid':nextimage},function(data){
$('.image-container').html(data);

$.get("../snippets/rightsideofplanimage.php",{'planid':planid,'imageid':nextimage},function(data){
$('.comment-section').html(data);
/*$('.comment-section').append();	*/
$.loader('close');	
})
});
}
break;	
case 39:
$.loader({
		className:"blue-with-image-2",
		content:''
		});
nextimage = $('#next').val();	
planid = $('.myplanid').val(); 
$.get("../snippets/getotherplanimage.php",{'planid':planid,'imageid':nextimage},function(data){
$('.image-container').html(data);

$.get("../snippets/rightsideofplanimage.php",{'planid':planid,'imageid':nextimage},function(data){
$('.comment-section').html(data);
/*$('.comment-section').append();	*/
$.loader('close');	
})
});
break;	
case 13:
imagecomment = $('.imagecomment').val();
imageid = $('#current').val();
if(imagecomment == '')
{
	
}
else if(imagecomment != '')
{
$('.imagecomment').val("");
$.post('../snippets/addimagecomment.php',{'imagecomment':imagecomment,'imageid':imageid}, function(data){
$('.imagecommentcon').hide().fadeIn(2000).prepend(data);  	
$.get('../snippets/countimagecomment.php',{'imageid':imageid},function(data){
$('.countimagecomments').html(data);	
});	
});	
}
break;
default:

return;


}
e.preventDefault()
});



