<?php
require_once '../includes/Mydbhandler.php';
$tofollow = $_GET['tofollow'];
$dbhandle3 = new Mydbhandler();
$dbhandle3->sessionstart();
$myuserid = $_SESSION['myusrid'];
echo $dbhandle3->thenooffollowers($tofollow);
?>
