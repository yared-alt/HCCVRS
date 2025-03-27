
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
    // Database connection using mysqli (mysql is deprecated)
    $con = mysqli_connect('localhost', 'root', '', 'cvrs_db');
    if (!$con) {
        die("<div class='alert alert-danger' style='width:400px;'><b>&nbsp;&nbsp;Database connection failed!</b></div>");
    }

    // Sanitize input data
    $Marriage_id = mysqli_real_escape_string($con, $_POST['marid']);
    $Divorce_Summray = mysqli_real_escape_string($con, $_POST['devsum']);

    // Check if marriage exists
    $check_marriage = mysqli_query($con, "SELECT * FROM marriageregistration WHERE marriage_id ='$Marriage_id'");
    if (!$check_marriage) {
        die("<div class='alert alert-danger' style='width:400px;'><b>&nbsp;&nbsp;Database error: " . mysqli_error($con) . "</b></div>");
    }

    if (mysqli_num_rows($check_marriage) > 0) {
        // Start transaction for atomic operations
        mysqli_begin_transaction($con);
        
        try {
            // Insert divorce record
            $insert_divorce = mysqli_query($con, "INSERT INTO `divorceregistration` 
                (marriage_id, date_of_divorce, summery_of_divorce) 
                VALUES ('$Marriage_id', NOW(), '$Divorce_Summray')");
            
            if (!$insert_divorce) {
                throw new Exception("Divorce registration failed: " . mysqli_error($con));
            }

            // Update marriage status
            $update_marriage = mysqli_query($con, "UPDATE marriageregistration 
                SET status='divorced' 
                WHERE marriage_id='$Marriage_id'");
            
            if (!$update_marriage) {
                throw new Exception("Marriage status update failed: " . mysqli_error($con));
            }

            // Commit transaction if both operations succeeded
            mysqli_commit($con);
            echo "<div class='alert alert-success' style='width:400px;'><b>&nbsp;&nbsp;Divorce Registered Successfully!</b></div>";
            
        } catch (Exception $e) {
            // Rollback transaction on error
            mysqli_rollback($con);
            echo "<div class='alert alert-danger' style='width:400px;'><b>&nbsp;&nbsp;" . $e->getMessage() . "</b></div>";
        }
        
    } else {
        echo "<div class='alert alert-danger' style='width:400px;'>
                <b>&nbsp;&nbsp;Divorce Registration Failed!<br>
                &nbsp;&nbsp;Please Enter Valid Marriage ID</b>
              </div>";
    }
    
    // Close connection
    mysqli_close($con);
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