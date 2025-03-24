
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
<small class="list-group-item active" style="width:525px;"><b>Divorce  Registration Form</b></small>
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
<div class="row">
<form  method="post" enctype="multipart/form-data" name="devorce_reg" >  
    <?php 
    if (isset($_POST['submit'])) {
     $con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
  $Marriage_id=$_POST['marid'];
  $Divorce_Summray=$_POST['devsum'];

$sql4=mysql_query("select * from marriageregistration where marriage_id ='$Marriage_id'");
$sql5=mysql_num_rows($sql4);
    
    if ($sql5>0){
    $res=mysql_query("INSERT INTO `divorceregistration`(marriage_id,date_of_divorce,summery_of_divorce) 
         VALUES ('$Marriage_id',now(),'$Divorce_Summray')"); 
    $sql2=mysql_query("UPDATE  marriageregistration SET status='divorced' WHERE marriage_id='$Marriage_id'");

    if($sql2>0 && $res>0){

 echo "<div class='alert alert-success' style='width:400px;'><b>&nbsp;&nbsp;Divorce Registered Successfully!<b></div>";
}
    ?>
<?php 
}else{
    ?>
    <div class="alert alert-danger" style="width:400px;"><b>&nbsp;&nbsp;Divorce Registration Faild!<br>&nbsp;&nbsp;Please Enter Valid Marriage ID</div>
<?php
}
}
 
?>
<div class="col-lg-6">
                           <div class="well">
                                <ol>
                                <label>Marriage Id</label>
                                <input class="form-control" required="required" type="text" name="marid" style="width:150px;"><br>
                                <label>Summray of Divorce </label>
                                <textarea class="form-control" required="required" type="text" name="devsum" rows="3"></textarea>
                            <br><br>
                                <input type="submit" name="submit" class="btn btn-primary" value="Register">
                                <input type="reset" name="reset" class="btn btn-success" value="Clear">
                               </ol>
                        </div>
                    </form>
                </div>
                
                                    <div class="col-lg-6">
                         <img class="img-thumbnail" border="0" src="images\div4.jpg" alt="Divorce" width="400" height="500">
                         <div style="font-family:Blackadder ITC">
                             <br><h1><center>"Divorce"</center></h1>
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