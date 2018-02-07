<?php
require_once '../includes/Mydbhandler.php';
$oldpassword = $_POST['oldpassword'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$dbhandle = new Mydbhandler();
$dbhandle->sessionstart();
$userid = $_SESSION['myusrid'];
$dbhandle->checkOldPassMatch($oldpassword, $userid);
if(empty($msg))
{
$dbhandle->updatePassword($password, $userid);	
}
echo $msg;
?>
