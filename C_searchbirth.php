
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
<small>Search Birth</small>
</h1>
</div>
</div>
<!-- /.row -->
<label>Search Birth</label>
<div class="form-group input-group">
<form name="search_form" method="post">
<div class="form-group">
<input type="text" placeholder="Enter Child ID or Name " name="searchin" class="form-control" required style="width:300px;" >
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
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr bgcolor="#3399FF">
<th>Child Id</th>
<th>Name</th>
<th>Photo</th>
<th>Date of Birth</th>
<th>Place of Birth</th>
<th>Birth Weight</th>
<th>Sex</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
    $search_id = $_POST['searchin'];
     $sql="select * from birthregistration where child_id='$id' || fname like '%$search_id%'";
    $res=mysql_query($sql);
    $row=mysql_fetch_assoc($res);
      if(empty($row)){
        ?>
        <tr><td colspan="30"><b>No Such Child Found!<b></td></tr> 
      <?php 
  }else{
    $id=$row['child_id'];
        ?>
        <tr >
<td><?php echo $row['child_id'];?></td>
<td><?php echo $row['fname']." ".$row['mname']." ".$row['lname'];?></td>
<td><img src="<?php echo 'uploads/'.$row['photo'];?>" style="height:30px"></td>
<td><?php echo $row['date_of_birth'];?></td>
<td><?php echo $row['place_of_birth'];?></td>
<td><?php echo $row['birth_weight'];?></td>
<td><?php echo $row['sex'];?></td>
<td>
<?php
        echo"<a href ='birthreport.php?id=$id'class='btn btn-defualt'>View</a>";
        echo"<a href ='editbirth.php?id=$id'class='btn btn-defualt'>Edit</a>";

    
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