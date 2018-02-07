// JavaScript Document
$(document).ready(function(e) {

// post a plan
$('#postplan').click(function(e) {
myplan = $('#myplan').val();
if(myplan == "")
{

}
else if(myplan != "")
{
$.post('../snippets/postmyplan.php',{'myplan':myplan},function(data)
{
$('#activehomeplans').hide().prepend(data).fadeIn("slow");  
$('#myplan').val("");	
});
}
  
}); 

// delete a comment 
$('.deletebutton').each(function(index, element) {
$(this).click(function(e) {
e.preventDefault();
$('.commentlist:eq('+index+')').remove('li');    
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


/*setInterval(function()
{
$.get('../snippets/gethomeplans.php',"",function(data)
{
$('#activehomeplans').html(data);	
});	
},3000);   */

//crave a particular plan as required
$('.craveplan').each(function(index, element) {

$('.craveplan:eq('+index+')').click(function(e) {
planid = $('.planids:eq('+index+')').val();
$.post('../snippets/addcraver.php',{'planid':planid},function(data)
{
if(data == 'added')
{//$('.cravebox').html("hjhknjnkj");
	$('.cravebox:eq('+index+')').html('<i title="Uncrave This Plan" style="color:#F3565D;" class="cravestyle fa fa-camera uncraveplan"> crave </i><i style="display:none;" title="Crave this Plan" class="cravestyle fa fa-camera craveplan"> crave </i><script src="../myscript/home.js"></script>');
/*$('.craveplan:eq('+index+')').removeClass('fa-heart');
$('.craveplan:eq('+index+')').addClass('uncraveplan');
$('.craveplan:eq('+index+')').addClass('fa-thumbs-down');
$('.craveplan:eq('+index+')').attr("title","Uncrave this plan");
$('.craveplan:eq('+index+')').html(' Uncrave you craved this plan');
$('.craveplan:eq('+index+')').removeClass('craveplan');*/	
/*$.get('../snippets/countcravers.php',{'planid':planid},function(mydata){
$('.countcravers:eq('+index+')').html(' '+mydata+' cravers');
});*/	
}

});
     
});

    
});



$('.uncraveplan').each(function(index, element) {

$('.uncraveplan:eq('+index+')').click(function(e) {
planid = $('.planids:eq('+index+')').val();
$.post('../snippets/removecraver.php',{'planid':planid},function(data)
{

$('.cravebox:eq('+index+')').html('<i style="display:none;" title="Uncrave This Plan" style="color:#F3565D;" class="cravestyle fa fa-camera uncraveplan"> crave </i> <i title="Crave this Plan" class="cravestyle fa fa-camera craveplan"> crave </i><script src="../myscript/home.js"></script>');
/*$.get('../snippets/countcravers.php',{'planid':planid},function(mydata){
$('.countcravers:eq('+index+')').html(' '+mydata+' cravers');
});*/	


});
     
});

    
});

/*setInterval(function(){
$('.timeline-block').each(function(index, element) {
planid = $('.planids:eq('+index+')').val();
    
});

},3000)*/


});