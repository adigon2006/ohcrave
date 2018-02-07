<?php
require_once 'Mydbhandler.php';
$dbhandle = new Mydbhandler();
$dbhandle->sessionstart();
$myid = $_SESSION['myusrid'];
$dbhandle->checkLoggedInStatus();
$activeplans  = $dbhandle->MyActivePlans();
$latestnotification = $dbhandle->getlatestnotification($myid);
$itemperpage = 3;
$totalrows = $noactive;
$total_pages = ceil($totalrows/$itemperpage);
?>
