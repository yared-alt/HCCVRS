
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
<small><b>Resident Report</b></small>
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
<th>Resident Id</th>
<th>Name</th>
<th>Photo</th>
<th>House NO</th>
<th>Age</th>
<th>Gender</th>
<th>Occupation</th>
<th>Religion</th>
</tr>
</thead>
<tbody>
<?php
$con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
    $sql="select * from residentregistration ORDER BY no desc";
    $res=mysql_query($sql);
    while ($row=mysql_fetch_assoc($res)) {
    	$id=$row['no'];
        ?>
        <tr >
<td><?php echo $row['resident_id'];?></td>
<td><?php echo $row['fname']." ".$row['mname']." ".$row['lname'];?></td>
<td><img src="<?php echo 'uploads/'.$row['photo'];?>" style="height:50px"></td>
<td><?php echo $row['house_no'];?></td>
<td ><?php echo $row['age'];?></td>
<td><?php echo $row['sex'];?></td>
<td><?php echo $row['occupation'];?></td>
<td><?php echo $row['religion'];?></td>
<?php
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