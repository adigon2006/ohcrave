<?php
require_once '../includes/Mydbhandler.php';
$latestfollowershandler = new Mydbhandler();
$userid = $_SESSION['myusrid'];
$mylastestfollowers = $latestfollowershandler->MyTenLatesFollowers($userid);
?>
<div class="panel panel-default">
                        <div class="panel-heading panel-heading-gray">
                            <a href="../followers/" class="btn btn-primary btn-xs pull-right">View All Followers <i class="fa fa-eye"></i></a>
                            <i class="icon-user-1"></i> Latest Followers
                        </div>
    <?=$mylastestfollowers; ?>
                       
                            
<!--                            <li>
                                <a href="#">
                                    <img src="../images/people/110/woman-3.jpg" alt="image" class="img-responsive" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../images/people/110/guy-2.jpg" alt="image" class="img-responsive" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../images/people/110/guy-9.jpg" alt="image" class="img-responsive" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../images/people/110/woman-9.jpg" alt="image" class="img-responsive" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../images/people/110/guy-4.jpg" alt="image" class="img-responsive" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../images/people/110/guy-1.jpg" alt="image" class="img-responsive" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../images/people/110/woman-4.jpg" alt="image" class="img-responsive" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../images/people/110/guy-6.jpg" alt="image" class="img-responsive" />
                                </a>
                            </li>-->
                        
                        <div class="clearfix"></div>
                    </div>
