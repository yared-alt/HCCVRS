
<?php
include 'userhead.php';

?>

<body>

<div id="wrapper">
<?php
include 'usernavbar.php';
?>
<div id="page-wrapper">

<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
<small class="list-group-item active" style="width:1100px;"><b>Edit Birth Information<b></small>
</h1>
</div>
</div>
<!-- /.row -->

<div class="row">
<div class="col-lg-12">

</div>
</div>
<!-- Page Heading -->
<div class="row">
<form  method="post" enctype="multipart/form-data">  
    <?php 
    if (isset($_POST['submit'])) {
        
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
    $con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
       $id=$_GET['id'];  
      
     $res=mysql_query("update `birthregistration` SET fname='$fname',mname='$mname',lname='$lname',sex='$child_sex',
      place_of_birth='$Place_of_Birth',birth_weight='$Birth_Weight',mother_name='$Mother_Name',
      father_religion='$Family_Religion',father_occupation='$Father_Occupation',mother_occupation='$Mother_Occupation' where child_id='$id'"); 
if ($res>0) {

    ?>
    <div class="alert alert-success">Birth Infromation Updated Successfully!</div>
<?php 
}else{
  echo mysql_error();
    ?>
    <div class="alert alert-danger">Birth Infromation Updating Faild!</div>
<?php
}
}
$id=$_GET['id'];
$con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
    $sql="select * from birthregistration where child_id='$id'";
    $res=mysql_query($sql);
    $row=mysql_fetch_assoc($res); 
?>


<div class="form-group">
  <div class="form-group">

<div class="col-lg-6">
  <div class="well">
<label>First Name</label>
<input name="fname" type="text"  value="<?php echo $row['fname'];?>" required class="form-control" style="width:300px;"/>
<label>Middel Name</label>
<input name="mname" type="text" value="<?php echo $row['mname'];?>" required class="form-control" style="width:300px;"/>
<label>Last Name</label>
<input name="lname" type="text" value="<?php echo $row['lname'];?>"required class="form-control" style="width:300px;"/>
<lebel><b>Sex</b></lebel>
<select class="form-control" value="<?php echo $row['child_sex'];?>"required="required" name="child_sex"  style="width:100px;">
                              <option value="Male">Male</option>
                              <option value="Female">Female</option></select>

<label>Place of Birth</label><br />
<input value="<?php echo $row['place_of_birth'];?>" required class="form-control" type="text" name="birpl"  style="width:300px;"><br />

</div></div></div>
<div class="col-lg-6">
   <div class="well">
<label>Birth Weight</label>
<input value="<?php echo $row['birth_weight'];?>"class="form-control" name="birwei" type="text" style="width:300px;"><br />
<label>Mother Name</label>
<input value="<?php echo $row['mother_name'];?>" class="form-control" required="required" name="mothname" type="text" style="width:300px;"><br />
<label>Family Religion</label>
<input value="<?php echo $row['Family_Religion'];?>" class="form-control" required="required" name="freligion" type="text" style="width:300px;"><br />
<label>Father Occupation</label>
<input value="<?php echo $row['father_occupation'];?>" class="form-control" required="required" name="foccup" type="text" style="width:300px;"><br />
<label>Mother Occupation</label>
<input value="<?php echo $row['mother_occupation'];?>" class="form-control" required="required" name="moccup" type="text" style="width:300px;"><br />
<br>
<br>
<input type="submit" name="submit" class="btn btn-primary" value="Update Birth">
<a href="birthreport.php"   class="btn btn-success" >back to Resident</a>
</div>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br><br><br>
<br>

</div>
    
</form>




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