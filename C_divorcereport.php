
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
<small> Divorce Report </small>
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
<th>Date of Divorce</th>
<th>Summary of Divorce</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
    $sql="select * from divorceregistration ORDER BY marriage_id desc";
    $res=mysql_query($sql);
    while ($row=mysql_fetch_assoc($res)) {
    	$id=$row['marriage_id'];
        ?>
        <tr >
<td><?php echo $row['marriage_id'];?></td>
<td><?php echo $row['date_of_divorce'];?></td>
<td><?php echo $row['summery_of_divorce'];?></td>

<td>
<?php
		echo"<a href ='editdiv.php?id=$id'class='btn btn-defualt'>Edit</a>";
		

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