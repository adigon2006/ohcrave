<?php
require_once '../includes/Mydbhandler.php';
$planid = $_GET['planid'];
$dbhandle3 = new Mydbhandler();
$dbhandle3->sessionstart();
$myuserid = $_SESSION['myusrid'];
echo $dbhandle3->getTheSingleImagePlusNavigation($planid);
?>
