<?php
require_once '../includes/Mydbhandler.php';
$tounfollow = $_GET['tounfollow'];
$dbhandle3 = new Mydbhandler();
$dbhandle3->sessionstart();
$myuserid = $_SESSION['myusrid'];
$dbhandle3->unfollowSingleUser($tounfollow, $myuserid);
echo $msg;

?>