
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
<link href="css/home.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
               <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" <h1><center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>Haramaya City Civil And Vital Regestration System</b></center></a></h1>
            </div>
        </nav>
<div id="main"> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="list-group-item" style="width:380px;">

<div class="well" style="width:350px;" >
                                <label><b>Enter Username And Search Your Password</b></label>
                 <form method="post" enctype="multipart/form-data">
                <input class="form-control" placeholder="Enter Your Username" required type="text" name="uname" style="width:250px;"><br />
                <input type="submit" name="search" class="btn btn-primary" value="Search Password">
            <input type="reset" name="reset" class="btn btn-success" value="Clear"><br /><br />
        </form>

<a href="index.php"><br />Back</a></p>

<?php
if(isset($_POST['search'])){
    $id=$_POST['uname'];
$con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
   
     $sql="select * from account where username='$id'";
    $res=mysql_query($sql);
    while ($row=mysql_fetch_assoc($res)) {
    $pass=$row['password'];
    }
    $num=mysql_num_rows($res);
      if($num>0){
        echo '<b>&nbsp;&nbsp; Your Password is   '.$pass;
        
    
  }else{
    ?>
  <?php echo "<div class='alert alert-danger' style='width:300px;'><b>&nbsp;&nbsp;&nbsp;&nbsp;No Such Username is Found<br /> Please Make Sure Your Username is Correct </b></div>";
    ?>


    <?php
}}
?>

</form>
</div>
</div>
</body>
</html>