
<?php
session_start();
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
               <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="C_index.php"><b>City Adminstrator Panel</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>Haramaya City Civil And Vital Registration system </b></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;<b>Well come&nbsp;</b><?php echo $_SESSION['fname'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="C_Profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="C_pofile_setting.php"><i class="fa fa-fw fa-gear"></i>Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i>Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="C_index.php"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a>
                    </li>
                   <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> <b> Search </b> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                    <li>
                        <a href="C_search.php"><i class="fa fa-fw fa-desktop"></i> Resident Search</a>
                    </li>
                    <li>
                        <a href="C_searchbirth.php"><i class="fa fa-fw fa-desktop"></i> Birth Search</a>
                    </li>
                    <li>
                        <a href="C_searchdiv.php"><i class="fa fa-fw fa-desktop"></i> Divorce Search</a>
                    </li>
                    <li>
                        <a href="C_searchdeath.php"><i class="fa fa-fw fa-desktop"></i> Death Search</a>
                    </li>
                    <li>
                        <a href="C_searchmar.php"><i class="fa fa-fw fa-desktop"></i> Marriage Search</a>
                    </li>
                </li>
                </ul>
                    <li>
                        <a href="manage.php"><i class="fa fa-fw fa-wrench"></i>Manage Account</a>
                    </li>
                    <li>
                        <a href="C_res_view.php"><i class="fa fa-fw fa-bar-chart-o"></i>Resident Report</a>
                    </li>
                    <li>
                        <a href="C_transferreport.php"><i class="fa fa-fw fa-bar-chart-o"></i> Transfer Report</a>
                    </li>
                    <li>
                        <a href="C_birthreport.php"><i class="fa fa-fw fa-bar-chart-o"></i> Birth Report</a>
                    </li>
                    <li>
                        <a href="C_deathreport.php"><i class="fa fa-fw fa-bar-chart-o"></i> Death Report</a>
                    </li>
                    <li>
                        <a href="C_marriagereport.php"><i class="fa fa-fw fa-bar-chart-o"></i> Marriage Report</a>
                    </li>
                    <li>
                        <a href="C_divorcereport.php"><i class="fa fa-fw fa-bar-chart-o"></i> Divorce Report</a>
                    </li>
                    <li>
                        <a href="pop.php"><i class="fa fa-fw fa-bar-chart-o"></i> Population Distrbution</a>
                    </li>
                    <li>
                        <a href="message.php"><i class="fa fa-envelope"></i> Message &nbsp;<span style="color:#fff;background-color: red;border-radius: 50%;text-align: right;width:30px; ">
                            <?php
                                $con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
$up="select * from request where read_status='unread'";
$rup=  mysql_query($up);
$count=  mysql_num_rows($rup);
echo $count;
?>
                            </span></a>
                    </li>
                    </li>
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>