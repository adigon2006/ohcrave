<?php
require_once '../includes/Mydbhandler.php';
$dbhandle2 = new Mydbhandler();
$dbhandle2->sessionstart();
$myuserid = $_SESSION['myusrid'];
$planid = $_POST['planid'];
echo $dbhandle2->removeACraver($planid, $myuserid);
?>
