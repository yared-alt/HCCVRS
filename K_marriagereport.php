
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
<th>Male Resident Id</th>
<th>Female Resident Id</th>
</tr>
</thead>
<tbody>
<?php
$con= new mysqli('localhost','root','',"cvrs_db");
    $sql="select * from marriageregistration ORDER BY marriage_id desc";
    $stetment=$con->prepare($sql);
    $stetment->execute();

    $result=$stetment->get_result();
    while ($row=$result->fetch_assoc()) {
    	$id=$row['marriage_id'];
        ?>
        <tr >
<td><?php echo $row['marriage_id'];?></td>
<td><?php echo $row['marriage_date'];?></td>
<td><?php echo $row['maleresident_id'];?></td>
<td ><?php echo $row['femaleresident_id'];?></td>
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