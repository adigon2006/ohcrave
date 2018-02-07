<?php
require_once 'Mydbhandler.php';
$dbhandle = new Mydbhandler();
$dbhandle->sessionstart();
$myid = $_SESSION['myusrid'];
$dbhandle->checkLoggedInStatus();
$profileurl = $dbhandle->getProfileURL($myid);
$exist = $dbhandle->confirmCheckIfNotExist2($profileurl);
if($exist == false)
{
$dbhandle->redirect_to('../pagenotfound/');
}
//$profileurl = $dbhandle->getProfileURL($myid);
//echo "gshfbjdbfbdhbfjbdkbfkjdbjfbdjbfjbdjfbjdbfjdjbfjdbjfbjdfkdj";
//echo $dbhandle->convert($_GET['nvsp'],$dbhandle->secretKey());
if(!isset($_GET[$profileurl]))
{
$dbhandle->redirect_to('../pagenotfound/');
}
else if(isset($_GET[$profileurl]) && $_GET[$profileurl]== "")
{
 $dbhandle->redirect_to('../pagenotfound/');   
}
else if($dbhandle->confirmCheckIfNotExist($_GET[$profileurl]))
{
 $dbhandle->redirect_to('../pagenotfound/');
}

?>
