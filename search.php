<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Haramaya City Civil And Vital Regestration System</title>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/sb-admin.css" rel="stylesheet">

<!-- Morris Charts CSS -->
<link href="css/plugins/morris.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

<div id="wrapper">
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="K_index.php">Haramaya City Civil And Vital Regestration System</a>
</div>
<!-- Top Menu Items -->
<ul class="nav navbar-right top-nav">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
<ul class="dropdown-menu">
<li>
<a href="K_Profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
</li>
<li class="divider"></li>
<li>
<a href="index.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
</li>
</ul>
</li>
</ul>
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
<ul class="nav navbar-nav side-nav">
<li class="active">
<a href="K_index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
</li>
<li>
<a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Regestration <i class="fa fa-fw fa-caret-down"></i></a>
<ul id="demo" class="collapse">
<li>
<a href="Reg_res.php"><i class="fa fa-fw fa-edit"></i> Regester Resident</a>
</li>
<li>
<a href="Reg_birth.php"><i class="fa fa-fw fa-edit"></i> Regester Birth</a>
</li>
<li>
<a href="Reg_marrige.php"><i class="fa fa-fw fa-edit"></i> Regester Marrige</a>
</li>
<li>
<a href="Reg_death.php"><i class="fa fa-fw fa-edit"></i> Regester Death</a>
</li>
<li>
<a href="Reg_devorce.php"><i class="fa fa-fw fa-edit"></i> Regester Devorce</a>
</li>

</ul>
<li>
<a href="Update_res_Vital.php"><i class="fa fa-fw fa-wrench"></i> Update Resident Vital Info</a>
</li>
<li>
<a href="search.php"><i class="fa fa-fw fa-wrench"></i> Search</a>
</li>
<li>
<a href="view.php"><i class="fa fa-fw fa-bar-chart-o"></i> View_Population</a>
</li>
</li>



</ul>
</div>
<!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper" style="height:1000px">
<div class="container-fluid">
<!-- Page Heading -->
<div class="row"n>
<div class="col-lg-12">
<h1 class="page-header">
<small>Search Resident</small>
</h1>
</div>
</div>
<!-- /.row -->
<label>Search Resident</label>
<div class="form-group input-group">
<form name="search_form" method="post">
<div class="form-group">
<input type="text" placeholder="Enter Resident ID or Name " name="searchin" class="form-control" required style="width:300px;" >
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
$con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
    $search_id = $_POST['searchin'];
     $sql="select * from residentregistration where resident_id='$id' || fname like '%$search_id%'";
    $res=mysql_query($sql);
    $row=mysql_fetch_assoc($res);
      if(empty($row)){
        ?>
        <tr><td colspan="30"><b>No Such Resident Found!<b></td></tr> 
      <?php 
  }else{
    $id=$row['no'];
        ?>
        <tr >
<td><?php echo $row['resident_id'];?></td>
<td><?php echo $row['fname']." ".$row['mname']." ".$row['lname'];?></td>
<td><img src="<?php echo 'uploads/'.$row['photo'];?>" style="height:30px"></td>
<td><?php echo $row['house_no'];?></td>
<td ><?php echo $row['age'];?></td>
<td><?php echo $row['sex'];?></td>
<td><?php echo $row['occupation'];?></td>
<td><?php echo $row['religion'];?></td>
<td>
<?php
        echo"<a href ='view_detail.php?id=$id'class='btn btn-defualt'>View</a>";
        echo"<a href ='edit_resident.php?id=$id'class='btn btn-defualt'>Edit</a>";

    
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