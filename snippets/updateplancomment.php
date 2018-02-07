<?php
require_once '../includes/Mydbhandler.php';
$dbhandle2 = new Mydbhandler();
$dbhandle2->sessionstart();
$myuserid = $_SESSION['myusrid'];
$plancommentid = $_POST['plancommentid'];
$plancomment = $_POST['plancomment'];
$dbhandle2->updatePlanComment($plancommentid,$plancomment);
?>