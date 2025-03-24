

<?php
include 'userhead.php';
?>

<body>

<div id="wrapper">
<?php
include 'citynavbar.php';
?>
<div id="page-wrapper">

<div class="container-fluid">
        <form>

<div class="row">
<div class="col-lg-12" id="dvContainer">
    <?php
    $type=$_GET['type'];
    $id=$_GET['id'];
    $con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
$up="update request set read_status='read' where resident_id='$id'";
$rup=  mysql_query($up);
    if($type=="marriage"){
    ?>
<div  style="text-align:right">
                    <small>Ref no:<?php echo $id;?> </small><br>
                    <small>Date:
                    <?php
                                $Today = date('y:m:d');
                                $new = date('l, F d, Y', strtotime($Today));
                                echo $new;
                                
                                ?>
                    </small>
                    
                    
                </div>
            <h1 class="page-header">
                
                <center>
                    <small>People's Democratic Republic Of Ethiopia </small>
                    <small>City Council of Haramaya Urban Deweler's Association </small>
                    
                    
                </center>
</h1><?php
$sql="select * from marriageregistration where maleresident_id='$id' or femaleresident_id='$id'";
$result=mysql_query($sql);
$marriage=  mysql_fetch_assoc($result);
if(!empty($marriage['marriage_id'])){
    ?>
    
    <div style="float:left;width: 20%;height: 100px;">
        <img src="uploads/<?php echo $marriage['h_photo'];?>" width="80px" height="80px">
    </div>
    <div style="float:left;width: 60%;height: 100px;padding: 20px;font-family: fantasy">
        <h1>MARRIAGE CERTIFICATE</h1>
    </div>
    <div style="float:left;width: 20%;height: 100px;">
        <img src="uploads/<?php echo $marriage['w_photo'];?>" width="80px" height="80px">
    </div>
  
    <div style="float:left;width: 100%;">
        <small style="text-align:center;">This is to certify that the register of marriage in the city of Haramaya shows that</small>
    </div>
    <div style="float:left;width: 100%;text-align:center;padding:20px;">
        <small style="font-family: cursive;text-decoration: underline">Name of Husband:<?php echo $marriage['h_fname']." ".$marriage['h_mname']." ".$marriage['h_lname'];?></small>
    </div>
    <div style="float:left;width: 50%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Date of Birth:<?php echo $marriage['h_birth']." ";?></small>
    </div>
    <div style="float:right;width: 50%;text-align:right;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Place of Birth:<?php echo $marriage['h_bplace']." ";?></small>
    </div>
    <div style="float:left;width: 100%;text-align:center;padding:20px;">
        <small style="font-family: cursive;text-decoration: underline">Name of Wife:<?php echo $marriage['w_fname']." ".$marriage['w_mname']." ".$marriage['w_lname'];?></small>
    </div>
    <div style="float:left;width: 50%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Date of Birth:<?php echo $marriage['w_birth']." ";?></small>
    </div>
    <div style="float:right;width: 50%;text-align:right;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Place of Birth:<?php echo $marriage['w_bplace']." ";?></small>
    </div>
    <div style="float:right;width: 50%;text-align:right;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Date of Marriage:<?php echo $marriage['marriage_date']." ";?></small>
    </div>
    <div style="float:right;width: 100%;text-align:center;padding:20px;">
        <img src="uploads/mstamp.jpg">
    </div>
 <?php   
} 
}else if($type=='divorce')
{
?>
<div  style="text-align:right">
                    <small>Ref no:<?php echo $id;?> </small><br>
                    <small>Date:
                    <?php
                                $Today = date('y:m:d');
                                $new = date('l, F d, Y', strtotime($Today));
                                echo $new;
                                
                                ?>
                    </small>
                    
                    
                </div>
            <h1 class="page-header">
                
                <center>
                    <small>People's Democratic Republic Of Ethiopia </small>
                    <small>City Council of Haramaya Urban Deweler's Association </small>
                    
                    
                </center>
</h1><?php
$sql="select * from marriageregistration where maleresident_id='$id' or femaleresident_id='$id'";
$result=mysql_query($sql);
$divorce=  mysql_fetch_assoc($result);
$mid=$divorce['marriage_id'];
$sqld="select * from  divorceregistration where marriage_id ='$id'";
$resultd=mysql_query($sqld);
$div=  mysql_fetch_assoc($resultd);
if(!empty($divorce['marriage_id'])){
    ?>
    
    <div style="float:left;width: 20%;height: 100px;">
        <img src="uploads/<?php echo $divorce['h_photo'];?>" width="80px" height="80px">
    </div>
    <div style="float:left;width: 60%;height: 100px;padding: 20px;font-family: fantasy">
        <h1>MARRIAGE CERTIFICATE</h1>
    </div>
    <div style="float:left;width: 20%;height: 100px;">
        <img src="uploads/<?php echo $divorce['w_photo'];?>" width="80px" height="80px">
    </div>
  
    <div style="float:left;width: 100%;">
        <small style="text-align:center;">This is to certify that the register of marriage in the city of Haramaya shows that</small>
    </div>
    <div style="float:left;width: 100%;text-align:center;padding:20px;">
        <small style="font-family: cursive;text-decoration: underline">Name of Husband:<?php echo $divorce['h_fname']." ".$divorce['h_mname']." ".$divorce['h_lname'];?></small>
    </div>
    <div style="float:left;width: 50%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Date of Birth:<?php echo $divorce['h_birth']." ";?></small>
    </div>
    <div style="float:right;width: 50%;text-align:right;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Place of Birth:<?php echo $divorce['h_bplace']." ";?></small>
    </div>
    <div style="float:left;width: 100%;text-align:center;padding:20px;">
        <small style="font-family: cursive;text-decoration: underline">Name of Wife:<?php echo $divorce['w_fname']." ".$divorce['w_mname']." ".$divorce['w_lname'];?></small>
    </div>
    <div style="float:left;width: 50%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Date of Birth:<?php echo $divorce['w_birth']." ";?></small>
    </div>
    <div style="float:right;width: 50%;text-align:right;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Place of Birth:<?php echo $divorce['w_bplace']." ";?></small>
    </div>
     <div style="float:right;width: 50%;text-align:right;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Date of Marriage:<?php echo $divorce['marriage_date']." ";?></small>
    </div>
     <div style="float:right;width: 50%;text-align:right;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Date of Divorce:<?php echo $div['divorce_date']." ";?></small>
    </div>
    <div style="float:right;width: 100%;text-align:center;padding:20px;">
        <img src="uploads/divorcestamp.jpg">
    </div>
 <?php   
    
}
?>

            <?php
            
    }else if($type=="birth"){
        
    ?>
    <div  style="text-align:right">
                    <small>Ref no:<?php echo $id;?> </small><br>
                    <small>Date:
                    <?php
                                $Today = date('y:m:d');
                                $new = date('l, F d, Y', strtotime($Today));
                                echo $new;
                                
                                ?>
                    </small>
                    
                    
                </div>
            <h1 class="page-header">
                
                <center>
                    <small>People's Democratic Republic Of Ethiopia </small>
                    <small>City Council of Haramaya Urban Deweler's Association </small>
                    
                    
                </center>
</h1><?php
$sql="select * from  birthregistration where resident_id='$id' ";
$result=mysql_query($sql);
$birth=  mysql_fetch_assoc($result);
if(!empty($birth['child_id'])){
    ?>
    
    <div style="float:left;width: 30%;height: 100px;">
        <img src="uploads/<?php echo $birth['photo'];?>" width="80px" height="80px">
    </div>
    <div style="float:left;width: 70%;height: 100px;padding: 20px;font-family: fantasy">
        <h1>BIRTH CERTIFICATE</h1>
    </div>
    
  
    <div style="float:left;width: 100%;">
        <small style="text-align:center;">This is to certify that the register of marriage in the city of Haramaya shows that</small>
    </div>
    <div style="float:left;width: 100%;text-align:center;padding:20px;">
        <small style="font-family: cursive;text-decoration: underline">Child Name:<?php echo $birth['fname']." ".$birth['mname']." ".$birth['lname'];?></small>
    </div>
    <div style="float:left;width: 25%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Father Name:<?php echo $birth['father_name']." ";?></small>
    </div>
    <div style="float:left;width: 25%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Mother Name:<?php echo $birth['mother_name']." ";?></small>
    </div>
    <div style="float:left;width: 25%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Father Occupation:<?php echo $birth['father_occupation']." ";?></small>
    </div>
    <div style="float:left;width: 25%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Mother Occupation:<?php echo $birth['mother_occupation']." ";?></small>
    </div>
    <div style="float:left;width: 25%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Father Age:<?php echo $birth['father_age']." ";?></small>
    </div>
    <div style="float:left;width: 25%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Mother Age:<?php echo $birth['mother_age']." ";?></small>
    </div>
    <div style="float:left;width: 25%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Father Religion:<?php echo $birth['father_religion']." ";?></small>
    </div>
    <div style="float:left;width: 25%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Mother Religion:<?php echo $birth['mother_religion']." ";?></small>
    </div>
    <div style="float:left;width: 50%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Date of Birth:<?php echo $birth['date_of_birth']." ";?></small>
    </div>
    <div style="float:right;width: 50%;text-align:right;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Place of Birth:<?php echo $birth['place_of_birth']." ";?></small>
    </div>
    <div style="float:left;width: 100%;text-align:center;padding:20px;">
        <small style="font-family: cursive;text-decoration: underline">Gender:<?php echo $birth['sex'];?></small>
    </div>
    
    <div style="float:right;width: 100%;text-align:center;padding:20px;">
        <img src="uploads/birthstamp.jpg">
    </div>
 <?php   
    
}
?>

    <?php
    }else if($type=="death"){
    ?>
              <div  style="text-align:right">
                    <small>Ref no:<?php echo $id;?> </small><br>
                    <small>Date:
                    <?php
                                $Today = date('y:m:d');
                                $new = date('l, F d, Y', strtotime($Today));
                                echo $new;
                                
                                ?>
                    </small>
                    
                    
                </div>
            <h1 class="page-header">
                
                <center>
                    <small>People's Democratic Republic Of Ethiopia </small>
                    <small>City Council of Haramaya Urban Deweler's Association </small>
                    
                    
                </center>
</h1><?php
$sql="select * from  residentregistration where resident_id='$id'";
$result=mysql_query($sql);
$death=  mysql_fetch_assoc($result);
$sql2="select * from  deathregistration where resident_id='$id'";
$res=mysql_query($sql2);
$de=  mysql_fetch_assoc($res);
if(!empty($death['resident_id'])|| !empty($de['resident_id'])){
    ?>
    
    <div style="float:left;width: 30%;height: 100px;">
        <img src="uploads/<?php echo $death['photo'];?>" width="80px" height="80px">
    </div>
    <div style="float:left;width: 70%;height: 100px;padding: 20px;font-family: fantasy">
        <h1>DEATH CERTIFICATE</h1>
    </div>
  
    <div style="float:left;width: 100%;">
        <small style="text-align:center;">This is to certify that the register of Death in the city of Haramaya shows that</small>
    </div>
    <div style="float:left;width: 100%;text-align:center;padding:20px;">
        <small style="font-family: cursive;text-decoration: underline">Name:<?php echo $death['fname']." ".$death['mname']." ".$death['lname'];?></small>
    </div>
    <div style="float:left;width: 33%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Religion:<?php echo $death['religion']." ";?></small>
    </div>
    <div style="float:left;width: 33%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Age:<?php echo $death['religion']." ";?></small>
    </div>
    <div style="float:left;width: 33%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Gender:<?php echo $death['sex']." ";?></small>
    </div>
    <div style="float:left;width: 33%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Gender:<?php echo $death['sex']." ";?></small>
    </div>
     <div style="float:left;width: 33%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Occupation:<?php echo $death['occupation']." ";?></small>
    </div>
     <div style="float:left;width: 33%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Kebele:<?php echo $death['kebele_no']." ";?></small>
    </div>
     <div style="float:left;width: 34%;text-align:center;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">House Number:<?php echo $death['house_no']." ";?></small>
    </div>
    <div style="float:left;width: 33%;text-align:center;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Place of Death:<?php echo $de['place_of_death']." ";?></small>
    </div>
    <div style="float:left;width: 33%;text-align:center;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Date of Death:<?php echo $de['date_of_death']." ";?></small>
    </div>
    <div style="float:left;width: 100%;text-align:center;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Death Summary:<?php echo $de['summery_of_death']." ";?></small>
    </div>
    
    <div style="float:left;width: 100%;text-align:center;padding:20px;">
        <img src="uploads/deathstamp.jpg">
    </div>
 <?php   
    
}
?>


    <?php
    }else if($type=="resident"){
    ?>
         <div  style="text-align:right">
                    <small>Ref no:<?php echo $id;?> </small><br>
                    <small>Date:
                    <?php
                                $Today = date('y:m:d');
                                $new = date('l, F d, Y', strtotime($Today));
                                echo $new;
                                
                                ?>
                    </small>
                    
                    
                </div>
            <h1 class="page-header">
                
                <center>
                    <small>People's Democratic Republic Of Ethiopia </small>
                    <small>City Council of Haramaya Urban Deweler's Association </small>
                    
                    
                </center>
</h1><?php
$sql="select * from  residentregistration where resident_id='$id'";
$result=mysql_query($sql);
$resident=  mysql_fetch_assoc($result);

if(!empty($resident['resident_id'])){
    ?>
    
    <div style="float:left;width: 30%;height: 100px;">
        <img src="uploads/<?php echo $resident['photo'];?>" width="80px" height="80px">
    </div>
    <div style="float:left;width: 70%;height: 100px;padding: 20px;font-family: fantasy">
        <h1>Resident CERTIFICATE</h1>
    </div>
  
    <div style="float:left;width: 100%;">
        <small style="text-align:center;">This is to certify that the register of Death in the city of Haramaya shows that</small>
    </div>
    <div style="float:left;width: 100%;text-align:center;padding:20px;">
        <small style="font-family: cursive;text-decoration: underline">Name:<?php echo $resident['fname']." ".$resident['mname']." ".$resident['lname'];?></small>
    </div>
    <div style="float:left;width: 33%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Religion:<?php echo $resident['religion']." ";?></small>
    </div>
    <div style="float:left;width: 33%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Age:<?php echo $resident['religion']." ";?></small>
    </div>
    <div style="float:left;width: 33%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Gender:<?php echo $resident['sex']." ";?></small>
    </div>
    <div style="float:left;width: 33%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Gender:<?php echo $resident['sex']." ";?></small>
    </div>
     <div style="float:left;width: 33%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Occupation:<?php echo $resident['occupation']." ";?></small>
    </div>
     <div style="float:left;width: 33%;text-align:left;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">Kebele:<?php echo $resident['kebele_no']." ";?></small>
    </div>
     <div style="float:left;width: 100%;text-align:center;padding:20px;">
        <small style="font-family: monospace;font-weight:bolder">House Number:<?php echo $resident['house_no']." ";?></small>
    </div>
    <div style="float:left;width: 100%;text-align:center;padding:20px;">
        <img src="uploads/resstamp.jpg">
    </div>
 <?php   
    
}
?>
    <?php
    }
    ?>
    
    
            <input type="button" class="btn btn-success" id="#btnPrint" value="print">
    </form>
<!-- /.row -->

</div>
</div>

<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php
include'footer.php';
?>