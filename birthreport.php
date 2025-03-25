
<?php
include('userhead.php');
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
<small> </b>Birth Report </b></small>
</h1>
</div>
</div>
</div>
<!-- /.container-fluid -->
<div class="row">
<div class="col-lg-12">


<div class="panel-body">
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr bgcolor="#3399FF">
<th>Child Id</th>
<th>Name</th>
<th>Photo</th>
<th>Gender</th>
<th>Date of Birth</th>
<th>Family Phone No</th>
<th>Mother Name</th>
<th>Father Occupation</th>
<th>Mother Occupation</th>
<th>Birth Weight</th>
<th>Birth Place</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$con=new mysqli('localhost','root','',"cvrs_db");
    $sql="select * from birthregistration ORDER BY child_id desc";
    $stmt=$con->prepare($sql);
    $stmt->execute();
    $res=$stmt->get_result();
    while ($row=$res->fetch_assoc()) {
    	$id=$row['child_id'];
        ?>
        <tr >
<td><?php echo $row['child_id'];?></td>
<td><?php echo $row['fname']." ".$row['mname']." ".$row['lname'];?></td>
<td><img src="<?php echo 'uploads/'.$row['photo'];?>" style="height:50px"></td>
<td><?php echo $row['sex'];?></td>
<td ><?php echo $row['date_of_birth'];?></td>
<td ><?php echo $row['family_phone'];?></td>
<td><?php echo $row['mother_name'];?></td>
<td><?php echo $row['father_occupation'];?></td>
<td><?php echo $row['mother_occupation'];?></td>
<td><?php echo $row['birth_weight'];?></td>
<td><?php echo $row['place_of_birth'];?></td>
<td>
<?php
		
		echo"<a href ='editbirth.php?id=$id'class='btn btn-defualt'>Edit</a>";
	?>
</tr>
    <?php
}
?>


</tbody>
</table>
</div>

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