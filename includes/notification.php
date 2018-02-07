<?php
require_once 'Mydbhandler.php';
$dbhandle = new Mydbhandler();
$dbhandle->sessionstart();
$myid = $_SESSION['myusrid'];
$dbhandle->checkLoggedInStatus();
$notificationtranslate  = $dbhandle->notification($myid);
$dbhandle->TheNotificationReinitialization($myid);
$lasttenusers = $dbhandle->theLastTenUsers();
?>

