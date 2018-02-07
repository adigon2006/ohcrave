<?php
require_once 'includes/Mydbhandler.php';
$dbhandle = new Mydbhandler();
$dbhandle->sessionstart();
$dbhandle->checkLoggedInStatus2();
?>
