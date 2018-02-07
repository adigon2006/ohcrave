<?php
require_once '../includes/Mydbhandler.php';
$dbhandle2 = new Mydbhandler();
$dbhandle2->sessionstart();
$myuserid = $_SESSION['myusrid'];
$myplan =  $_POST['myplan'];
$dbhandle2->addMyNewPlan($myuserid, $myplan);
echo $dbhandle2->getLastInsertedActiveHomePlans();

?>
