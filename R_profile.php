
<?php
include 'userhead.php';
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
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Your Account Profile:</small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                        <?php
$accout_id=$_SESSION['res_loged'];
$con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
    $sql="select * from account where account_id='$accout_id'";
    $res=mysql_query($sql);
    
    $row=mysql_fetch_assoc($res);
           
        ?>
         <div class="col-lg-4" > 
        Full Name
        </div>
        <div class="col-lg-8" >
        <?php echo $row['fname']." ".$row['mname']." ".$row['lname'];?>
        </div>
         <div class="col-lg-4" >
            Profile Picture
        </div>
        <div class="col-lg-8" >
        <img src="<?php echo 'uploads/'.$row['photo'];?>" style="height:100px">
        </div>
         <div class="col-lg-4" >
       Username
        </div>
        <div class="col-lg-8" >
        <?php echo $row['username'];?>
        </div>
         <div class="col-lg-4" >
        
        <br><br><br /><br />
        </h4></b>
        <?php
    
    ?>

                        <form action="K_profile_setting.php" name="setting" method="post">
                            <div class="form-group">
                         
                         <label></label></b><br /><br />
                            </div></div>

                    <div class="col-lg-6">
                        <div class="form-group">
                    <br>
</div>
                </div>
                        
                            </form>
                            </div>
            </div>
       </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    </div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
