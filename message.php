
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
<div class="row" style="height:600px">
<div class="col-lg-12">
<h1 class="page-header">
<small><b>Requested Certificate</b></small>
</h1>
<?php
?>
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr bgcolor="#fffaaa">
<th>Resident Id</th>
<th>Request Type</th>

<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
     $sql="select * from request where read_status='unread'";
    $res=mysql_query($sql);
    
      
      while ($row=mysql_fetch_assoc($res)){
    $id=$row['resident_id'];
    $type=$row['request_type'];
        ?>
        <tr >
<td><?php echo $row['resident_id'];?></td>
<td><?php echo $row['request_type'];?></td>
<td>
<?php
      
        echo"<a href ='city_certificate.php?id=$id&type=$type' class='btn btn-defualt'>View</a>";

    
    ?>


</tr>
    <?php
  }
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