
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
    // Database connection using mysqli (mysql is deprecated)
    $con = mysqli_connect('localhost', 'root', '', 'cvrs_db');
    if (!$con) {
        die("<div class='alert alert-danger' style='width:940px;'><b>&nbsp;&nbsp;&nbsp;Database connection failed: " . mysqli_connect_error() . "</b></div>");
    }

    // Sanitize input data
    $resident_id = mysqli_real_escape_string($con, $_POST['resid']);
    $Death_place = mysqli_real_escape_string($con, $_POST['deathplace']);
    $Death_date = mysqli_real_escape_string($con, $_POST['dd']);
    $Informant_FullName = mysqli_real_escape_string($con, $_POST['informantname']);
    $Summray_Death = mysqli_real_escape_string($con, $_POST['deathsum']);

    // Check if resident exists
    $sql3 = mysqli_query($con, "SELECT * FROM residentregistration WHERE resident_id='$resident_id'");
    if (!$sql3) {
        die("<div class='alert alert-danger' style='width:940px;'><b>&nbsp;&nbsp;&nbsp;Database error: " . mysqli_error($con) . "</b></div>");
    }

    if (mysqli_num_rows($sql3) > 0) {
        $row = mysqli_fetch_assoc($sql3);
        $rid = $row['resident_id'];
        $fname = $row['fname'];
        $mname = $row['mname'];
        $lname = $row['lname'];
        $house_no = $row['house_no'];
        $sex = $row['sex'];
        $age = $row['age'];

        // Insert death record
        $sql2 = mysqli_query($con, "INSERT INTO `deathregistration`
            (resident_id, f_name, m_name, l_name, Sex, place_of_death, date_of_death,
            summery_of_death, informant_name, age) 
            VALUES 
            ('$resident_id', '$fname', '$mname', '$lname', '$sex', '$Death_place', 
            '$Death_date', '$Summray_Death', '$Informant_FullName', '$age')");

        if ($sql2) {
            // Update resident status
            $sql = mysqli_query($con, "UPDATE residentregistration SET status='died' WHERE resident_id='$resident_id'");
            
            if ($sql) {
                echo "<div class='alert alert-success' style='width:940px;'><b>&nbsp;&nbsp;&nbsp;Death Registered Successfully</b></div>";
            } else {
                echo "<div class='alert alert-warning' style='width:940px;'><b>&nbsp;&nbsp;&nbsp;Death registered but status update failed: " . mysqli_error($con) . "</b></div>";
            }
        } else {
            echo "<div class='alert alert-danger' style='width:940px;'><b>&nbsp;&nbsp;&nbsp;Death Registration Failed: " . mysqli_error($con) . "</b></div>";
        }
    } else {
        echo "<div class='alert alert-danger' style='width:940px;'><b>&nbsp;&nbsp;&nbsp;Death Registration Failed! <br />&nbsp;Please Enter Valid Resident ID</b></div>";
    }
    
    // Close connection
    mysqli_close($con);
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