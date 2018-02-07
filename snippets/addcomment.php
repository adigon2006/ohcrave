<?php
require_once '../includes/Mydbhandler.php';
$dbhandle2 = new Mydbhandler();
$dbhandle2->sessionstart();
$myuserid = $_SESSION['myusrid'];
$plancomment = $_POST['plancomment'];
$planid = $_POST['planid'];
echo $dbhandle2->addNewComment($planid, $plancomment, $myuserid);
//echo $dbhandle2->getLastComment($myuserid, $planid, $plancomment);
?>
