<?php
require_once '../includes/Mydbhandler.php';
$email = $_POST['email'];
$dbhandle3 = new Mydbhandler();
echo $dbhandle3->RetrievePassword($email);


?>