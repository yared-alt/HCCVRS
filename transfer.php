
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
<small class="list-group-item active" style="width:525px;"><b>Resident Transfer Form</b></small>
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
<form  method="post" enctype="multipart/form-data" name="transfer" >  
    <?php 
    if (isset($_POST['submit'])) {
     $con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
  $res_id=$_POST['resid'];
  $summ=$_POST['summ'];
  $tran_date=$_POST['trandate'];
  $dest=$_POST['dest'];
    $sql="select * from transfer";
    
$sql3=mysql_query("select * from residentregistration where resident_id='$res_id'");
$sql5=mysql_num_rows($sql3);
$sql4=mysql_query("select * from account where resident_id='$res_id'");
  if ($sql5>0 ){
$res=mysql_query("INSERT INTO `transfer`(resident_id,summery,transfered_date,destnation) 
         VALUES ('$res_id','$summ','$tran_date','$dest')"); 

  
    if($res>0 ){

 $sql2=mysql_query("DELETE FROM residentregistration WHERE resident_id='$res_id'");
 $account_del=mysql_query("DELETE FROM account WHERE resident_id='$res_id'");
 
if($sql2>0 && $account_del>0){
echo "<div class='alert alert-success' style='width:500px;'><b>Resident Transfered Successfully</b></div>";
}else{
  echo "<div class='alert alert-danger' style='width:50px;'><b>DResident Transfer Faild!</b></div>";
}
    

    }else {
      echo mysql_error();
    }

  }else {
      echo mysql_error();
    }
  
  
    
    ?>
    
<?php 
    ?>
    <?php echo mysql_error();?>
    

<?php

}
 
?>
<div class="col-lg-6">


                           <div class="well">
                                <ol>
                                <label >Resident Id</label>
                                <input class="form-control" required="required" type="text" name="resid" style="width:250px;"><br>
                                <label>Destnation</label>
                                <input class="form-control" required="required" type="text" name="dest" style="width:250px;"><br>
                                <label>Transfered Date</label>
                                <input class="form-control" required="required" type="date" name="trandate" style="width:250px;"><br>
                                <label> Transfer Summery</label>
                                <textarea class="form-control" required="required" type="text" name="summ" style="width:400px;" rows="3"></textarea>
                            <br><br>
                                <input type="submit" name="submit" class="btn btn-primary" value="Transfer">
                                <input type="reset" name="reset" class="btn btn-success" value="Clear">
                               </ol>
                        </div>
                    </form>
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