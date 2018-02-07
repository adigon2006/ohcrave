<?php
require_once '../includes/Mydbhandler.php';
global $msg;
$forgottoken = $_POST['forgottoken'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$dbhandle = new Mydbhandler();
if($forgottoken == "")
{
$msg = 'notoken';
}
else
{
$msg = $dbhandle->TokenUpdatePassword($forgottoken,$password,$cpassword);
}

echo $msg;

?>