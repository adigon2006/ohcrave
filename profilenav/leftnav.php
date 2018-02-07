<?php
require_once '../includes/Mydbhandler.php';
$dbhandle3 = new Mydbhandler();
$myuserid = $_SESSION['myusrid'];
$myprofilepix = $dbhandle3->ProfilePix($myuserid);
$celeb = $_SESSION['celeb'];
?>
<div class="sidebar-block">
                <div class="profile">
                   <!-- <img src="../images/profilepix/noprofile.jpg" alt="Profile Pix" class="img-circle" /> -->
                    <div id="realprofilepix"> <?=$myprofilepix ?> </div>
                    <h5 style="color:#6F448B;" class="sessionname"><?=$_SESSION['fullname'] ?> &nbsp;  <?php if($celeb == 1)
                    {

echo '<i  class="celeb fa fa-check-circle"></i>';
                }
                else if($celeb == 0)
                {
echo "";
                }

                ?></h5>
                  
                </div>
            </div>
<div id="menu">
                <ul>
                    <li class="category">Account</li>
                    <li class="">
                        <a href="../uploadprofilepix"><i class="fa fa-edit"></i> Change Profile Picture</a>
                    </li>
                    <li class="">
                        <a href="../privateprofile"><i class="fa fa-edit"></i> Edit Profile</a>
                    </li>
                    <li class="">
                        <a href="../followers"><i class="fa fa-users"></i> Manage Followers</a>
                    </li>
                    <!-- <li class="">
                        <a href="../privacysettings"><i class="fa fa-cog"></i> Privacy Settings</a>
                    </li> -->
					
                </ul>
            </div>