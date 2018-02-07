<?php
require_once 'Mydbhandler.php';
$dbhandle = new Mydbhandler();
$dbhandle->sessionstart();
$dbhandle->checkLoggedInStatus();
$myid = $_SESSION['myusrid'];
$dbhandle->getSingleCustomerDetails($myid);
?>
