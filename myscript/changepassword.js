$('#changepass').submit(function(e) {
e.preventDefault();    
oldpassword = $('#oldpassword').val();
password = $('#password').val();
cpassword = $('#cpassword').val();
$('#displaymsg').hide()
if(oldpassword == "")
{
realmsg = "Enter Old Password";
$('#displaymsg').html('<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>');
$('#displaymsg').show();		
}
else if(password == "")
{
realmsg = "Enter Password";
$('#displaymsg').html('<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>');
$('#displaymsg').show();		
}
else if(cpassword == "")
{
realmsg = "Please Confirm Password";
$('#displaymsg').html('<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>');
$('#displaymsg').show();		
}
else if(cpassword != password)
{
realmsg = "Password Mismatch";
$('#displaymsg').html('<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>');
$('#displaymsg').show();		
}
else
{
$.post('../snippets/changepassword.php',{'oldpassword':oldpassword,'password':password,'cpassword':cpassword},function(data){
if(data == "invalid")
{
realmsg = "Invalid Old Password";
$('#displaymsg').html('<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>');
$('#displaymsg').show();		
}
else if(data == "samepass")
{
realmsg = "Choose Another Password";
$('#displaymsg').html('<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>');
$('#displaymsg').show();		
}
else 
{
realmsg = data;
$('#displaymsg').html('<div class="alert alert-success"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>');
$('#displaymsg').show().delay(4000).hide(2000);	
window.location.href = "#editthis";
$('input[type="password"]').val();
}
});	
}

});