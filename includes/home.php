<?php
require_once 'Mydbhandler.php';
$dbhandle = new Mydbhandler();
$dbhandle->sessionstart();
$myid = $_SESSION['myusrid'];
$dbhandle->checkLoggedInStatus();
$dbhandle->InitializeFirstTime($myid);
$homeplans  = $dbhandle->getActiveHomePlans();
$lasttenusers = $dbhandle->theLastTenUsers();
$itemperpage = 3;
$totalrows = $noofplansonhome;
$total_pages = ceil($totalrows/$itemperpage);

//$tweet = "Valid hashtags include: #hashtag #NYC2016 #NYC_2016 #Adekunle!";

//echo $dbhandle->checkForHashTaggingInPlan($tweet);

//preg_match_all('/#([\p{Pc}\p{N}\p{L}\p{Mn}]+)/u', $tweet, $matches);
//print_r( $matches[0]);

//$text = "Vivamus #tristique non elit eu iaculis.";
//$text = preg_replace('/#(\w+)/', ' <a href="tag/$1">$1</a>', $tweet);

//echo $text;
?>

