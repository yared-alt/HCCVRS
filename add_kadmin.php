

<?php
include('userhead.php');
?>
<body>
<div id="wrapper">
<?php
include('citynavbar.php');
?>
<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
<small><b>Add Kebele Adminstrator</b></small>
</h1>

</div>
</div>
<!-- /.row -->

<div class="row">
<div class="col-lg-12">

</div>
</div>
<!-- /.row -->


<!-- /.row -->

</div>
<!-- /.container-fluid -->
<div class="row">
<form  method="post" enctype="multipart/form-data" name="Res_reg">  
    <?php 
    if (isset($_POST['submit'])) {
     $con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);

  $fname=$_POST['fname']; 
  $mname=$_POST['mname'];
  $lname=$_POST['lname'];
  $password=$_POST['password'];
  $username=$_POST['uname'];
  $sex=$_POST['sex'];
  $photo=$_FILES['ph']['name'];
  $conf_password=$_POST['conf_password'];
  $user_type=$_POST['usertype'];
  $p_no=$_POST['pnumber'];
$target_path = 'uploads/'.basename( $_FILES['ph']['name']);  
  
if(move_uploaded_file($_FILES['ph']['tmp_name'], $target_path) && $password==$conf_password) { 

                $res=mysql_query("INSERT INTO `account`
                      (username, password, user_type, fname,mname, lname, phone, sex, photo) 
              VALUES ('$username','$password',
                    '$user_type','$fname','$mname',
                    '$lname','$p_no',
                    '$sex','$photo')"); 

if ($res>0) {
    ?>
    <div class="alert alert-success" style="width:500px;"><b>Account Created Successfully!</b></div>
<?php 
}else{
    ?>
    <div class="alert alert-danger" style="width:450px;"><b>Creating Account Faild!<br> Make Sure You Confirmed Your Password Correctly!</b></div>
    <?php   echo mysql_error();?>
<?php
}}
}
 
?>
<div class="col-lg-6">

                        
                           <div class="well">
                                <ol>
                                <label>First Name</label>
                                <input name="fname" type="text"  required="required" class="form-control" style="width:300px;"/>
                                <label>Middel Name</label>
                                <input name="mname" type="text" required="required" class="form-control" style="width:300px;"/>
                                <label>Last Name</label>
                                <input name="lname" type="text" required="required" class="form-control" style="width:300px;"/>
                                <label>UserName</label>
                                <input name="uname" type="text" required="required" class="form-control" style="width:300px;"/>
                                <div class="form-group">
                                <label>Passsword</label>
                                <input name="password" type="text" required="required" class="form-control" style="width:300px;"/>
                                <label>Confirm Passsword</label>
                                <input name="conf_password" type="text" required="required" class="form-control" style="width:300px;"/><br>
                                <label>Sex</label>
                                <label class="radio-inline">
                                    <input type="radio" name="sex" id="optionsRadiosInline1" value="Male">
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="sex" id="optionsRadiosInline2" value="Female">
                                </label><br />
                            </div>
                                <label>Age</label>
                                <input required="required" class="form-control" name"age" style="width:80px;">
                            
                        </div>
                
                </div>
                <div class="col-lg-6">
                     <div class="well">
                                <label>Insert Photo</label>
                                <input type="file" name="ph">
                        
                        
                                <label>User Type</label>
                                <select class="form-control"  required="required" name="usertype"  style="width:200px;">
                                    <option selected>Kebele_admin</option>
                                </select>
                            <br>
                                <label>Phone Number</label>
                                <input class="form-control" name="pnumber" type="tel" style="width:200px;"><br />
                                <input type="submit" name="submit" class="btn btn-primary" value="Create">

<input type="reset" name="reset" class="btn btn-success" value="Clear">


</ol>

                     </form>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
<?php
include'footer.php';
?>
</body>

</html>
