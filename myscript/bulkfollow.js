
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
$('.followerno:eq('+index+')').html('<i class="fa fa-users text text-primary"></i> '+data).delay(300).fadeIn(300);
});		
$('.followerdiv:eq('+index+')').html('<a href="#" style="display:none;" class="btn btn-default follow">Follow <i class="fa fa-share"></i></a><a href="#" class="btn btn-success">Following <i class="fa fa-check-circle fa-fw"></i></a> <a href="#" class="btn btn-danger unfollow">Unfollow <i class="fa fa-close"></i></a><script src="../js/vendor.min.js"></script><script src="../myscript/bulkunfollow.js"></script>');	
}
});     
});

});


});