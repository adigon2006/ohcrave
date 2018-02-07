<?php
require_once '../includes/Mydbhandler.php';
$activehandle = new Mydbhandler();
$activehandle->sessionstart();
$myid = $_SESSION['myusrid'];
$activehandle->checkLoggedInStatus();
 $activeplans  = $activehandle->MyActivePlans();
 echo $activeplans;
?>
