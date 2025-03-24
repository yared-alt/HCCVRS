
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
<small class="list-group-item active" style="width:525px;"><b>Update Resident Information</b></small>
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
  $houseno=$_POST['houseno'];
  $age=$_POST['age'];
  $es=$_POST['es'];
  $occupation=$_POST['occupation'];
  $religion=$_POST['religion'];
    $con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
       $id=$_GET['id'];  
      
     $res=mysql_query("update `residentregistration` SET fname='$fname',mname='$mname',lname='$lname',house_no='$houseno',age='$age',educational_status='$es',occupation='$occupation',religion='$religion' where no='$id'"); 
if ($res>0) {
    ?>
    <div class="alert alert-success">Resident Infromation Updated Successfully!</div>
<?php 
}else{
  echo mysql_error();
    ?>
    <div class="alert alert-danger">Resident Infromation Updating Faild!</div>

<?php
}
}
$id=$_GET['id'];
$con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
    $sql="select * from residentregistration where no='$id'";
    $res=mysql_query($sql);
    $row=mysql_fetch_assoc($res); 
?>


<div class="form-group">
<div class="form-group">
  <ol>
<div class="well">
<label>First Name</label>
<input name="fname" type="text"  value="<?php echo $row['fname'];?>" required class="form-control" style="width:300px;"/>
<label>Middel Name</label>
<input name="mname" type="text" value="<?php echo $row['mname'];?>" required class="form-control" style="width:300px;"/>
<label>Last Name</label>
<input name="lname" type="text" value="<?php echo $row['lname'];?>"required class="form-control" style="width:300px;"/>
<label>House No</label>
<input class="form-control" value="<?php echo $row['house_no'];?>" required type="text" name="houseno" style="width:300px;"><br />
<label>Age</label><br />
<input value="<?php echo $row['age'];?>" required class="form-control" type="number" name="age" min="1" max="200"  style="width:100px;"><br />

</div></div></div>
  <div class="well">

<label>Educational Status</label>
<select class="form-control" name="es"  style="width:300px;">
<option value="<?php echo $row['fname'];?>"><?php echo $row['educational_status'];?></option>
<option value="Elementary">Elementary</option>
<option value="High School">High School</option>
<option value="Preparatory">Preparatory</option>
<option value="Diploma/10+">Diploma/10+</option>
<option value="Digree">Digree</option>
<option value="Masters">Masters</option>
<option value="PHD">PHD</option>
<option value="Other">Other</option>
</select><br />
<label>Occupation</label>
<input value="<?php echo $row['occupation'];?>"class="form-control" name="occupation" type="text" style="width:300px;"><br />
<label>Religion</label>
<input value="<?php echo $row['religion'];?>" class="form-control" required="required" name="religion" type="text" style="width:300px;"><br />


<br>
<br>
<input type="submit" name="submit" class="btn btn-primary" value="Update Resident">
<a href="view.php"   class="btn btn-success" >Back to Resident</a>
</ol>
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