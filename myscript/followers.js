$(document).ready(function(e) {
$('.follow').each(function(index, element) {
$('.follow:eq('+index+')').click(function(e) {
e.preventDefault();	
tofollow = $('.tofollow:eq('+index+')').val();	
//$('.followerno:eq('+index+')').html(tofollow);

$.get('../snippets/follow.php',{'tofollow':tofollow},function(data)
{
if(data == "followed")
{
//$('.followerno').html('<i class="fa fa-users text text-primary"></i> hello');	
$.get('../snippets/getnooffollower.php',{'tofollow':tofollow},
function(data){
	
$('.followerdiv:eq('+index+')').html('<a href="#" style="display:none;" class="btn btn-default follow">Follow <i class="fa fa-share"></i></a><a href="#" class="btn btn-success">Following <i class="fa fa-check-circle fa-fw"></i></a> <a href="#" class="btn btn-danger unfollow">Unfollow <i class="fa fa-close"></i></a><script src="../myscript/followers.js"></script>');	
$('.followerno:eq('+index+')').html('<i class="fa fa-users text text-primary"></i> '+data).delay(300).fadeIn(300);
});	
}
});     
});   
});


$('.unfollow').each(function(index, element) {
$('.unfollow:eq('+index+')').click(function(e) {
e.preventDefault();		
//	$('.followerno:eq('+index+')').html("Am Unhere");
tounfollow = $('.tounfollow:eq('+index+')').val();   
 $.get('../snippets/unfollow.php',{'tounfollow':tounfollow},function(data){
//$('.followerdiv:eq('+index+')').html(data);
if(data == "unfollowed")
{
$.get('../snippets/getnooffollower2.php',{'tounfollow':tounfollow},
function(data){
	
$('.followerdiv:eq('+index+')').html('<a href="#" class="btn btn-default follow">Follow <i class="fa fa-share"></i><a style="display:none;" href="#" class="btn btn-success">Following <i class="fa fa-check-circle fa-fw"></i></a> <a style="display:none;" href="#" class="btn btn-danger unfollow">Unfollow <i class="fa fa-close"></i></a><script src="../myscript/followers.js"></script>');		
$('.followerno:eq('+index+')').html('<i class="fa fa-users text text-primary"></i> '+data).delay(300).fadeIn(300);
});	
}
});    
});   
});

    
});