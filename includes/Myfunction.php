<?php
require_once 'Mydbhandler.php';

$dbhandle = new Mydbhandler();
$dbhandle->sessionstart();
/*if(!isset($_SESSION['usrid']) && !isset($_SESSION['type']))
{
$dbhandle->redirect_to('../logout/');    
}
if(isset($_GET['id']))
{
$id = $_GET['id'];
$dbhandle->selectsinglesuperuser($id);
$dbhandle->selectsinglecustomerdetails($id);
}

$noofactiveusers = $dbhandle->getAllActiveUsers();
$noofactiveplans = $dbhandle->getAllActivePlans();
$noofsuperadmins = $dbhandle->getAllSuperAdmins();
$noofrunningads = $dbhandle->getAllRunningAds();
$noofinactiveuser = $dbhandle->getAllInactiveUsers();
$noofactivecomplaint = $dbhandle->getAllActiveComplaints();
$dbhandle->getAllSuper();
$dbhandle->myactiveusers();
$dbhandle->myinactiveusers();
$dbhandle->getOptionMenu();
$dbhandle->myactiveplans();
if(isset($_SESSION['usrid']) && isset($_SESSION['type']))
{
 $fullname = $_SESSION['namefull'];   
}
*/

?>
