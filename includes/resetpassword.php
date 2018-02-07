<?php
require_once 'Mydbhandler.php';
$dbhandle = new Mydbhandler();
if(isset($_GET['forgottoken']))
{
$forgottoken = $_GET['forgottoken'];
}
else if(!isset($_GET['forgottoken']))
{
$forgottoken = '';
}

?>