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
                <a class="navbar-brand" href="K_index.php"><b>Kebele Adminstrator Panel</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>Haramaya City Civil And Vital Registration system </b></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp; <b>Well come&nbsp;</b><b><?php echo $_SESSION['fname'];?></b> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>

                            <a href="K_profile.php"><i class="fa fa-fw fa-user"></i> <b>Profile</b></a>
                        </li>
                        <li>
                            <a href="K_profile_setting.php"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> <b>Log Out</b></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="K_index.php"><i class="fa fa-fw fa-dashboard"></i><b>Dashboard</b></a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> <b>Regestration And Search </b> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                        <a href="Reg_res.php"><i class="fa fa-fw fa-edit"></i> <b>Regester Resident</b></a>
                    </li>
                            <li>
                        <a href="Reg_b.php"><i class="fa fa-fw fa-edit"></i> <b>Regester Birth</b></a>
                    </li>
                    <li>
                        <a href="Reg_m.php"><i class="fa fa-fw fa-edit"></i> <b>Regester Marrige</b></a>
                    </li>
                    <li>
                        <a href="Reg_dz.php"><i class="fa fa-fw fa-edit"></i> <b>Regester Death</b></a>
                    </li>
                    <li>
                        <a href="Reg_dv.php"><i class="fa fa-fw fa-edit"></i> <b>Regester Devorce</b></a>
                    </li>
<li>
                        <a href="K_search.php"><i class="fa fa-fw fa-desktop"></i> <b>Search Resident</b></a>
                    </li>
                    <li>
                        <a href="searchbirth.php"><i class="fa fa-fw fa-desktop"></i> <b>Search Birth</b></a>
                    </li>
                    <li>
                        <a href="searchdeath.php"><i class="fa fa-fw fa-desktop"></i> <b>Search Death</b></a>
                    </li>
                    <li>
                        <a href="searchmar.php"><i class="fa fa-fw fa-desktop"></i> <b>Search Marrige</b></a>
                    </li>
                    <li>
                        <a href="searchdiv.php"><i class="fa fa-fw fa-desktop"></i> <b>Search Divorce</b></a>
                    </li>
                    </li>
                    
                        </ul>
                       
                    
                    
                    <li>
                        <a href="view.php"><i class="fa fa-fw fa-bar-chart-o"></i> <b>Resident Report</b></a>

                    </li>
                    <li>
                        <a href="transfer.php"><i class="fa fa-fw fa-edit"></i> <b>Resident Transfer</b></a>
                    <li>
                        <a href="birthreport.php"><i class="fa fa-fw fa-bar-chart-o"></i> <b>Birth Report</b></a>
                    </li>
                    <li>
                        <a href="K_marriagereport.php"><i class="fa fa-fw fa-bar-chart-o"></i> <b>Marrige Report</b></a>
                    </li>
                    <li>
                        <a href="K_divorcereport.php"><i class="fa fa-fw fa-bar-chart-o"></i> <b>Divorce Report</b></a>
                    </li>
                    <li>
                        <a href="deathreport.php"><i class="fa fa-fw fa-bar-chart-o"></i> <b>Death Report</b></a>
                    </li>
                    <li>
                        <a href="K_pop.php"><i class="fa fa-fw fa-bar-chart-o"></i> <b>Population Distribution</b></a>
                    </li>
                    </li>

                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>