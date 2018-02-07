<?php
require_once 'Mydbhandler.php';
$dbhandle = new Mydbhandler();
$dbhandle->sessionstart();
$myid = $_SESSION['myusrid'];
$dbhandle->checkLoggedInStatus();
$mybox  = $dbhandle->GetAllMyBox();
if($mybox == "")
{
$mybox = '<div class="timeline-block">
                    <div class="panel panel-default share">
                        <div class="panel-heading panel-heading-gray title">
                          You have no message in Box 
                        </div>
                        
                       
                    </div>
                </div>';
}
$itemperpage = 2;
$totalrows = $noofbox;
$total_pages = ceil($totalrows/$itemperpage);

?>
