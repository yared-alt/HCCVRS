
<?php
include 'userhead.php';
?>

<body>

    <div id="wrapper">
 <!-- Navigation -->
       <?php
       include 'citynavbar.php';
       ?>
        <div id="page-wrapper">

            <div class="container-fluid">
<!-- Page Heading -->
<div class="row"n>
<div class="col-lg-12">
<h1 class="page-header">
<small>Search Resident</small>
</h1>
</div>
</div>
<!-- /.row -->
<label>Search Resident</label>
<div class="form-group input-group">
<form name="search_form" method="post">
<div class="form-group">
<input type="text" placeholder="Enter Resident ID or Name " name="searchin" class="form-control" required style="width:300px;" >
<span class="input-group-btn"><button name="search"class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></span>
</div>
</div>

</form>
</div>
<?php
if(isset($_POST['search'])){
    $id=$_POST['searchin'];
    ?>

<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped" id="dataTables-example">
<thead>
<tr>
<th class="success">Resident Id</th>
<th class="success">Name</th>
<th class="success">Photo</th>
<th class="success">House NO</th>
<th class="success">Age</th>
<th class="success">Gender</th>
<th class="success">Occupation</th>
<th class="success">Religion</th>
</tr>
</thead>
<tbody>
<?php
$con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
    $search_id = $_POST['searchin'];
     $sql="select * from residentregistration where resident_id='$id' || fname like '%$search_id%'";
    $res=mysql_query($sql);
    $row=mysql_fetch_assoc($res);
      if(empty($row)){
        ?>
        <tr><td colspan="30"><b>No Such Resident Found!<b></td></tr> 
      <?php 
  }else{
    $id=$row['no'];
        ?>
        <tr >
<td class="warning"><?php echo $row['resident_id'];?></td>
<td class="warning"><?php echo $row['fname']." ".$row['mname']." ".$row['lname'];?></td>
<td class="warning"><img src="<?php echo 'uploads/'.$row['photo'];?>"class="img-thumbnail" style="height:50px"></td>
<td class="warning"><?php echo $row['house_no'];?></td>
<td class="warning"><?php echo $row['age'];?></td>
<td class="warning"><?php echo $row['sex'];?></td>
<td class="warning"><?php echo $row['occupation'];?></td>
<td class="warning"><?php echo $row['religion'];?></td>

<?php

    
    ?>


</tr>
    <?php
}}
?>


</tbody>
</table>
</div>
</div>
<div class="row">
<div class="col-lg-12">

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
include'footer.php';
?>