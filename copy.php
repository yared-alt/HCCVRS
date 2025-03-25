<?php 
session_start();
?>

<?php
include('userhead.php');
include('session.php');
?>
<body>
<div id="wrapper">
<?php
include('usernavbar.php');
?>
<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
<small><b>Birth Registration Form</b></small>
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
<form  method="post" enctype="multipart/form-data">  
    <?php 
    if (isset($_POST['submit'])) {
     $con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
$sql="select * from birthregistration";
$result=mysql_query($sql);
while ($row=mysql_fetch_assoc($result)) {
$res=$row['child_id'];
}
$ch=substr($res,0,2);
$num=substr($res,2,5);
$num=$num+1;
$year = substr(date('y'),-2);
$child_id=$ch.$num.'/'.$year;
  $fname=$_POST['fname']; 
  $mname=$_POST['mname'];
  $lname=$_POST['lname'];
  $child_sex= $_POST['child_sex'];
  $Place_of_Birth=$_POST['birpl'];
  
  
  $Birth_Weight=$_POST['birwei'];
  $Mother_Name=$_POST['mothname'];
  $Family_Religion =$_POST['freligion'];
  $Father_Occupation=$_POST['foccup'];
  $Mother_Occupation=$_POST['moccup'];
 $Mother_age=$_POST['mothage']; 
 $Father_age=$_POST['fathage']; 
 $Family_Phone_No=$_POST['usrtel'];
 $photo=$_FILES['pho']['name'];
$target_path = "C:/xampp/htdocs/HCCV/uploads"; 
$target_path = $target_path.basename( $_FILES['pho']['name']);   
  
if(move_uploaded_file($_FILES['pho']['tmp_name'], $target_path)) { 


                $res=mysql_query("INSERT INTO `birthregistration`
                      (child_id,
                      fname,mname,lname,sex,
                      place_of_birth,birth_weight,mother_name,
                      father_religion,father_occupation,mother_occupation,
                      mother_age,father_age,family_phone,photo) 

              VALUES ('$child_id','$fname',
                '$mname','$lname','$child_sex',
                '$Place_of_Birth','$Birth_Weight',
                '$Mother_Name','$Family_Religion',
                '$Father_Occupation','$Mother_Occupation',
                '$Mother_age','$Father_age','$Family_Phone_No',
                '$photo', now())"
                ); 

if ($res>0) {
    ?>
    <div class="alert alert-success"><b>Birth Registered Successfully</b></div>
<?php 
}else{
    ?>
    <div class="alert alert-danger"><b>Birth Registration Faild!</b></div>
<?php
}
}}
 
?>
<div class="col-lg-6">

                           <div class="form-group">
                                <label>Place of Birth</label>
                                <input class="form-control" required="required" type="text" name="birpl" style="width:250px;">
                                <label>First Name</label>
                                <input class="form-control" required="required" type="text" name="fname" style="width:300px;">
                                <label>Middel Name</label>
                                <input class="form-control" required="required" type="text" name="mname" style="width:300px;">
                                <label>Last Name</label>
                                <input class="form-control" required="required" type="text" name="lname" style="width:300px;"><br />
                              <lebel><b>Sex</b></lebel>
                              <select class="form-control" required="required" name="child_sex"  style="width:100px;">
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              </select>
                                <label>Birth Weight</label>
                                <input class="form-control" required="required" type="text" name="birwei" style="width:100px;">       
                        </div>
                </div>
                <div class="col-lg-6">
                                <label>Mother Full Name</label>
                                <input class="form-control" required="required" type="text" name="mothname" style="width:300px;">
                                
                                <label>Religion of Family</label>
                                <input class="form-control" required="required" type="text" name="freligion" style="width:250px;">
                                <label>Father's Occupation</label>
                                <input class="form-control" required="required" type="text" name="foccup" style="width:250px;">
                                <label>Mother's Occupation</label>
                                <input class="form-control" required="required" type="text" name="moccup" style="width:250px;">
                                <label>Mother's Age</label>
                                <input class="form-control" required="required" type="text" name="mothage" style="width:100px;">
                                <label>Father's Age</label>
                                <input class="form-control" required="required" type="text" name="fathage" style="width:100px;">

                                <b>Family Phone No:</b><br> <input type="tel" name="usrtel" required="required"><br><br />
                               <label>Insert Photo</label>
                               <input type="file" name="pho"/> <br />
                               <input type="submit" name="submit" class="btn btn-primary" value="Register">
                              <input type="reset" name="reset" class="btn btn-success" value="Clear">
                </div>
                        
                            </form>

</div>
</div>
</div>
</div>
</div>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php
include'footer.php';
?>