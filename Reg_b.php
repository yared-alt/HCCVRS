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
<small class="list-group-item active" style="width:950px;"><b>Birth Registration Form</b></small>
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
<?php 
if (isset($_POST['submit'])) {
    $con = new mysqli('localhost','root','',"cvrs_db");
    if ($con->connect_error) {
        die("<div class='alert alert-danger'>Database connection failed: " . $con->connect_error . "</div>");
    }

    // Start transaction
    $con->begin_transaction();

    try {
        // Get the current year
        $year = substr(date('y'), -2);
        
        // Get the highest number for the current year
        $sql = "SELECT MAX(CAST(SUBSTRING(child_id, 2, 3) AS UNSIGNED)) as max_num 
                FROM birthregistration 
                WHERE child_id LIKE 'A%/$year'";
        
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        $max_num = $row['max_num'] ?? 0;
        
        // Generate new ID
        $num = $max_num + 1;
        $child_id = 'A' . str_pad($num, 3, '0', STR_PAD_LEFT) . '/' . $year;

        // Process form data
        $fname = trim($_POST['fname']);
        $mname = trim($_POST['mname']);
        $lname = trim($_POST['lname']);
        $child_sex = trim($_POST['child_sex']);
        $Place_of_Birth = trim($_POST['birpl']);
        $Birth_Weight = trim($_POST['birwei']);
        $Mother_Name = trim($_POST['mothname']);
        $Family_Religion = trim($_POST['freligion']);
        $Father_Occupation = trim($_POST['foccup']);
        $Mother_Occupation = trim($_POST['moccup']);
        $Mother_age = $_POST['mothage'];
        $bd = $_POST['bd'];
        $Father_age = $_POST['fathage'];
        $Family_Phone_No = $_POST['usrtel'];
        $rand = rand(100, 10000);

        // File upload
        $photo = '';
        if (isset($_FILES['pho']) && $_FILES['pho']['error'] === UPLOAD_ERR_OK) {
            $target_dir = 'uploads/';
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $ext = strtolower(pathinfo($_FILES['pho']['name'], PATHINFO_EXTENSION));
            $photo = uniqid() . '.' . $ext;
            $target_path = $target_dir . $photo;
            
            if (move_uploaded_file($_FILES['pho']['tmp_name'], $target_path)) {
                // Insert birth registration
                $sql1 = "INSERT INTO birthregistration (
                    child_id, fname, mname, lname, sex, 
                    place_of_birth, birth_weight, mother_name, date_of_birth,
                    father_religion, father_occupation, mother_occupation,
                    mother_age, father_age, family_phone, photo, regis_date
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
                
                $stmt1 = $con->prepare($sql1);
                $stmt1->bind_param("ssssssssssssssss", 
                    $child_id, $fname, $mname, $lname, $child_sex,
                    $Place_of_Birth, $Birth_Weight, $Mother_Name, $bd,
                    $Family_Religion, $Father_Occupation, $Mother_Occupation,
                    $Mother_age, $Father_age, $Family_Phone_No, $photo
                );
                
                if ($stmt1->execute()) {
                    // Insert account
                    $sql2 = "INSERT INTO account (
                        username, password, user_type, fname, mname, lname, sex, photo
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    
                    $stmt2 = $con->prepare($sql2);
                    $user_type = 'Resident';
                    $stmt2->bind_param("ssssssss", 
                        $child_id, $rand, $user_type, $fname, $mname, $lname, $child_sex, $photo
                    );
                    
                    if ($stmt2->execute()) {
                        // Commit transaction
                        $con->commit();
                        echo "<div class='alert alert-success' style='width:1000px;'>
                            <b>&nbsp;&nbsp;Username: $child_id<br />
                            &nbsp;&nbsp;Password: $rand<br />
                            &nbsp;&nbsp;Birth Registered Successfully!</b>
                        </div>";
                    } else {
                        throw new Exception("Account creation failed: " . $con->error);
                    }
                } else {
                    throw new Exception("Birth registration failed: " . $con->error);
                }
            } else {
                throw new Exception("File upload failed!");
            }
        } else {
            throw new Exception("No photo uploaded or upload error occurred!");
        }
    } catch (Exception $e) {
        // Rollback transaction on error
        $con->rollback();
        echo "<div class='alert alert-danger' style='width:1000px;'>
            <b>&nbsp;&nbsp;" . $e->getMessage() . "</b>
        </div>";
    }
}
?>
<form method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-lg-6">
        <div class="well" style="width:400px;">
            <div class="form-group">
                <label>Place of Birth</label>
                <input class="form-control" required type="text" name="birpl" style="width:300px;">
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input class="form-control" required type="text" name="fname" style="width:300px;">
            </div>
            <div class="form-group">
                <label>Middle Name</label>
                <input class="form-control" required type="text" name="mname" style="width:300px;">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input class="form-control" required type="text" name="lname" style="width:300px;">
            </div>
            <div class="form-group">
                <label>Birth Date</label>
                <input class="form-control" required type="date" name="bd" style="width:300px;">
            </div>
            <div class="form-group">
                <label>Sex</label>
                <select class="form-control" required name="child_sex" style="width:100px;">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label>Birth Weight</label>
                <input class="form-control" required type="text" name="birwei" style="width:100px;">
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="well" style="width:400px;">
            <div class="form-group">
                <label>Mother Full Name</label>
                <input class="form-control" required type="text" name="mothname" style="width:300px;">
            </div>
            <div class="form-group">
                <label>Religion of Family</label>
                <input class="form-control" required type="text" name="freligion" style="width:250px;">
            </div>
            <div class="form-group">
                <label>Father's Occupation</label>
                <input class="form-control" required type="text" name="foccup" style="width:250px;">
            </div>
            <div class="form-group">
                <label>Mother's Occupation</label>
                <input class="form-control" required type="text" name="moccup" style="width:250px;">
            </div>
            <div class="form-group">
                <label>Mother's Age</label>
                <input class="form-control" required type="number" name="mothage" style="width:100px;">
            </div>
            <div class="form-group">
                <label>Father's Age</label>
                <input class="form-control" required type="number" name="fathage" style="width:100px;">
            </div>
            <div class="form-group">
                <label>Family Phone No</label>
                <input class="form-control" type="tel" name="usrtel" required style="width:250px;">
            </div>
            <div class="form-group">
                <label>Insert Photo</label>
                <input type="file" name="pho" required accept="image/*">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Register">
                <input type="reset" name="reset" class="btn btn-success" value="Clear">
            </div>
        </div>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php
include('footer.php');
?>