$(document).ready(function(e) {
$('.follow').click(function(e) {
tofollow = $('#tofollow').val();	
$.get('../snippets/follow.php',{'tofollow':tofollow},function(data)
{
if(data == "followed")
{
//$('.followerno').html('<i class="fa fa-users text text-primary"></i> hello');	
$.get('../snippets/getnooffollower.php',{'tofollow':tofollow},
function(data){
$('.followerno').html('<i class="fa fa-users text text-primary"></i> '+data).delay(2000).fadeIn(300);
});		
$('#followerdiv').html('<a href="#" class="btn btn-success">Following <i class="fa fa-check-circle fa-fw"></i></a> <a href="#" class="btn btn-danger unfollow">Unfollow <i class="fa fa-close"></i></a><script src="../myscript/publicprofilefollow.js"></script>');	
}
});  
});

$('.unfollow').click(function(e) {
 tounfollow = $('#tounfollow').val();   
 $.get('../snippets/unfollow.php',{'tounfollow':tounfollow},function(data){
$('#followerdiv').html(data);
if(data == "unfollowed")
{
$.get('../snippets/getnooffollower2.php',{'tounfollow':tounfollow},
function(data){
$('.followerno').html('<i class="fa fa-users text text-primary"></i> '+data).delay(2000).fadeIn(300);
});		
$('#followerdiv').html('<a href="#" class="btn btn-default follow">Follow <i class="fa fa-share"></i></a><script src="../myscript/publicprofilefollow.js"></script>');		
}
 });
});    

});

