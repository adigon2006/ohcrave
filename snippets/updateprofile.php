<?php
require_once '../includes/Mydbhandler.php';
$username = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$phoneno = $_POST['mobileno'];
$zipcode = $_POST['zipcode'];
$state = $_POST['state'];
$email = $_POST['email'];
$bio = $_POST['bio'];
$country = $_POST['country'];
$dbhandle = new Mydbhandler();
$dbhandle->sessionstart();
$userid = $_SESSION['myusrid'];
$dbhandle->checkemail2($email, 'user_tbl','user_id', $userid);
if(empty($msg))
{
if($phoneno != "")
{
  $dbhandle->checkmobile2($phoneno, 'user_tbl', 'user_id', $userid);
}
if(empty($msg))
{
$dbhandle->checkusername2($username, 'user_tbl', 'user_id', $userid);
if(empty($msg))
{
$dbhandle->updateMyProfile($firstname, $lastname, $email, $username, 
        $gender, $phoneno, $state, $country, $zipcode, $address,$userid,$bio);    
}
}
}

echo $msg;



?>
