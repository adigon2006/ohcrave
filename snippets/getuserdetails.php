<?php
require_once '../includes/Mydbhandler.php';
$dbhandle = new Mydbhandler();
$dbhandle->sessionstart();
$_SESSION['email'];
$_SESSION['sex'];
$_SESSION['phone'];
$_SESSION['state'];
$_SESSION['country'];
$_SESSION['zipcode'];
$_SESSION['address'];
$_SESSION['bio'];

$concat = $_SESSION['sex'].','.$_SESSION['email'].','.$_SESSION['phone'].','.$_SESSION['address']
        .','.$_SESSION['state'].','.$_SESSION['country'].','.$_SESSION['zipcode'].','.$_SESSION['bio'];
unset($_SESSION['email'],$_SESSION['sex'],$_SESSION['phone'],$_SESSION['state'],$_SESSION['country']
        ,$_SESSION['zipcode'],$_SESSION['address'],$_SESSION['bio']);
echo $concat;

?>
