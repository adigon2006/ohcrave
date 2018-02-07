<?php
require_once '../includes/Mydbhandler.php';
$dbhandle2 = new Mydbhandler();
$dbhandle2->sessionstart();
$myuserid = $_SESSION['myusrid'];
$plancommentid = $_GET['plancommentid'];
echo $dbhandle2->PlanCommentBYID($plancommentid);

?>