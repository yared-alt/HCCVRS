
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
<small> <b>Death Report</b> </small>
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
<th>Sex</th>
<th>Age</th>
<th>Place of Death</th>
<th>Date of Death</th>
<th>Summary of Death</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
    $sql="select * from deathregistration ORDER BY resident_id desc";
    $res=mysql_query($sql);
    while ($row=mysql_fetch_assoc($res)) {
    	$id=$row['resident_id'];
        ?>
        <tr >
<td><?php echo $row['resident_id'];?></td>
<td><?php echo $row['f_name']." ".$row['m_name']." ".$row['l_name'];?></td>
<td><?php echo $row['Sex'];?></td>
<td><?php echo $row['age'];?></td>
<td><?php echo $row['place_of_death'];?></td>
<td ><?php echo $row['date_of_death'];?></td>
<td ><?php echo $row['summery_of_death'];?></td>
<td>
<?php
		
		echo"<a href ='editdeath.php?id=$id'class='btn btn-defualt'>Edit</a>";
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