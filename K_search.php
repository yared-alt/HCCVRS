
<?php
include 'userhead.php';
?>

<body>

    <div id="wrapper">
 <!-- Navigation -->
       <?php
       include 'usernavbar.php';
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
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr bgcolor="#fffaaa">
<th>Resident Id</th>
<th>Name</th>
<th>Photo</th>
<th>House NO</th>
<th>Age</th>
<th>Gender</th>
<th>Occupation</th>
<th>Religion</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$con=new mysqli('localhost','root','',"cvrs_db");
    $search_id = $_POST['searchin'];
     $sql="select * from residentregistration where resident_id='$id' || fname like '%$search_id%'";
     $stmt=$con->prepare($sql);
     $stmt->execute();
     $res=$stmt->get_result();
    $row=$res->fetch_assoc();
      if(empty($row)){
        ?>
        <tr><td colspan="30"><b>No Such Resident Found!<b></td></tr> 
      <?php 
  }else{
    $id=$row['no'];
        ?>
        <tr >
<td><?php echo $row['resident_id'];?></td>
<td><?php echo $row['fname']." ".$row['mname']." ".$row['lname'];?></td>
<td><img src="<?php echo 'uploads/'.$row['photo'];?>" style="height:30px"></td>
<td><?php echo $row['house_no'];?></td>
<td ><?php echo $row['age'];?></td>
<td><?php echo $row['sex'];?></td>
<td><?php echo $row['occupation'];?></td>
<td><?php echo $row['religion'];?></td>
<td>
<?php
        echo"<a href ='view_detail.php?id=$id'class='btn btn-defualt'>View</a>";
        echo"<a href ='edit_resident.php?id=$id'class='btn btn-defualt'>Edit</a>";

    
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