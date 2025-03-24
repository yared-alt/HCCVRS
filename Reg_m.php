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
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Marriage Registration</small>
                        </h1>   
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
             
         <div class="row">
                    <div class="col-lg-6">
<form class="form-horizontal" name="reg_m" method="post" enctype="multipart/form-data" >
       <?php 
    if (isset($_POST['submit'])) {
     $con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
$sql="select * from marriageregistration";
$result=mysql_query($sql);
while ($row=mysql_fetch_assoc($result)) {
$res=$row['marriage_id'];
}
$ch=substr($res,0,2);
$num=substr($res,2,5);
$num=$num+1;
$year = substr(date('y'),-2);
$marriage_id=$ch.$num.'/'.$year;
  $fres=$_POST['fres'];
  $mres=$_POST['mres']; 
  $hfname=$_POST['hfname'];
  $hmname=$_POST['hmname'];
  $hlname=$_POST['hlname']; 
 $mdate=$_POST['mdate'];
  $hbirth=$_POST['hbirth'];
  $hbplace=$_POST['hbplace'];
    $hphoto=$_FILES['hphoto']['name'];
    $wphoto=$_FILES['wphoto']['name'];
   
     $wfname=$_POST['wfname'];
  $wmname=$_POST['wmname'];
  $wlname=$_POST['wlname']; 
  $wbirth=$_POST['wbirth'];
  $wbplace=$_POST['wbplace'];
    
  
$sql3=mysql_query("select * from residentregistration where resident_id ='$mres' AND sex='male'");
   $sql5=mysql_query("select * from residentregistration where resident_id ='$fres' AND sex='female'");


 $sql4=mysql_num_rows($sql3);
 $sql6=mysql_num_rows($sql5);
$th = 'uploads/'.basename( $_FILES['hphoto']['name']);  
 $tw = 'uploads/'.basename( $_FILES['wphoto']['name']);  

if($sql4 >0 && $sql6>0)
{
  if((move_uploaded_file($_FILES['hphoto']['tmp_name'], $th)) &&(move_uploaded_file($_FILES['wphoto']['tmp_name'], $tw))) { 

                $sql2=mysql_query("INSERT INTO `marriageregistration`
                      (marriage_id,maleresident_id,femaleresident_id,w_fname,w_mname,w_lname,w_birth,w_bplace,
                        w_photo,h_fname,h_mname,h_lname,h_birth,h_bplace,h_photo,marriage_date
                      ) 
              VALUES ('$marriage_id','$mres','$fres',
                      '$wfname','$wmname','$wlname','$wbirth','$wbplace','$wphoto','$hfname','$hmname','$hlname','$hbirth',
                      '$hbplace','$hphoto','$mdate')"); 
              }

if ($sql2>0) {

    ?>
    <div class="alert alert-success" style="width:400px;"><b>&nbsp;&nbsp;Marriage Registered Successfully</b></div>
<?php 
}else{
  echo mysql_error();
    ?>
    <div class="alert alert-danger"style="width:400px;" ><b>&nbsp;&nbsp;Marriage Registration Failed!</b></div>
<?php
}

    }


?> 
  <?php }?>  


<h3>Husband Information</h3><hr>
<div class="form-group" >
    
<label class="col-sm-2 control-label">Female Residence ID</label>
<div class="col-sm-6">
<input class="form-control username" name="fres"  type="text"
placeholder="Please Enter Wifes' Resident ID">
</div>
</div>
<div class="form-group" id="maleres">
    
<label class="col-sm-2 control-label">Male Residence ID</label>
<div class="col-sm-6">
<input class="form-control username" name="mres"  type="text"
placeholder="Please Enter Husbands' Resident ID">
</div>
</div>
<div class="maleinfo" >
<div class="form-group" >
    
<label class="col-sm-2 control-label">First Name</label>
<div class="col-sm-6">
<input class="form-control username" name="hfname"  type="text"
placeholder="Please Enter husbands' First name">
</div>
</div>
<div class="form-group region" >

<label class="col-sm-2 control-label">Middle Name</label>
<div class="col-sm-6">
<input class="form-control username" name="hmname"  type="text"
placeholder="Please Enter husbands' Middle Name">
</div>
</div>
<div class="form-group">

<label class="col-sm-2 control-label">Last Name</label>
<div class="col-sm-6">
<input class="form-control username" name="hlname" type="text"
placeholder="Please Enter husbands' Last Name">
</div>
</div>
<div class="form-group">

<label class="col-sm-2 control-label">Date of Birth</label>
<div class="col-sm-6">
<input class="form-control username" name="hbirth"  type="date"
placeholder="Please Enter husbands' Birth Date">
</div>
</div>
<div class="form-group">

<label class="col-sm-2 control-label">Place of Birth</label>
<div class="col-sm-6">
<input class="form-control username" name="hbplace"  type="text"
placeholder="Please Enter husbands' Birth Place">
</div>
</div>
<div class="form-group">

<label class="col-sm-2 control-label">Upload Photo</label>
<div class="col-sm-6">
<input class="form-control username" name="hphoto" type="file">
</div>
</div>
</div>

<div class="form-group">

<label class="col-sm-2 control-label">Marriage Date</label>
<div class="col-sm-6">
<input class="form-control username" name="mdate"  type="date">
</div>
</div>


  


                         
                </div>

                 
                  
<h3>Wife Information</h3><hr>
<div class="form-group">

    
<label >First Name</label>
<div class="col-sm-6">
<input class="form-control username" name="wfname"  type="text"
placeholder="Please Enter wifes' First Name" style="width:300px;">
</div>


</div>
<div class="form-group">
<label class="col-sm-2 control-label">Middle Name</label>
<div class="col-sm-6">
<input class="form-control username" name="wmname"  type="text"
placeholder="Please Enter wifes' Middle  Name" style="width:300px;">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Last Name</label>
<div class="col-sm-6">
<input class="form-control username" name="wlname"  type="text"
placeholder="Please Enter wifes' Last Name" style="width:300px;">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Date of Birth</label>
<div class="col-sm-6">
<input class="form-control username" name="wbirth"  type="date"
placeholder="Please Enter wifes' Birth Date" style="width:300px;">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Place of Birth</label>
<div class="col-sm-6">
<input class="form-control username" name="wbplace"  type="text"
placeholder="Please Enter wifes' Birth Place" style="width:300px;">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Upload Photo</label>
<div class="col-sm-6">
<input class="form-control username" name="wphoto"  style="width:300px;" type="file"><br>
<div class="form-group">
<label class="col-sm-2 control-label"></label><br>
<div class="col-sm-8">
<button type="submit" name="submit" class="btn btn-success"><center>Register</center></button>
</div>
</div> 
</div>
</div>
</div>
                            </div>
            </div>
       </div>
        </div>
      </form>
        <!-- /#page-wrapper -->
    </div>
  <?php
     include 'footer.php';
     ?>
