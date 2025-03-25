

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
<small><b>Marriage Registration Form</b></small>
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
<form  method="post" enctype="multipart/form-data" name="mar_reg">  
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
  $city_resident=$_POST['city_resident'];
  $Visitor_Name=$_POST['vname'];
  $Visitor_Occupation= $_POST['voccup'];
  $Visitor_Address=$_POST['vaddr'];
  $Visitor_Phone_No=$_POST['vphone'];
  $age=$_POST['age'];
  $Marr_date=$_POST['mdate']; 
 $Visitor_Photo=$_FILES['vphoto']['name'];

$target_path = "C:/xampp/htdocs/HCCV/uploads"; 
$target_path = $target_path.basename( $_FILES['vphoto']['name']);   
  $sql5=mysql_query("select * from residentregistration where resident_id ='$city_resident'");
 $sql4=mysql_num_rows($sql5);
if(move_uploaded_file($_FILES['vphoto']['tmp_name'], $target_path) && $sql4>0) 
              {  
                $res=mysql_query("INSERT INTO `marriageregistration`
                      (marriage_id,
                      marriage_date,
                      city_resident_id,
                      visitors_full_name,
                      visitors_occupation,
                      Visitors_permannent,
                      visitors_phone_no,
                      visitors_photo,
                      visitors_age
                      ) 
              VALUES ('$marriage_id',
                      '$Marr_date',
                      '$city_resident',
                      '$Visitor_Name',
                      '$Visitor_Occupation',
                      '$Visitor_Address',
                      '$Visitor_Phone_No',
                       '$Visitor_Photo',
                      '$age')"); 

if ($res>0) {

    ?>
    <div class="alert alert-success" style="width:400px;"><b>&nbsp;&nbsp;Marriage Registered Successfully</b></div>
<?php 
}
  else        {    echo "<div class='alert alert-danger' style='width:400px;' ><b>&nbsp;&nbsp;Marriage Registration Faild!<br/>Please Enter Valid City Resident's ID</b></div>";


}
    ?>

    
<?php

}}

?>
<div class="col-lg-6">

                           <div class="well">
                                  <label>City Resident ID</label>
                                <input class="form-control"  type="text" name="city_resident" style="width:150px;">
                                <label>Marriage Date</label>
                                <input class="form-control" required="required" type="date" name="mdate" style="width:150px;"><br>
                                <label>Visitor's Full Name</label>
                                <input class="form-control"  type="text" name="vname" style="width:300px;">
                                <label>Visitor's Occupation</label>
                            <input class="form-control"  type="text" name="voccup" style="width:300px;"><br>
                                <label>Visitor's Permanent Address</label>
                                <input class="form-control"  type="text" name="vaddr" style="width:200px;">
                            <div class="form-group">
                                <label>Visitor's Phone No</label></b><br> <input type="tel" style="width:200px;" name="vphone"><br>
                                <label>Age</label>
                                <input class="form-control"  type="text" name="age" style="width:100px;">    
                            </div>
                              <label>Visitor's Photo</label>
                                <input type="file" name="vphoto">
                            <br /><br />
                                <input type="submit" name="submit" class="btn btn-primary" value="Register">
                              <input type="reset" name="reset" class="btn btn-success" value="Clear">
                            </ol>
                        </div>
                    </form>
                </div>

                 <div class="col-lg-6">
                         <img class="img-thumbnail" border="50%" src="images\mar1.jpg" alt="Marriage" width="300" height="400" borderradious="50%">
                         <div style="font-family:Blackadder ITC">
                             <br><h1><center>"Happy Marriage"</center></h1>
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
