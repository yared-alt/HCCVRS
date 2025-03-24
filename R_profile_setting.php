
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

                <form  method="post" enctype="multipart/form-data" name="account_setting">  
    <?php 
    if (isset($_POST['submit'])) {
$con=mysql_connect('localhost','root','');
mysql_select_db("cvrs_db",$con);
  $uname=$_POST['change_uname']; 
  $pass=$_POST['password'];
  $conf_password=$_POST['conf_password'];
  $id=$_SESSION['res_loged'];
  $pho=$_POST['ph'];
    
    $target_path = 'uploads/'.basename( $_FILES['ph']['name']);  
  
if(move_uploaded_file($_FILES['ph']['tmp_name'], $target_path) && $pass==$conf_password) { 
    
      
     $res=mysql_query("update `account` SET username='$uname',password='$pass',photo='$pho', where account_id='$id'"); 
if ($res>0) {
    ?>
    <div class="alert alert-success" style="width:450px;">Your Account Updated Successfully!</div>
<?php 
}}}else{
    
    echo "<div class='alert alert-danger' style='width:450px;'>Account Updating Faild!</div>";
}?>
                <div class="row">
                    <div class="col-lg-6">
                        
                            <div class="form-group">
                         <br /><img class="img-thumbnail" border="0" src="images\prof1.png" alt="Death" width="150" height="150"></b><br />
                         <label>Change your Profile Picture</label></b><br /><br />
                            <label>Upload Profile Picture</label><br />
                                <input type="file" value="Profile Picture" name="photo"><br />
                                <div>
                                </div></div></div>

                    <div class="col-lg-6">
                        <div class="form-group">
                         <label>Change Username And Password</label></b><br />
                         <label>New UserName</label>
                        <input name="change_uname" type="text" required="required" placeholder="Enter new username" class="form-control" style="width:300px;"/>
                        <label> New Passsword</label>
                        <input name="password" type="text" required="required" placeholder="Enter new password"required class="form-control" style="width:300px;"/>
                        <label>Confirm Passsword</label>
                        <input name="conf_password" type="text" required="required" placeholder="Confirm new password"  class="form-control" style="width:300px;"/>
                        <br><br>
                                <input type="submit"  name="save" value="Save Changes" class="btn btn-primary">
                                <input type="reset" name="reset" class="btn btn-success" value="Clear">
                                <a href="K_profile.php" class="btn btn-primary" >Back</a>
</div>
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
