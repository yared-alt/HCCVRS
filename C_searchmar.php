
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
<div class="col-lg-4">
<h1 class="page-header">
<small>Search Marriage</small>
</h1>
</div>
</div>
<!-- /.row -->
<label>Search Marriage</label>
<div class="form-group input-group">
<form name="search_form" method="post">
<div class="form-group">
<input type="text" placeholder="Enter Marriage Id" name="searchin" class="form-control" required style="width:300px;" >
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
<th>Marriage Id</th>
<th>Male Res_id</th>
<th>Female Res_id</th>
<th>City Res_id</th>
<th>Marriage Date</th>
</tr>
</thead>
<tbody>
<?php
$con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
    $search_id = $_POST['searchin'];
     $sql="select * from marriageregistration where marriage_id='$id' ";
    $res=mysql_query($sql);
    $row=mysql_fetch_assoc($res);
      if(empty($row))
      {
?>
        <tr><td colspan="30"><b>No Such Marriage Found!<b></td></tr> 
        <?php 
  }else{
    $id=$row['marriage_id'];
        ?>
        <tr >
<td><?php echo $row['marriage_id'];?></td>
<td><?php echo $row['maleresident_id'];?></td>
<td><?php echo $row['femaleresident_id'];?></td>
<td><?php echo $row['city_resident_id'];?></td>
<td><?php echo $row['marriage_date'];?></td>

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