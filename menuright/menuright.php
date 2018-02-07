<?php
require_once '../includes/Mydbhandler.php';
$dbhandle5 = new Mydbhandler();
//$dbhandle5->sessionstart();
$myuserid = $_SESSION['myusrid'];
$thumbsprofilepix = $dbhandle5->ProfilePixThumb($myuserid);
?>
<ul class="nav navbar-nav navbar-right">
                    <li class="hidden-xs">
                        <a style="cursor:pointer;" data-toggle="sidebar-chat">
                            <i class="fa fa-search"></i>
                        </a>
                    </li>
<li class="dropdown">
                        <a  style="font-size:12px; cursor:pointer;" class="dropdown-toggle user" data-toggle="dropdown">
                            <!-- <img src="../images/people/110/guy-5.jpg" alt="Bill" class="img-circle" width="40" /> -->
                            <i id="thumbprofilepix"><?=$thumbsprofilepix ?></i>
                            <i class="fa fa-cog"><?//=$_SESSION['fullname']; ?></i> Settings <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="../privateprofile">Profile</a>
                            </li>
                             <li><a href="../changepassword">Change Password</a>
                            </li>
                            <!-- <li><a href="user-private-messages.html">Messages</a>
                            </li> -->
                            <li><a href="../logout">Logout</a>
                            </li>
                        </ul>
                    </li>
</ul>