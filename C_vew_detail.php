<?php 
session_start();
?>

<?php
include 'citynavbar.php';
include 'session.php';
?>


<body>

<div id="wrapper">
<!-- Navigation -->
<?php
include'usernavbar.php';
?>
<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
<small>  </small>
</h1>

</div>
</div>

</div>
<!-- /.container-fluid -->


<div class="row">
<div class="col-lg-12">


<div class="panel-body">
<form style="font-family:times">
<center><h2><img src="images/logo.gif"></h2>
<h2>Haramaya City</h2>
<h2>Haramaya City civil and Vital Registration </h2>
<h2>Resident Information </h2>
</center>

<?php
$id=$_GET['id'];
$con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
    $sql="select * from residentregistration where no='$id'";
    $res=mysql_query($sql);
    while ($row=mysql_fetch_assoc($res)) {
        
        ?>
        <h4><b>
        <div class="col-lg-4" >
        Resident ID:
        </div>
        <div class="col-lg-8" >
        <?php echo $row['resident_id'];?>
        </div>
         <div class="col-lg-4" >
        Name:
        </div>
        <div class="col-lg-8" >
        <?php echo $row['fname']." ".$row['mname']." ".$row['lname'];?>
        </div>
         <div class="col-lg-4" >
            Photo:
        </div>
        <div class="col-lg-8" >
        <img src="<?php echo 'uploads/'.$row['photo'];?>" style="height:100px">
        </div>
         <div class="col-lg-4" >
        Age:
        </div>
        <div class="col-lg-8" >
        <?php echo $row['age'];?>
        </div>
         <div class="col-lg-4" >
        Gender:
        </div>
        <div class="col-lg-8" >
        <?php echo $row['sex'];?>
        </div>
         <div class="col-lg-4" >
        Occupation:
        </div>
        <div class="col-lg-8" >
        <?php echo $row['occupation'];?>
        </div>
         <div class="col-lg-4" >
        House Number:
        </div>
        <div class="col-lg-8" >
        <?php echo $row['house_no'];?>
        </div>
         <div class="col-lg-4" >
        Educational Status:
        </div>
        <div class="col-lg-8" >
        <?php echo $row['educational_status'];?>
        </div>
        <div class="col-lg-4" >
        Religion:
        </div>
        <div class="col-lg-8" >
        <?php echo $row['religion'];?>
        </div>
        <br><br><br /><br />
        </h4></b>
        <?php
    }
    ?>
<center><a href="view.php" class="btn btn-primary" >Back</a>&nbsp;<a class="btn btn-primary" onClick="window.print()" >print</a></center>
        </form>


</div>
</div>
</div>
</div>
</div>
</div>

<!-- /#page-wrapper -->

</div>
<?php
include'footer.php';
?>