
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
<small> <b>Resident Report </b></small>
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
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
// $con=new mysqli('localhost','root','',"cvrs_db");
//     $sql="select * from residentregistration ORDER BY no desc";
//     $res=mysql_query($sql);
//     while ($row=mysql_fetch_assoc($res)) {
//     	$id=$row['no'];
        
$con = new mysqli('localhost', 'root', '', 'cvrs_db');
// Check for connection errors
if ($con->connect_error) {
    die('Could not connect: ' . $con->connect_error);
}
// SQL query to select data
$sql = "SELECT * FROM residentregistration ORDER BY no DESC";
// Prepare the statement
$stmt = $con->prepare($sql);
// Execute the query
$stmt->execute();
// Get the result
$result = $stmt->get_result();
// Fetch data and process it
while ($row = $result->fetch_assoc()) {
    $id = $row['no'];
    // Process the row data as needed
    echo "ID: " . $id . "<br>";
}
$stmt->close();
$con->close();
        ?>
        <tr >
<td><?php
if (isset($row['resident_id'])) {
    echo $row['resident_id'];
 }else {
     echo 'data not found!!1';
 }
?></td>
<td><?php 
if (isset($row['fname'])) {
   echo $row['fname'];
}else {
    echo 'data not found!!1';
}

if (isset($row['mname'])) {
    echo $row['mname'];
 }else {
     echo 'data not found!!1';
 }

 if (isset($row['lname'])) {
    echo $row['lname'];
 }else {
     echo 'data not found!!1';
 }
//  echo $row['fname']." ".$row['mname']." ".$row['lname'];
?></td>
<td><img src="<?php echo 'uploads/'.$row['photo'];?>" style="height:50px"></td>
<td><?php 
 if (isset($row['house_no'])) {
    echo $row['house_no'];
 }else {
     echo 'data not found!!1';
 }
?>
</td>

<td ><?php
if (isset($row['age'])) {
    echo $row['age'];
 }else {
     echo 'data not found!!1';
 }
?></td>
<td><?php 
if (isset($row['sex'])) {
    echo $row['sex'];
 }else {
     echo 'data not found!!1';
 }
?></td>
<td><?php 
if (isset($row['occupation'])) {
    echo $row['occupation'];
 }else {
     echo 'data not found!!1';
 }
?></td>
<td><?php
if (isset($row['religion'])) {
    echo $row['religion'];
 }else {
     echo 'data not found!!1';
 }
?></td>
<td>
<?php
		echo"<a href ='view_detail.php?id=$id'class='btn btn-defualt'>View</a>";
		echo"<a href ='edit_resident.php?id=$id'class='btn btn-defualt'>Edit</a>";
	?>
</tr>
    <?php

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