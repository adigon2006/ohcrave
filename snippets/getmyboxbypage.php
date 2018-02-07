<?php
require_once '../includes/Mydbhandler.php';
$dbhandle2 = new Mydbhandler();
$dbhandle2->sessionstart();
$myuserid = $_SESSION['myusrid'];
// $limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 2;
// $offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;
// echo $dbhandle2->getActiveHomePlansByPage(0,2);
$item_per_page = 2;
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
$position = ($page_number * $item_per_page);
 echo $dbhandle2->GetAllMyBoxByPage($position,$item_per_page);

?>