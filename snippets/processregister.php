<?php
require_once '../includes/Mydbhandler.php';
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$dbhandle = new Mydbhandler();
$dbhandle->checkemail($email,'user_tbl');
if(empty($msg))
{
$dbhandle->checkusername($username,'user_tbl');	
if(empty($msg))
{
$dbhandle->registeruser($firstname,$lastname,$email,$username,$password);	
}
}

echo $msg;
?>
