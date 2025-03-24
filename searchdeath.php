
<?php
include 'userhead.php';
?>

<body>

    <div id="wrapper">
 <!-- Navigation -->
       <?php
       include 'usernavbar.php';
       ?>
        <div id="page-wrapper">

            <div class="container-fluid">
<!-- Page Heading -->
<div class="row"n>
<div class="col-lg-12">
<h1 class="page-header">
<small>Search Daeth</small>
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
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr bgcolor="#fffaaa">
<th>Resident Id</th>
<th>Name</th>
<th>Sex</th>
<th>Age</th>
<th>Date of Death</th>
<th>Place of Death</th>
<th>Death Summery</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$con=new mysqli('localhost','root','',"cvrs_db");
    $search_id = $_POST['searchin'];
     $sql="select * from deathregistration where resident_id='$id' || f_name like '%$search_id%'";
     $stmt=$con->prepare($sql);
     $stmt->execute();
     $res=$stmt->get_result();
    $row=$res->fetch_assoc();
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

<td>
<?php
      
        echo"<a href ='editdeath.php?id=$id'class='btn btn-defualt'>Edit</a>";

    
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