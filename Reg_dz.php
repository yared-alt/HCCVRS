
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
<small class="list-group-item active" style="width:525px;"><b>Death Registration Form</b></small>
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
<form  method="post" enctype="multipart/form-data" name="death_reg">  
    <?php 
    if (isset($_POST['submit'])) {

     $con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
    $resident_id=$_POST['resid']; 
    //echo $resident_id;
  $Death_place=$_POST['deathplace'];
   $Death_date=$_POST['dd'];
  $Informant_FullName=$_POST['informantname'];
  $Summray_Death=$_POST['deathsum'];

  $sql3=mysql_query("select * from residentregistration where resident_id='$resident_id'");
  $sql4=mysql_num_rows($sql3);
  if ($sql4>0){
$row=mysql_fetch_assoc($sql3);
$rid=$row['resident_id'];
$fname=$row['fname'];
$mname=$row['mname'];
$lname=$row['lname'];
$house_no=$row['house_no'];
$sex=$row['sex'];
$age=$row['age'];

    $sql2=mysql_query("INSERT INTO `deathregistration`
                      (resident_id,f_name,m_name,l_name,Sex,place_of_death,date_of_death,
                      summery_of_death,
                      informant_name,age) 
              VALUES ('$resident_id',
                '$fname','$mname','$lname','$sex','$Death_place','$Death_date',
                 '$Summray_Death',
                '$Informant_FullName','$age')");
    if($sql2>0){

 $sql=mysql_query(" UPDATE residentregistration SET status='died' where resident_id='$resident_id'");

if($sql){
echo "<div class='alert alert-success' style='width:940px;'><b>&nbsp;&nbsp;&nbsp;Death Registered Successfully</b></div>";
}else{
  
}
    

    }else {
     
    }

  }else {
     echo "<div class='alert alert-danger' style='width:940px;'><b>&nbsp;&nbsp;&nbsp;Death Registration Faild! <br />&nbsp;Please Enter Valid Resident ID </b></div>";
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
                                <label>Resident Id</label>
                                <input class="form-control" required="required" type="text" name="resid"style="width:150px;">
                                <label>Place of Death</label>
                                <input class="form-control" required="required" type="text" name="deathplace" style="width:150px;">
                                <label>Date Of Death</label>
                                <input class="form-control" required="required" type="date" name="dd" style="width:300px;">
                                <label>Informant FullName</label>
                                <input class="form-control" required="required" type="text" name="informantname" style="width:300px;">

                                <label>Summray of Death</label>
                                <textarea class="form-control" required="required" type="text" name="deathsum" rows="3"></textarea><br>

                            <br />
                              <input type="submit" name="submit" class="btn btn-primary" value="Register">
                              <input type="reset" name="reset" class="btn btn-success" value="Clear">
                                </ol>
                               
                        </div>
                    </form>
                </div>
                
                        <div class="col-lg-6">
                         <img class="img-thumbnail" border="0" src="images\da2.jpg" alt="Death" width="350" height="250">
                         <div style="font-family:Blackadder ITC">
                             <br><h1><center>"Death"</center></h1>
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