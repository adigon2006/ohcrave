$(document).ready(function(e) {

$('#edit').click(function(e) {
	e.preventDefault();
e.preventDefault();	
$('#profile').hide();
$('#profileedit').show();    
});

$('#updateprofile').submit(function(e) {
e.preventDefault();
$('#displaymsg').hide();
firstname = $('#firstname').val();
lastname = $('#lastname').val();
gender = $('#gender').val();
email = $('#email').val();
bio = $('#bio').val();
mobileno = $('#mobile').val();
username = $('#username').val();
address = $('#address').val();
state = $('#state').val();
country = $('#country').val();
zipcode = $('#zipcode').val();
 if(firstname == "")
 {
realmsg = "Enter First Name";
$('#displaymsg').html('<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>');
$('#displaymsg').show();	 
 }
 else  if(lastname == "")
 {
realmsg = "Enter Last Name";
$('#displaymsg').html('<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>');
$('#displaymsg').show();	 
 }
/*  else  if(gender == "")
 {
realmsg = "Select Gender";
$('#displaymsg').html('<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>');
$('#displaymsg').show();	 
 }*/
  else  if(email== "")
 {
realmsg = "Enter Email";
$('#displaymsg').html('<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>');
$('#displaymsg').show();	 
 }
 
   else  if(username== "")
 {
realmsg = "Enter Username";
$('#displaymsg').html('<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>');
$('#displaymsg').show();	 
 }
 else
 {
  $.loader({
		className:"blue-with-image-2",
		content:''
		});
		//'firstname':firstname,'lastname':lastname,'email':email,'mobileno':mobileno,'username':username,'gender':gender,'address':address,'state':state,'country':country,'zipcode':zipcode
$.post('../snippets/updateprofile.php',{'firstname':firstname,'lastname':lastname,'email':email,'mobileno':mobileno,'username':username,'gender':gender,'address':address,'state':state,'country':country,'bio':bio,'zipcode':zipcode},function(data){
if(data == 'emailfound')
{
$('#displaymsg').show();
realmsg = 'Email In Use';	
msg = '<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>';
$('#displaymsg').html(msg);
$.loader('close');	
}  
else if(data == 'mobilefound')
{
$('#displaymsg').show();
realmsg = 'Mobile No In Use';	
msg = '<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>';
$('#displaymsg').html(msg);
$.loader('close');	
}
else if(data == 'usernamefound')
{
$('#displaymsg').show();
realmsg = 'Username In Use';	
msg = '<div class="alert alert-danger"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>';
$('#displaymsg').html(msg);
$.loader('close');	
}
else 
{ 
$.get('../snippets/getsessionname.php','',function(d){
$('.sessionname').html(d);	
});

$.get('../snippets/getuserdetails.php','',function(f){
details = f.split(',');
$('#gender2').html(details[0]);
$('#email2').html(details[1]);
$('#phoneno2').html(details[2]);
$('#address2').html(details[3]);
$('#state2').html(details[4]);
$('#country2').html(details[5]);
$('#zipcode2').html(details[6]);
 $('#bio2').html(details[7]);	
});
$('#displaymsg').show().delay(4000).hide(2000);
realmsg = data;	
msg = '<div class="alert alert-success"><button class="fa fa-close close" data-dismiss="alert"></button>'+realmsg+'</div>';
$('#displaymsg').html(msg);
$.loader('close');	
$('#profile').show();
$('#profileedit').hide(); 
//window.location.href = "#editthis";

//setInterval(function(){$('#displaymsg').hide(2000);},6000);
} 	
});		 
 }
});
    
});