<?php
require_once '../includes/Mydbhandler.php';
$planid = $_GET['planid'];
$dbhandle3 = new Mydbhandler();
$dbhandle3->sessionstart();
$myuserid = $_SESSION['myusrid'];
$imageid = $_GET['imageid'];
echo $dbhandle3->TheRightSideOfImage($planid,$myuserid,$imageid);
// echo $imageid;
?>