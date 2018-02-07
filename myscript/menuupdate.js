$(document).ready(function(e) {
setInterval(function(e)
{
$.get('../snippets/getnoofactiveplans.php',"",function(data){$('#activeplansno').html(data);$('#activeplansno2').html(data);});	
},3000);

setInterval(function(e)
{
$.get('../snippets/getnoofbox.php',"",function(data){$('#boxno').html(data); $('#boxno2').html(data);});	
},3000);


setInterval(function(e)
{
$.get('../snippets/getnoofnotifications.php',"",function(data){$('#notificationno').html(data);$('#notificationno2').html(data);});	
},3000);
    
});