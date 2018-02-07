// JavaScript Document
$(document).ready(function(e) {
$('.backlogin').click(function(e) {
	e.preventDefault();
 $('.login').fadeIn(300); 
 $('.forgotpass').hide();      
});

$('.forgot-password').click(function(e) {
	e.preventDefault();
 $('.forgotpass').fadeIn(300); 
 $('.login').hide();  
/* $.loader({
		className:"blue-with-image-2",
		content:''
		});*/
});

$('#forgot').submit(function(e) {
e.preventDefault();
$.loader({
		className:"blue-with-image-2",
		content:''
		});
$('#displaymsg').hide();
$('#displaymsg2').hide();
$('#displaymsg3').hide();
theemail = $('#emailretrieve').val();
if(theemail == "")
{
$('#displaymsg3').show();
realmsg = 'Enter Email.'	
msg = '<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>';
$('#displaymsg3').html(msg);
$.loader('close');			
}
else
{
$.post('snippets/retrievepassy.php',{'email':theemail},function(data){
if(data == 'usernotfound')
{
$('#displaymsg3').show();
realmsg = 'Invalid Email'	
msg = '<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>';
$('#displaymsg3').html(msg);
$.loader('close');	
}	
else if(data == 'userfound')
{
$('#displaymsg3').show();
realmsg = 'Please check your email address'
msg = '<div class="alert alert-success"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>';
$('#displaymsg3').html(msg);
$('#emailretrieve').val("");
$.loader('close');		
}
	});	
}
    
});

$('#login').submit(function(e) {	
e.preventDefault(); 
$.loader({
		className:"blue-with-image-2",
		content:''
		});
$('#displaymsg').hide();
$('#displaymsg2').hide();
$('#displaymsg3').hide();
username = $('#username').val();
password = $('#password').val();

if(username == "")
{
$('#displaymsg').show();
realmsg = 'Enter Username.'	
msg = '<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>';
$('#displaymsg').html(msg);
$.loader('close');		
}
else if(password == "")
{
$('#displaymsg').show();
realmsg = 'Enter Password.'	
msg = '<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>';
$('#displaymsg').html(msg);
$.loader('close');		
}
else 
{	
$.post('snippets/processlogin.php',{'username':username,'password':password},function(data)
{
if(data == 'notfound')
{
$('#displaymsg').show();
realmsg = 'Username/Password Incorrect'	
msg = '<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>';
$('#displaymsg').html(msg);
$.loader('close');		
}
else if(data == 'found')
{
$.get('snippets/getfirstlogin.php','',function(data2)
{
if(data2 == 1)
{
location = 'home';
}
else if(data2 == 0)
{
location = 'welcometour';
}
});

// location = 'home';	
}
	
});
}
});

$('#register').submit(function(e) {
e.preventDefault();
$.loader({
		className:"blue-with-image-2",
		content:''
		});
$('#displaymsg').hide();
$('#displaymsg2').hide();
$('#displaymsg3').hide();
lastname = $('#lastname').val();
firstname = $('#firstname').val();
email = $('#email').val();
username = $('#username2').val();
password = $('#password2').val();
cpassword = $('#cpassword').val();

if(firstname == "")
{
$('#displaymsg2').show();
realmsg = 'Enter Firstname.'	
msg = '<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>';
$('#displaymsg2').html(msg);
$.loader('close');	
}
else if(lastname == "")
{
$('#displaymsg2').show();
realmsg = 'Enter Lastname.'	
msg = '<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>';
$('#displaymsg2').html(msg);
$.loader('close');	
}
else if(email == "")
{
$('#displaymsg2').show();
realmsg = 'Enter Email.'	
msg = '<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>';
$('#displaymsg2').html(msg);
$.loader('close');	
}
else if(username == "")
{
$('#displaymsg2').show();
realmsg = 'Enter Username.'	
msg = '<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>';
$('#displaymsg2').html(msg);
$.loader('close');	
}
else if(password == "")
{
$('#displaymsg2').show();
realmsg = 'Enter Password.'	
msg = '<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>';
$('#displaymsg2').html(msg);
$.loader('close');	
}
else if(cpassword == "")
{
$('#displaymsg2').show();
realmsg = 'Confirm Password.'	
msg = '<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>';
$('#displaymsg2').html(msg);
$.loader('close');	
}
else if(cpassword != password)
{
$('#displaymsg2').show();
realmsg = 'Password Mismatch.'	
msg = '<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>';
$('#displaymsg2').html(msg);
$.loader('close');	
}
else
{
$.post('snippets/processregister.php',{'firstname':firstname,'lastname':lastname,'email':email,'username':username,'password':password},function(data){
if(data == 'emailfound')
{
$('#displaymsg2').show();
realmsg = 'Email In Use'	
msg = '<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>';
$('#displaymsg2').html(msg);
$.loader('close');	
}
else if(data == 'usernamefound')
{
$('#displaymsg2').show();
realmsg = 'Username In Use'	
msg = '<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>';
$('#displaymsg2').html(msg);
$.loader('close');	
}
else
{
$('#displaymsg2').show();
realmsg = data	
msg = '<div class="alert alert-success"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>';
$('#displaymsg2').html(msg);
$.loader('close');	
$('input[type="text"]').val("");
$('input[type="email"]').val("");
$('input[type="password"]').val("");	
}
});	
}
   
});


    
});