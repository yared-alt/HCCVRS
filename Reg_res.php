
<?php
include('userhead.php');
?>
<script language="javascript">
function validatefun(field,alerttxt)
{
with (field)
{
if (value==null||value=="")
{
alert(alerttxt);
return false;
}
else 
{
return true
}
}
}

function checklength(field,alerttxt)
{
with(field)
{
if(value.length<5)
{
alert("Please Enter Valid Name");
return false;
}
}
}
function number(field,alerttxt)
{
with(field)
{
for (var i = 0; i < field.value.length; ++i)
{
if(!(isNaN(field.value.charAt(i))))
{
alert(alerttxt);
return false;
}
}

}
}
function validateemail(field,alerttxt)
{
with (field)
{
var apos=value.indexOf("@");
var dotpos=value.lastIndexOf(".");
if (apos<1||dotpos-apos<2)
{
alert(alerttxt);
return false;
}
else {return true;}
}
}
function validate_acount(thisform)
{
with (thisform)
{
if (validateemail(email,"Not a valid e-mail address!")==false)
{
email.focus();
return false;}
}
}

function validate_acount(thisform)
{
with(thisform)
{
if(validatefun(username,"Please Enter user Name!")==false)
{
username.focus();
return false;
}
if(checklength(username,"User Name Must be contain Three character!")==false)
{
username.value="";
username.focus();
return false;
}
if(number(username,"Name can not contain space or number!")==false)
{
username.value="";
username.focus();
return false;
}
}
with (thisform)
{
if (validatefun(email,"Please enter your email!")==false)
{
email.focus();
return false;
}
if(validateemail(email,"Please enter correct e-mail address")==false)
{
email.focus();
return false;
}
}


with (thisform)
{
if (validatefun(password,"Password can not be empty!")==false)
{
password.focus();
return false;
}
if(checklength(password,"Password must be contain Three character!")==false)
{
password.value="";
password.focus();
return false;
}
}

with(thisform)
{
if(validatefun(firstname,"Please enter your first name!")==false)
{
firstname.focus();
return false;
}
if(number(firstname,"Name can not contain space or number!")==false)
{
firstname.value="";
firstname.focus();
return false;
}
}
with(thisform)
{
if(validatefun(lastname,"Please enter your last name!")==false)
{
lastname.focus();
return false;
}
if(number(lastname,"Name can not contain space or number!")==false)
{
lastname.value="";
lastname.focus();
return false;
}
}
with(thisform)
{
if(validatefun(college,"Please enter your College!")==false)
{
college.focus();
return false;
}
}
with(thisform)
{
if(validatefun(dept,"Please enter your Department!")==false)
{
dept.focus();
return false;
}
}
with(thisform)
{
if(validatefun(city,"Please enter your city!")==false)
{
city.focus();
return false;
}
}
with(thisform)
{
if(validatefun(sex,"Please enter your sex!")==false)
{
sex.focus();
return false;
}
}


}
</script>

</head>
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
<small class="list-group-item active" style="width:1080px;"><b>Residents Registration Form</b></small>
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
<form  method="post" enctype="multipart/form-data">  
    <?php 
    if (isset($_POST['submit'])) {
     $con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
$sql="select * from residentregistration";
$result=mysql_query($sql);
while ($row=mysql_fetch_assoc($result)) {
$res=$row['resident_id'];
}
$ch=substr($res,0,2);
$num=substr($res,2,5);
$num=$num+1;
$year = substr(date('y'),-2);
$resident_id=$ch.$num.'/'.$year;
  $fname=$_POST['fname']; 
  $mname=$_POST['mname'];
  $lname=$_POST['lname'];
  $houseno=$_POST['houseno'];
  $age=$_POST['age'];
  $sex=$_POST['sex'];
  $photo=$_FILES['ph']['name'];
  $es=$_POST['es'];
  $kebele_no=$_POST['kebele_no'];
  $occupation=$_POST['occupation'];
  $religion=$_POST['religion'];
$rand=rand(100,10000);
          
$target_path = 'uploads/'.basename( $_FILES['ph']['name']);  
  
if(move_uploaded_file($_FILES['ph']['tmp_name'], $target_path)) {


     $res=mysql_query("INSERT INTO `residentregistration`(resident_id,fname,mname,lname,house_no,age,sex,photo,educational_status,kebele_no,occupation,religion,registration_date) 
         VALUES ('$resident_id','$fname','$mname','$lname','$houseno','$age','$sex','$photo','$es','$kebele_no','$occupation','$religion',now())"); 

if ($res>0) {
  $ress=mysql_query("INSERT INTO `account`(username,password,user_type,fname,mname,lname,sex,photo) 
         VALUES ('$resident_id','$rand','Resident','$fname','$mname','$lname','$sex','$photo')");
  if ($res>0) {
  $resss=mysql_query("INSERT INTO `house`(house_no,kebele_no) 
         VALUES ('$houseno','$kebele_no')");
    if($ress>0 && $resss>0){
    ?>
    <div class="alert alert-success"><b><?php echo 'Usename:'.$resident_id.' <br>Password:'.$rand.' <br>Resident Registered Successfully';?></b></div>
<?php 
}}else{
    ?>
    <div class="alert alert-danger"><b>Resident Registration Faild!</b></div>




    
<?php
}
}


}


}
 
?>


<div class="col-lg-6">


<div class="form-group">
<div class="well">
<label>First Name</label>
<input name="fname" type="text" onclick="checklength()"  required class="form-control" style="width:300px;"/>
<label>Middel Name</label>
<input name="mname" type="text" required class="form-control" style="width:300px;"/>
<label>Last Name</label>
<input name="lname" type="text" required class="form-control" style="width:300px;"/>
<label>House No</label>
<input class="form-control" required type="text" name="houseno" style="width:300px;"><br />
<label>Kebele No</label>
<select class="form-control" name="kebele_no"  style="width:150px;">
<option value="k01">01</option>
</select><br />
<label>Age</label><br />
<input required class="form-control" type="number" name="age" min="1" max="200"  style="width:100px;"><br />
<div class="form-group">
<label>Sex&nbsp;&nbsp;&nbsp;&nbsp;</label>
<label class="radio-inline">
<input type="radio" name="sex"  required id="optionsRadiosInline1" value="male" >Male
</label>
<label class="radio-inline">
<input type="radio" name="sex"  required id="optionsRadiosInline2" value="female">Female
</label>

</div>

</div></div></div>
<div class="col-lg-6">
  <div class="well">
<label>Educational Status</label>
<select class="form-control" name="es"  style="width:300px;">
<option value="Elementary">Elementary</option>
<option value="High School">High School</option>
<option value="Preparatory">Preparatory</option>
<option value="Diploma/10+">Diploma/10+</option>
<option value="Digree">Degree</option>
<option value="Masters">Masters</option>
<option value="PHD">PHD</option>
<option value="Other">Other</option>
</select><br />

<label>Occupation</label>
<input class="form-control" name="occupation" type="text" style="width:300px;"><br />
<label>Religion</label>
<input class="form-control" required="required" name="religion" type="text" style="width:300px;"><br />

<label>Insert Photo</label>
<input type="file" name="ph"/> <br />
<br>
<br>
<input type="submit" name="submit" class="btn btn-primary" value="Register">
<input type="reset" name="reset" class="btn btn-success" value="Clear">
<br>
<br>
<br>
<br>
<br>
<br><br>
<br><br><br>
<br>

</div>
    
</form>




</div>
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