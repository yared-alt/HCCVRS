
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
<small class="list-group-item active" style="width:525px;"><b>Marriage Registration Form</b></small>
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
$row=mysql_fetch_assoc($result);
$res=$row['marriage_id'];
$ch=substr($res,0,2);
$num=substr($res,2,5);
$num=$num+1;
$year = substr(date('y'),-2);
$marriage_id=$ch.$num.'/'.$year;
  $male_id=$_POST['mid'];
  $female_id=$_POST['fid']; 
  $Marr_date=$_POST['mdate'];  
  $sql3=mysql_query("select * from residentregistration where resident_id ='$male_id' AND sex='male'");
   $sql5=mysql_query("select * from residentregistration where resident_id ='$female_id' AND sex='female'");

   $check=mysql_query("select * from marriageregistration where maleresident_id ='$male_id' OR femaleresident_id ='$female_id'");
   $check2=mysql_num_rows($check);
   echo $check2;

 $sql4=mysql_num_rows($sql3);
 $sql6=mysql_num_rows($sql5);
 

if($sql4 >0 && $sql6>0)
{
   if($check2<0)
        {
          $sql2=mysql_query("INSERT INTO `marriageregistration`
                      (marriage_id,
                      marriage_date,
                      maleresident_id,
                      femaleresident_id
                      ) 
              VALUES ('$marriage_id',
                      '$Marr_date',
                      '$male_id',
                      '$female_id')");
        
            if ($sql2>0) 
                  {
                  ?>
              <div class="alert alert-success" style="width:400px;"><b>&nbsp;&nbsp;&nbsp;&nbsp;Marriage Registered Successfully</b></div>
                  <? php
                  }
                  else{

                    echo "<div class='alert alert-success' style='width:400px;'><b>&nbsp;&nbsp;&nbsp;&nbsp;There is Error tray again! </b></div>";

                     }
      }
      else{
         echo "<div class='alert alert-success' style='width:400px;'><b>&nbsp;&nbsp;&nbsp;&nbsp;Marriage allrady Registered </b></div>";

           }
 }
else{
  echo "<div class='alert alert-danger'style='width:400px;' ><b>&nbsp;&nbsp;&nbsp;&nbsp;Marriage Registration Faild!<br />
    Please Enter valid Resident ID</b></div>";
    }
}
?>
<div class="col-lg-6">

                           <div class="well">
                                <label>Male Resident ID</label>
                                <input class="form-control"  required type="text" name="mid" style="width:150px;">
                                <label>Female Resident ID</label></br>
                                <input class="form-control"  required type="text" name="fid" style="width:150px;"><br />
                                <label>Marriage Date</label>
                                <input class="form-control" required="required" type="date" name="mdate" style="width:250px;"><br>
                                <form action="#" name="Reg_mar" method="post">
                              
                              <input type="submit" name="submit" class="btn btn-primary" value="Register">
                              <input type="reset" name="reset" class="btn btn-success" value="Clear"><br /><br />
                              <div class="alert alert-danger" style="width:350px;"><b>Click the link if One of the two bridegroom is Not Haramya City Resident</b></div>
                              <a href="next.php">One is NOT Haramaya city Resident</br></a>
                            </form>
                              
                            <br /><br />
                                
                            </ol>
                        </div>
                    </form>
                </div>
             
                 <div class="col-lg-6">
                         <img class="img-thumbnail"  src="images\mar1.jpg" alt="Marriage" width="300" height="400" borderradious="50%">
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

