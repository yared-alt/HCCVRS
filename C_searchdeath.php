
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
<small>Search Death</small>
</h1>
</div>
</div>
<!-- /.row -->
<label>Search Death</label>
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
  <div class="table-responsive">
<table class="table table-bordered table-hover table-striped" id="dataTables-example">
<thead>

<th class="active">Resident Id</th>
<th class="success">Name</th>
<th class="warning">Sex</th>
<th class="danger">Age</th>
<th class="active">Date of Death</th>
<th class="success">Place of Death</th>
<th class="warning">Death Summery</th>
</tr>
</thead>
<tbody>
<?php
$con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
    $search_id = $_POST['searchin'];
     $sql="select * from deathregistration where resident_id='$id' || f_name like '%$search_id%'";
    $res=mysql_query($sql);
    $row=mysql_fetch_assoc($res);
      if(empty($row)){
        ?>
        <tr><td colspan="30"><b>No Such Death Found!<b></td></tr> 
      <?php 
  }else{
    $id=$row['resident_id'];
        ?>
        <tr >
<td><?php echo $row['resident_id'];?></td>
<td><?php echo $row['f_name']." ".$row['m_name']." ".$row['l_name'];?></td>
<td><?php echo $row['Sex'];?></td>
<td><?php echo $row['age'];?></td>
<td><?php echo $row['date_of_death'];?></td>
<td><?php echo $row['place_of_death'];?></td>
<td><?php echo $row['summery_of_death'];?></td>

<?php
      
    
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