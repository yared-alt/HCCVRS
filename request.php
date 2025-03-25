
<?php
include 'userhead.php';
include 'session.php';
?>

<body>

    <div id="wrapper">
 <!-- Navigation -->
       <?php
       include 'res_nav.php';
       ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                </div>
                <!-- /.row -->

                <div class="row" style="height:600px">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small class="list-group-item active" style="width:1000px;"><b>Request for Vital Certificate</b></small>
                        </h1>
                    
                    
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#home-pills" data-toggle="tab">Birth Certificate</a>
                                </li>
                                <li><a href="#profile-pills" data-toggle="tab">Death Certificate</a>
                                </li>
                                <li><a href="#messages-pills" data-toggle="tab">Marriage Certificate</a>
                                </li>
                                <li><a href="#settings-pills" data-toggle="tab">Divorce Certificate</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home-pills" style="padding-left: 20%">
                                    <h4>&nbsp;</h4>
                                    <form action="#" name="br_req" method="post">
                                        <?php
                                        if(isset($_POST['birth'])){
                                          $id=$_SESSION['id'];
                                          $type="birth";
                                          $status="sent";
                                           $con=mysql_connect('localhost','root','');
                                          mysql_select_db("cvrs_db",$con);
                                           $res=mysql_query("INSERT INTO `request`(resident_id,request_type,status,request_date) 
         VALUES ('$id','$type','$status',now())"); 

                                        }
                                        ?>
                                        <?php
                                        $id=$_SESSION['id'];
                                          $type="birth";
                                          $con=mysql_connect('localhost','root','');
                                          mysql_select_db("cvrs_db",$con);
$sql="select * from request where resident_id='$id' and request_type='birth'";
$result=mysql_query($sql);
while ($row=mysql_fetch_assoc($result)) {
$res=$row['resident_id'];
}
  if(empty($res)){
      ?>
                                         <input type="submit" class="btn btn-info "  name="birth" value="Request Birth Certificate">
                            
                                    <?php
                                    
                                    
  } else{
      ?>
                                         <input type="submit" class="btn btn-info disabled"  value="Birth Request Already Sent">
                            <?php
  }                                    
    ?>                         </form>
                                </div>
                                <div class="tab-pane fade" id="profile-pills" style="padding-left: 20%">
                                           <h4>&nbsp;</h4>
                                    <form action="#" name="br_req" method="post">
                                        <?php
                                        if(isset($_POST['death'])){
                                          $id=$_SESSION['id'];
                                          $type="death";
                                          $status="sent";
                                           $con=mysql_connect('localhost','root','');
                                          mysql_select_db("cvrs_db",$con);
                                           $res=mysql_query("INSERT INTO `request`(resident_id,request_type,status,request_date) 
         VALUES ('$id','$type','$status',now())"); 

                                        }
                                        ?>
                                        <?php
                                        $id=$_SESSION['id'];
                                          
                                          $con=mysql_connect('localhost','root','');
                                          mysql_select_db("cvrs_db",$con);
$sql="select * from request where resident_id='$id' and request_type='death'";
$d=mysql_query($sql);
while ($row=mysql_fetch_assoc($d)) {
$death=$row['resident_id'];
}
  if(empty($death)){
      ?>
                                         <input type="submit" class="btn btn-danger "  name="death" value="Request Death Certificate">
                            
                                    <?php
                                    
                                    
  } else{
      ?>
                                         <input type="submit" class="btn btn-danger disabled"  value="Death Request Already Sent">
                            <?php
  }                                    
    ?>                         </form>
                                </div>
                                <div class="tab-pane fade" id="messages-pills" style="padding-left: 20%">
                                           <h4>&nbsp;</h4>
                                    <form action="#" name="br_req" method="post">
                                        <?php
                                        if(isset($_POST['marriage'])){
                                          $id=$_SESSION['id'];
                                          $type="marriage";
                                          $status="sent";
                                           $con=mysql_connect('localhost','root','');
                                          mysql_select_db("cvrs_db",$con);
                                           $res=mysql_query("INSERT INTO `request`(resident_id,request_type,status,request_date) 
         VALUES ('$id','$type','$status',now())"); 

                                        }
                                        ?>
                                        <?php
                                        $id=$_SESSION['id'];
                                          $type="marriage";
                                          $con=mysql_connect('localhost','root','');
                                          mysql_select_db("cvrs_db",$con);
$sql="select * from request where resident_id='$id' and request_type='marriage'";
$m=mysql_query($sql);
while ($row=mysql_fetch_assoc($m)) {
$ma=$row['resident_id'];
}
  if(empty($ma)){
      ?>
                                         <input type="submit" class="btn btn-success "  name="marriage" value="Request Marriage Certificate">
                            
                                    <?php
                                    
                                    
  } else{
      ?>
                                         <input type="submit" class="btn btn-success disabled"  value="Marriage Request Already Sent">
                            <?php
  }                                    
    ?>                         </form>    
                                </div>
                                <div class="tab-pane fade" id="settings-pills" style="padding-left: 20%">
                                           <h4>&nbsp;</h4>
                                    <form action="#" name="br_req" method="post">
                                        <?php
                                        if(isset($_POST['divorce'])){
                                          $id=$_SESSION['id'];
                                          $type="divorce";
                                          $status="sent";
                                           $con=mysql_connect('localhost','root','');
                                          mysql_select_db("cvrs_db",$con);
                                           $res=mysql_query("INSERT INTO `request`(resident_id,request_type,status,request_date) 
         VALUES ('$id','$type','$status',now())"); 

                                        }
                                        ?>
                                        <?php
                                        $id=$_SESSION['id'];
                                          $type="divorce";
                                          $con=mysql_connect('localhost','root','');
                                          mysql_select_db("cvrs_db",$con);
$sql="select * from request where resident_id='$id' and request_type='divorce'";
$di=mysql_query($sql);
while ($row=mysql_fetch_assoc($di)) {
$divo=$row['resident_id'];
}
  if(empty($divo)){
      ?>
                                         <input type="submit" class="btn btn-warning "  name="divorce" value="Request Divorc Certificate">
                            
                                    <?php
                                    
                                    
  } else{
      ?>
                                         <input type="submit" class="btn btn-warning disabled"  value="Divorce Request Already Sent">
                            <?php
  }                                    
    ?>                         </form>   
                                </div>
                            </div>
                            </div>
                      
                    <!-- /.panel -->
                </div>
                    
                    </div>
                </div>
                <!-- /.row -->
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
include 'footer.php';
?>
