$(document).ready(function(e) {
$('.unfollow').each(function(index, element) {
$('.unfollow:eq('+index+')').click(function(e) {
	e.preventDefault();
//	$('.followerno:eq('+index+')').html("Am Unhere");
 tounfollow = $('.tounfollow:eq('+index+')').val();   
 $.get('../snippets/unfollow.php',{'tounfollow':tounfollow},function(data){
//$('.followerdiv:eq('+index+')').html(data);
if(data == "unfollowed")
{
$.get('../snippets/getnooffollower.php',{'tofollow':tounfollow},
function(data){
$('.followerno:eq('+index+')').html('<i class="fa fa-users text text-primary"></i> '+data).delay(2000).fadeIn(300);
});		
$('.followerdiv:eq('+index+')').html('<a href="#" class="btn btn-default follow">Follow <i class="fa fa-share"></i></a><a style="display:none;" href="#" class="btn btn-success">Following <i class="fa fa-check-circle fa-fw"></i></a> <a style="display:none;" href="#" class="btn btn-danger unfollow">Unfollow <i class="fa fa-close"></i></a><script src="../js/vendor.min.js"></script><script src="../myscript/bulkfollow.js"></script>');		
}
});    
//$('.followerdiv:eq('+index+')').html("Here");
});    
});

/*$('.unfollow').each(function(index, element) {
$('.unfollow:eq('+index+')').click(function(e) {
e.preventDefault();		
//	$('.followerno:eq('+index+')').html("Am Unhere");
tounfollow = $('.tounfollow:eq('+index+')').val();   
 $.get('../snippets/unfollow.php',{'tounfollow':tounfollow},function(data){
$('.followerdiv:eq('+index+')').html(data);
if(data == "unfollowed")
{
$.get('../snippets/getnooffollower2.php',{'tounfollow':tounfollow},
function(data){
$('.followerno:eq('+index+')').html('<i class="fa fa-users text text-primary"></i> '+data).delay(300).fadeIn(300);
});		
$('.followerdiv:eq('+index+')').html('<a href="#" class="btn btn-default follow">Follow <i class="fa fa-share"></i><a style="" href="#" class="btn btn-success">Following <i class="fa fa-check-circle fa-fw"></i></a> <a style="" href="#" class="btn btn-default unfollow">Unfollow <i class="fa fa-share"></i></a><script src="../js/vendor.min.js"></script><script src="../myscript/bulkfollow.js"></script>');		
}
});    
});   
});*/





});