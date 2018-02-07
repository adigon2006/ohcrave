$(document).ready(function(e){
	
$('.addplanimage').each(function(index, element) {
 $(".addplanimage:eq("+index+")").click(function(e) {
 $('.addplanimage').attr("data-toggle","modal");
$('.addplanimage').attr("data-target","#kashpointmodal");  
 planid = $('.planid:eq('+index+')').val();
 $.post('../snippets/initializeplanid.php',{'planid':planid},function(){});   
});
    
});	
/*$('.addplanimage').click(function(e)
{
  
}); */   
    
   
    
});