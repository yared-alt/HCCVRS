<?php
include('userhead.php');
?>

<body>

<div id="wrapper">
<?php
include ('usernavbar.php');
?>

<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
<b>Population Distribution<b><br /><small>Major Population Related Information</small>
</h1>
</div>
</div>
<!-- /.row -->

<div class="row">
<div class="col-lg-12">

</div>
</div>
<!-- /.row -->


<!-- /.row -->

</div>
<!-- /.container-fluid -->
<?php
$con=new mysqli("localhost","root","","cvrs_db");
?>
<div class="row">
<div class="col-sm-4">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Total Number Of Residents</h3>
</div>
<div class="panel-body">
<?php
$sql="select * from residentregistration where kebele_no='k01'";
$stetment=$con->prepare($sql);
$stetment->execute();
$result=$stetment->get_result();
$num=$result->num_rows;
echo $num;
?>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Residents Below 18</h3>
</div>
<div class="panel-body">
<?php
$sql="select * from residentregistration where kebele_no='k01' AND age<18";
$stetment=$con->prepare($sql);
$stetment->execute();
$result=$stetment->get_result();
$num=$result->num_rows;
echo $num;
?>
</div>
</div>
</div>
<!-- /.col-sm-4 -->
<div class="col-sm-4">
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">Total Number of Males</h3>
</div>
<div class="panel-body">
<?php
$sql="select * from residentregistration where kebele_no='k01' AND sex='male'";
$stetment=$con->prepare($sql);
$stetment->execute();
$result=$stetment->get_result();
$num=$result->num_rows;
echo $num;
?>
</div>
</div>
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">Residents Above18</h3>
</div>
<div class="panel-body">
<?php
$sql="select * from residentregistration where kebele_no='k01' AND age>=18";
$stetment=$con->prepare($sql);
$stetment->execute();
$result=$stetment->get_result();
$num=$result->num_rows;
echo $num;
?>
</div>
</div>
</div>
<!-- /.col-sm-4 -->
<div class="col-sm-4">
<div class="panel panel-danger">
<div class="panel-heading">
<h3 class="panel-title">Total Number of Females</h3>
</div>
<div class="panel-body">
<?php
$sql="select * from residentregistration where kebele_no='k01' AND sex='female'";
$stetment=$con->prepare($sql);
$stetment->execute();
$result=$stetment->get_result();
$num=$result->num_rows;
echo $num;
?>
</div>
</div>
<div class="panel panel-danger">


</div>
</div>
<!-- /.col-sm-4 -->
<div class="col-sm-4">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Number of Registered Houses in K_01</h3>
</div>
<div class="panel-body">
<?php
$sql="select * from house where kebele_no='k01'";
$stetment=$con->prepare($sql);
$stetment->execute();
$result=$stetment->get_result();
$num=$result->num_rows;
echo $num;
?>
</div>
</div>
</div>
<!-- /.col-sm-4 -->
<div class="col-sm-4">
<div class="panel panel-info">


</div>
</div>
<!-- /.col-sm-4 -->
<div class="col-sm-4">
<div class="panel panel-danger">


</div>
</div>

<div class="col-sm-4">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Married Resident</h3>
</div>
<div class="panel-body">
<?php
$sql="select * from marriageregistration";
$stetment=$con->prepare($sql);
$stetment->execute();
$result=$stetment->get_result();
$num=$result->num_rows;
echo $num;
?>
</div>
</div>
</div>

<div class="col-sm-4">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Number of Scholar</h3>
</div>
<div class="panel-body">
<?php
$sql="select * from residentregistration where kebele_no='k01' AND educational_status='Digree'";
$stetment=$con->prepare($sql);
$stetment->execute();
$result=$stetment->get_result();
$deg=intval($result->num_rows) ?? 0;

$sql2="select * from residentregistration where kebele_no='k01' AND educational_status='Masters'";
$stetment=$con->prepare($sql2);
$stetment->execute();
$mas=intval($stetment->get_result()) ?? 0;

$sql3="select * from residentregistration where kebele_no='k01' AND educational_status='PHD'";
$stetment=$con->prepare($sql2);
$stetment->execute();
$phd=intval($stetment->get_result()) ?? 0;

$total=$deg + $mas + $phd;
echo $total; 
?>
</div>
</div>
</div>
<div class="col-sm-4">

</div>
<!-- /.col-sm-4 -->
</div>

<div class="page-header">
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php
include 'footer.php';
?>
