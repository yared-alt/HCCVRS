
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
<small> Death Report </small>
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
</tr>
</thead>
<tbody>
<?php
$con=new mysqli('localhost','root','',"cvrs_db");
    $sql="select * from deathregistration ORDER BY resident_id desc";
    $stetment=$con->prepare($sql);
    $res=$stetment->get_result();
    while ($row=$res->fetch_assoc()) {
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