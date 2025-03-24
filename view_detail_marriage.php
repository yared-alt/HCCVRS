
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
<small> Marriage Report </small>
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
<th>Marriage Id</th>
<th>Marriage Date</th>
<th>Male Res-Id</th>
<th>Female Res-Id</th>
<th>City Res-Id</th>
<th>Visitors Name</th>
<th>Visitors Permannent</th>
<th>Visitors Phone No</th>
<th>Visitors Occupation</th>
<th>Visitors Age</th>
</tr>
</thead>
<tbody>
<?php
$con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
    $sql="select * from marriageregistration ORDER BY marriage_id desc";
    $res=mysql_query($sql);
    while ($row=mysql_fetch_assoc($res)) {
    	$id=$row['marriage_id'];
        ?>
        <tr >
<td><?php echo $row['marriage_id'];?></td>
<td><?php echo $row['marriage_date'];?></td>
<td><?php echo $row['maleresident_id'];?></td>
<td ><?php echo $row['femaleresident_id'];?></td>
<td><?php echo $row['city_resident_id'];?></td>
<td><?php echo $row['visitors_full_name'];?></td>
<td><?php echo $row['Visitors_permannent'];?></td>
<td ><?php echo $row['visitors_phone_no'];?></td>
<td><?php echo $row['visitors_occupation'];?></td>
<td><?php echo $row['visitors_age'];?></td>
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