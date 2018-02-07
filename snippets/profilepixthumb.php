<?php
require_once '../includes/Mydbhandler.php';
$dbhandle5 = new Mydbhandler();
$dbhandle5->sessionstart();
$myuserid = $_SESSION['myusrid'];
$thumbsprofilepix = $dbhandle5->ProfilePixThumb($myuserid);
echo $thumbsprofilepix;
?>
