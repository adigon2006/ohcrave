<?php
require_once '../includes/Mydbhandler.php';
$username = $_POST['username'];
$password = $_POST['password'];
$dbhandle = new Mydbhandler();
$dbhandle->sessionstart();
$dbhandle->finduser($username,$password);
echo $msg;
?>