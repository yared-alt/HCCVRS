<?php 
session_start();
?>

<?php
include('userhead.php');
//include('session.php');
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
<small>Delete Kebele Admin Account</small>
</h1>

</div>
</div>

</div>
<!-- /.container-fluid -->


<div class="row">
<div class="col-lg-12">


<div class="panel-body">
<form style="font-family:times">

<?php
$id=$_GET['id'];
$con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
    $sql2=mysql_query("DELETE FROM account where account_id='$id'");
    	if($sql2){

echo "<div class='alert alert-success' style='width:500px;''><b>Account Delated Successfully!</b></div>";


}else{
  echo "<div class='alert alert-danger'><b>Account is Not Deleted!</b></div>";
}
    	 
        
    ?>

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