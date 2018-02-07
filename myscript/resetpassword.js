// JavaScript Document
$(document).ready(function(e) {


$('#reset').submit(function(e) {
	e.preventDefault();
forgottoken = $('#forgottoken').val();
password = $('#password').val();
cpassword = $('#cpassword').val();
if(forgottoken == "")
{
realmsg = "Invalid Token";
$('#displaymsg').html('<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>');
$('#displaymsg').show();	
}
else if(password == "")
{
realmsg = "Enter New Password";
$('#displaymsg').html('<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>');
$('#displaymsg').show();	
}
else if(cpassword == "")
{
realmsg = "Confirm New Password";
$('#displaymsg').html('<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>');
$('#displaymsg').show();	
}
else if(password != cpassword)
{
realmsg = "Password Mismatch";
$('#displaymsg').html('<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>');
$('#displaymsg').show();	
}
else
{
$.post('../snippets/resetpassword.php',{'forgottoken':forgottoken,'password':password,'cpassword':cpassword},function(data){
if(data == 'notoken')
{
realmsg = "Invalid Token";
$('#displaymsg').html('<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>');
$('#displaymsg').show();	
}
else if(data == 'invalidtoken')
{
realmsg = "Invalid Token";
$('#displaymsg').html('<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>');
$('#displaymsg').show();		
}
else
{
realmsg = data;
$('#displaymsg').html('<div class="alert alert-success"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>');
$('#displaymsg').show().delay(4000).hide(2000);	
//window.location.href = "#editthis";
$('input[type="password"]').val("");	
}
	
});	
}
    
});

});