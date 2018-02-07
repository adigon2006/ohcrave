<?php
require_once '../includes/Mydbhandler.php';
$dbhandle2 = new Mydbhandler();
$dbhandle2->sessionstart();
$myuserid = $_SESSION['myusrid'];
$planid = $_GET['planid'];
echo $dbhandle2->NoOfPlanComments($planid);
?>
