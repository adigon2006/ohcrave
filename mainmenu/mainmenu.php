<?php include_once '../snippets/menucount.php'; ?>

<div class="collapse navbar-collapse" id="subnav">
                    <ul class="nav navbar-nav">
                        <li><a href="../home"><i class="fa fa-fw fa-home"></i> Home</a>
                        </li>
						<li><a href="../activeplans"><i class="fa fa-fw fa-camera"></i> Active Events 
                                                        <b class="notifications" id="activeplansno"><?php echo $noofactiveplan; ?></b></a>
                        </li>
                    <li><a href="../mybox"><i class="fa fa-fw fa-inbox"></i> Box
					<b class="notifications" id="boxno"><?php echo $noofbox; ?></b></a>
                        </li>
					<li><a href="../notifications"><i class="fa fa-fw fa-bell-o"></i> Notifications
					<b class="notifications" id="notificationno"><?php echo $noofnotifications; ?></b></a>
                        </li>
					</ul>
                    <ul class="nav navbar-nav navbar-right hidden-xs">
                        <li><a href="../logout"> Logout<i class="fa fa-fw fa-power-off"></i></a>
                        </li>
                    </ul>

                   
                </div>

                <div> <ul class="nav navbar-nav hidden-lg hidden-md hidden-sm">
                        <li style="float:left !important;"><a href="../home" title="Home"><i class="fa fa-fw fa-home"></i></a>
                        </li>
                        <li style="float:left !important;"><a href="../activeplans" title="Active Events"><i class="fa fa-fw fa-camera"></i>  
                                                        <b class="notifications" id="activeplansno2"><?php echo $noofactiveplan; ?></b></a>
                        </li>
                    <li style="float:left !important;"><a href="../mybox" title="Box"><i class="fa fa-fw fa-inbox"></i>
                    <b class="notifications" id="boxno2"><?php echo $noofbox; ?></b></a>
                        </li>
                    <li style="float:left !important;"><a href="../notifications" title="Notifications"><i class="fa fa-fw fa-bell-o"></i> 
                    <b class="notifications" id="notificationno2"><?php echo $noofnotifications; ?></b></a>
                        </li>
                        <li style="float:left !important;"><a href="../logout"><i title="Log Out" class="fa fa-fw fa-power-off"> </i> 
                    </a>
                        </li>
                    </ul>
                    </div>