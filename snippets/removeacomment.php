<?php
require_once '../includes/Mydbhandler.php';
$dbhandle2 = new Mydbhandler();
$dbhandle2->sessionstart();
$myuserid = $_SESSION['myusrid'];
$plancommentid = $_POST['plancommentid'];
$dbhandle2->removeCommentPlan($plancommentid);
?>