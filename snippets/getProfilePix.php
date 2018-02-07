<?php
require_once '../includes/Mydbhandler.php';
$dbhandle3 = new Mydbhandler();
$dbhandle3->sessionstart();
$myuserid = $_SESSION['myusrid'];
$myprofilepix = $dbhandle3->ProfilePix($myuserid);
echo $myprofilepix;
?>
