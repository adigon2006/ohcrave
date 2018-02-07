<?php
require_once '../includes/Mydbhandler.php';
$dbhandle2 = new Mydbhandler();
$myuserid = $_SESSION['myusrid'];
$noofactiveplan = $dbhandle2->NoOfActivePlans($myuserid);
$noofnotifications = $dbhandle2->CountNotifications($myuserid);
$noofbox = $dbhandle2->CountActiveBox($myuserid);
?>
