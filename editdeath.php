

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
<small class="list-group-item active" style="width:525px;">Edit Death Information</small>
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
        
  $Death_place=$_POST['deathplace']; 
  $Death_date=$_POST['dd'];
  $Informant_FullName=$_POST['informantname'];
  $Summray_Death=$_POST['deathsum'];

    $con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
       $id=$_GET['id'];  
      
 $res=mysql_query("update `deathregistration` SET place_of_death='$Death_place',date_of_death='$Death_date',informant_name='$Informant_FullName',summery_of_death='$Summray_Death' where resident_id='$id'"); 
if ($res>0) {
    ?>
    <div class="alert alert-success">Death Infromation Updated Successfully!</div>
<?php 
}else{
    ?>
    <div class="alert alert-danger">Death Infromation Updating Faild!</div>
<?php
}
}
$id=$_GET['id'];
$con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
    $sql="select * from deathregistration where resident_id='$id'";
    $res=mysql_query($sql);
    $row=mysql_fetch_assoc($res); 
?>


<div class="form-group">
<div class="form-group">
  <ol>
<div class="col-lg-6">
<label>Place of Death</label>
<input name="deathplace" type="text"  value="<?php echo $row['place_of_death'];?>" required class="form-control" style="width:300px;"/>
<label>Date of Death</label>
<input name="dd" type="date" value="<?php echo $row['date_of_death'];?>" required class="form-control" style="width:300px;"/>
<label>Informant_FullName</label>
<input name="informantname" type="text" value="<?php echo $row['informant_name'];?>"required class="form-control" style="width:300px;"/>
<label>Summery of Death</label>
<textarea class="form-control" value="<?php echo $row['summery_of_death'];?>" required type="text" name="deathsum" style="width:300px;"></textarea><br />

<br>
<br>
<input type="submit" name="submit" class="btn btn-primary" value="Update Death">
<a href="deathreport.php"   class="btn btn-success" >back to Death</a>
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