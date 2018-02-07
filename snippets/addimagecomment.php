<?php
require_once '../includes/Mydbhandler.php';
$dbhandle2 = new Mydbhandler();
$dbhandle2->sessionstart();
$myuserid = $_SESSION['myusrid'];
$imagecomment = $_POST['imagecomment'];
$imageid = $_POST['imageid'];
$dbhandle2->addNewImageComment($imageid, $imagecomment, $myuserid);
echo $dbhandle2->getLastImageComment($myuserid, $imageid, $imagecomment);
?>
