<?php
require_once '../includes/Mydbhandler.php';
$dbhandle2 = new Mydbhandler();
$dbhandle2->sessionstart();
$myuserid = $_SESSION['myusrid'];
$imageid = $_GET['imageid'];
echo $dbhandle2->NoOfImageComments($imageid);
?>