<?php
require_once '../includes/Mydbhandler.php';
$followershandler = new Mydbhandler();
$userid = $_SESSION['myusrid'];
$followershandler->getAllMyFollowers($userid);
?>
<div class="container-fluid">
            
            <!-- <div id="filter">
                <form class="form-inline">
                    <label>Filter:</label>
                    <select name="users-filter" id="users-filter-select" class="selectpicker" data-style="btn-primary">
                        <option value="all">All</option>
                        <option value="friends">Follower</option>
                        <option value="name">by Name</option>
                        <option value="usernamename">by UserName</option>
                    </select>
                    <div id="users-filter-trigger">
                        <div class="select-friends hidden">
                            <select name="users-filter-friends" class="selectpicker" data-style="btn-primary" data-live-search="true">
                                <option value="0">Select Friend</option>
                                <option value="1">Mary D.</option>
                                <option value="2">Michelle S.</option>
                                <option value="3">Adrian Demian</option>
                            </select>
                        </div>
                        <div class="search-name hidden">
                            <input type="text" class="form-control" name="user-first" placeholder="First Last Name" id="" />
                            <a href="#" class="btn btn-primary btn-sm hidden" id="user-search-name"><i class="fa fa-search"></i> Search</a>
                        </div>
                    </div>
                </form> 
            </div>-->
            <div class="timeline row allfollower" data-toggle="gridalicious">
                <?=$myallfollowers ?>
                
                  
                 
                    
                
                
                
             
                
               
            </div>
</div>
 <script src="../js/vendor.min.js"></script>
<script src="../myscript/followers.js"></script>  