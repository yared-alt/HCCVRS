<?php

use BcMath\Number;

include('userhead.php');
?>
<script language="javascript">
  function validatefun(field, alerttxt) {
    with(field) {
      if (value == null || value == "") {
        alert(alerttxt);
        return false;
      } else {
        return true
      }
    }
  }

  function checklength(field, alerttxt) {
    with(field) {
      if (value.length < 5) {
        alert("Please Enter Valid Name");
        return false;
      }
    }
  }

  function number(field, alerttxt) {
    with(field) {
      for (var i = 0; i < field.value.length; ++i) {
        if (!(isNaN(field.value.charAt(i)))) {
          alert(alerttxt);
          return false;
        }
      }

    }
  }

  function validateemail(field, alerttxt) {
    with(field) {
      var apos = value.indexOf("@");
      var dotpos = value.lastIndexOf(".");
      if (apos < 1 || dotpos - apos < 2) {
        alert(alerttxt);
        return false;
      } else {
        return true;
      }
    }
  }

  function validate_acount(thisform) {
    with(thisform) {
      if (validateemail(email, "Not a valid e-mail address!") == false) {
        email.focus();
        return false;
      }
    }
  }

  function validate_acount(thisform) {
    with(thisform) {
      if (validatefun(username, "Please Enter user Name!") == false) {
        username.focus();
        return false;
      }
      if (checklength(username, "User Name Must be contain Three character!") == false) {
        username.value = "";
        username.focus();
        return false;
      }
      if (number(username, "Name can not contain space or number!") == false) {
        username.value = "";
        username.focus();
        return false;
      }
    }
    with(thisform) {
      if (validatefun(email, "Please enter your email!") == false) {
        email.focus();
        return false;
      }
      if (validateemail(email, "Please enter correct e-mail address") == false) {
        email.focus();
        return false;
      }
    }


    with(thisform) {
      if (validatefun(password, "Password can not be empty!") == false) {
        password.focus();
        return false;
      }
      if (checklength(password, "Password must be contain Three character!") == false) {
        password.value = "";
        password.focus();
        return false;
      }
    }

    with(thisform) {
      if (validatefun(firstname, "Please enter your first name!") == false) {
        firstname.focus();
        return false;
      }
      if (number(firstname, "Name can not contain space or number!") == false) {
        firstname.value = "";
        firstname.focus();
        return false;
      }
    }
    with(thisform) {
      if (validatefun(lastname, "Please enter your last name!") == false) {
        lastname.focus();
        return false;
      }
      if (number(lastname, "Name can not contain space or number!") == false) {
        lastname.value = "";
        lastname.focus();
        return false;
      }
    }
    with(thisform) {
      if (validatefun(college, "Please enter your College!") == false) {
        college.focus();
        return false;
      }
    }
    with(thisform) {
      if (validatefun(dept, "Please enter your Department!") == false) {
        dept.focus();
        return false;
      }
    }
    with(thisform) {
      if (validatefun(city, "Please enter your city!") == false) {
        city.focus();
        return false;
      }
    }
    with(thisform) {
      if (validatefun(sex, "Please enter your sex!") == false) {
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
        <form method="post" enctype="multipart/form-data">
          <?php
          if (isset($_POST['submit'])) {
            $con = new mysqli('localhost', 'root', '', "cvrs_db");
            $sql = "select * from residentregistration";
            $stetment = $con->prepare($sql);
            $stetment->execute();
            $result = $stetment->get_result();
            while ($row = $result->fetch_assoc()) {
              $res = $row['resident_id'];
            }

          ?>

          <?php
            // Establish database connection using MySQLi
            $conn = new mysqli("localhost", "root", "", "cvrs_db");
            if ($conn->connect_error) {
              die("<div class='alert alert-danger'><b>Database connection failed: " . htmlspecialchars($conn->connect_error) . "</b></div>");
            }

            // Process form data
            $ch = substr($res, 0, 1);
            $num = substr($res, 1, 3);
            $num = $num + 1;
            $year = substr(date('y'), -2);
            $resident_id = $ch . $num . '/' . $year;

            // Sanitize and validate input
            $fname = htmlspecialchars(trim($_POST['fname']));
            $mname = htmlspecialchars(trim($_POST['mname']));
            $lname = htmlspecialchars(trim($_POST['lname']));
            $houseno = htmlspecialchars(trim($_POST['houseno']));
            $age = filter_var($_POST['age'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 120]]);
            $sex = in_array($_POST['sex'], ['Male', 'Female', 'Other']) ? $_POST['sex'] : 'Other';
            $es = htmlspecialchars(trim($_POST['es']));
            $kebele_no = htmlspecialchars(trim($_POST['kebele_no']));
            $occupation = htmlspecialchars(trim($_POST['occupation']));
            $religion = htmlspecialchars(trim($_POST['religion']));
            $rand = password_hash(rand(100, 10000), PASSWORD_DEFAULT); // Secure password generation

            // Handle file upload
            $photo = '';
            $target_dir = 'uploads/';
            if (isset($_FILES['ph'])) {
              $target_file = $target_dir . basename($_FILES['ph']['name']);
              $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

              // Validate image
              $check = getimagesize($_FILES['ph']['tmp_name']);
              if ($check !== false && in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
                $photo = uniqid() . '.' . $imageFileType; // Unique filename
                $target_path = $target_dir . $photo;

                
                if (!move_uploaded_file($_FILES['ph']['tmp_name'], $target_path)) {
                  echo "<div class='alert alert-danger'><b>Error uploading photo!</b></div>";
                  exit;
                }
              } else {
                echo "<div class='alert alert-danger'><b>Invalid image file!</b></div>";
                exit;
              }
            }

            // Start transaction
            $conn->begin_transaction();

            try {
              // Insert into residentregistration
              $stmt1 = $conn->prepare("INSERT INTO residentregistration (resident_id, fname, mname, lname, house_no, age, sex, photo, educational_status, kebele_no, occupation, religion, registration_date) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
              $stmt1->bind_param("sssssissssss", $resident_id, $fname, $mname, $lname, $houseno, $age, $sex, $photo, $es, $kebele_no, $occupation, $religion);
              $res1 = $stmt1->execute();

              if (!$res1) throw new Exception("Resident registration failed: " . $stmt1->error);

              // Insert into account
              $stmt2 = $conn->prepare("INSERT INTO account (username, password, user_type, fname, mname, lname, sex, photo) 
                            VALUES (?, ?, 'Resident', ?, ?, ?, ?, ?)");
              $stmt2->bind_param("sssssss", $resident_id, $rand, $fname, $mname, $lname, $sex, $photo);
              $res2 = $stmt2->execute();

              if (!$res2) throw new Exception("Account creation failed: " . $stmt2->error);

              // Insert into house
              $stmt3 = $conn->prepare("INSERT INTO house (house_no, kebele_no) VALUES (?, ?)");
              $stmt3->bind_param("ss", $houseno, $kebele_no);
              $res3 = $stmt3->execute();

              if (!$res3) throw new Exception("House registration failed: " . $stmt3->error);

              // Commit transaction
              $conn->commit();

              // Success message
              echo "<div class='alert alert-success'>
            <b>Username: " . htmlspecialchars($resident_id) . "<br>
            Password: " . substr($rand, 0, 10) . "...<br>
            Resident Registered Successfully</b>
          </div>";
            } catch (Exception $e) {
              // Rollback on error
              $conn->rollback();

              // Delete uploaded file if registration failed
              if (!empty($photo) && file_exists($target_path)) {
                unlink($target_path);
              }

              echo "<div class='alert alert-danger'><b>Registration failed: " . htmlspecialchars($e->getMessage()) . "</b></div>";
              error_log("Registration error: " . $e->getMessage());
            } finally {
              // Close statements
              if (isset($stmt1)) $stmt1->close();
              if (isset($stmt2)) $stmt2->close();
              if (isset($stmt3)) $stmt3->close();
              $conn->close();
            }
          }
          ?>
          <div class="col-lg-6">


            <div class="form-group">
              <div class="well">
                <label>First Name</label>
                <input name="fname" type="text" onclick="checklength()" required class="form-control" style="width:300px;" />
                <label>Middel Name</label>
                <input name="mname" type="text" required class="form-control" style="width:300px;" />
                <label>Last Name</label>
                <input name="lname" type="text" required class="form-control" style="width:300px;" />
                <label>House No</label>
                <input class="form-control" required type="text" name="houseno" style="width:300px;"><br />
                <label>Kebele No</label>
                <select class="form-control" name="kebele_no" style="width:150px;">
                  <option value="k01">01</option>
                </select><br />
                <label>Age</label><br />
                <input required class="form-control" type="number" name="age" min="1" max="200" style="width:100px;"><br />
                <div class="form-group">
                  <label>Sex&nbsp;&nbsp;&nbsp;&nbsp;</label>
                  <label class="radio-inline">
                    <input type="radio" name="sex" required id="optionsRadiosInline1" value="male">Male
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="sex" required id="optionsRadiosInline2" value="female">Female
                  </label>

                </div>

              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="well">
              <label>Educational Status</label>
              <select class="form-control" name="es" style="width:300px;">
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
              <input type="file" name="ph" /> <br />
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
  include 'footer.php';
  ?>