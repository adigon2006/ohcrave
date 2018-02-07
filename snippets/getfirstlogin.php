<?php
require_once '../includes/Mydbhandler.php';
$dbhandle3 = new Mydbhandler();
$dbhandle3->sessionstart();
echo $_SESSION['notfirstlogin'];
?>