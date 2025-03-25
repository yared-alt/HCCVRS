<?php
include('userhead.php');
?>

<body>

  <div id="wrapper">
    <?php
    include('citynavbar.php');
    ?>

    <div id="page-wrapper">

      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">
              Population Distribution<br /><small>Major Population Related Information</small>
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
      <?php
      $con = mysql_connect("localhost", "root", "");
      mysql_select_db("cvrs_db");
      ?>
      <div class="row">
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Total Number Of Residents</h3>
            </div>
            <div class="panel-body">
              <?php
              $sql = "select * from residentregistration";
              $result = mysql_query($sql);
              $num = mysql_num_rows($result);
              echo $num;
              ?>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Residents Below 18</h3>
            </div>
            <div class="panel-body">
              <?php
              $sql = "select * from residentregistration where age<18";
              $result = mysql_query($sql);
              $num = mysql_num_rows($result);
              echo $num;
              ?>
            </div>
          </div>
        </div>
        <!-- /.col-sm-4 -->
        <div class="col-sm-4">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Total Number of Males</h3>
            </div>
            <div class="panel-body">
              <?php
              $sql = "select * from residentregistration where sex='male'";
              $result = mysql_query($sql);
              $num = mysql_num_rows($result);
              echo $num;
              ?>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Residents Above18</h3>
            </div>
            <div class="panel-body">
              <?php
              $sql = "select * from residentregistration where age>=18";
              $result = mysql_query($sql);
              $num = mysql_num_rows($result);
              echo $num;
              ?>
            </div>
          </div>
        </div>
        <!-- /.col-sm-4 -->
        <div class="col-sm-4">
          <div class="panel panel-danger">
            <div class="panel-heading">
              <h3 class="panel-title">Total Number of Females</h3>
            </div>
            <div class="panel-body">
              <?php
              $sql = "select * from residentregistration where sex='female'";
              $result = mysql_query($sql);
              $num = mysql_num_rows($result);
              echo $num;
              ?>
            </div>
          </div>
          <div class="panel panel-danger">
            <div class="panel-heading">
              <h3 class="panel-title">Number of Infants</h3>
            </div>
            <div class="panel-body">
              <?php
              $i = 0;
              $sql = "select * from birthregistration";
              $result = mysql_query($sql);

              $Today = date('y:m:d');
              $now = date('Y', strtotime($Today));

              while ($row = mysql_fetch_assoc($result)) {
                $year = substr($row['date_of_birth'], 0, 4);
                $age = $now - $year;
                if ($age <= 5) {
                  $i++;
                }
              }
              echo $i;


              $num = mysql_num_rows($result);
              echo "Total Number Of Infants" . $num;
              ?>
            </div>
          </div>
        </div>
        <!-- /.col-sm-4 -->
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Number of Registered Houses in K_01</h3>
            </div>
            <div class="panel-body">
              <?php
              $sql = "select * from residentregistration where kebele_no='k01'";
              $result = mysql_query($sql);
              $num = mysql_num_rows($result);
              echo $num;
              ?>
            </div>
          </div>
        </div>
        <!-- /.col-sm-4 -->
        <div class="col-sm-4">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Number of Registered Houses in K_02</h3>
            </div>
            <div class="panel-body">
              <?php
              $sql = "select * from residentregistration where kebele_no='k02'";
              $result = mysql_query($sql);
              $num = mysql_num_rows($result);
              echo $num;
              ?>
            </div>
          </div>
        </div>
        <!-- /.col-sm-4 -->
        <div class="col-sm-4">
          <div class="panel panel-danger">
            <div class="panel-heading">
              <h3 class="panel-title">Number of Registered Houses in K_03</h3>
            </div>
            <div class="panel-body">
              <?php
              $sql = "select * from residentregistration where kebele_no='k03'";
              $result = mysql_query($sql);
              $num = mysql_num_rows($result);
              echo $num;
              ?>
            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Married Resident</h3>
            </div>
            <div class="panel-body">
              <?php
              $sql = "select * from marriageregistration";
              $result = mysql_query($sql);
              $num = mysql_num_rows($result);
              echo "Married Residents" . $num;
              ?>
            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Number of Scholar</h3>
            </div>
            <div class="panel-body">
              <?php
              $sql = "select * from residentregistration where educational_status='Digree'";
              $result = mysql_query($sql);
              $deg = mysql_num_rows($result);

              $sql2 = "select * from residentregistration where educational_status='Masters'";
              $result = mysql_query($sql2);
              $mas = mysql_num_rows($result);

              $sql3 = "select * from residentregistration where educational_status='PHD'";
              $result = mysql_query($sql3);
              $phd = mysql_num_rows($result);
              $total = $deg + $mas + $phd;
              echo $total;
              ?>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Residents Below 18</h3>
            </div>
            <div class="panel-body">
              <?php
              $sql = "select * from residentregistration where age<18";
              $result = mysql_query($sql);
              $num = mysql_num_rows($result);
              echo  $num;
              ?>
            </div>
          </div>
        </div>
        <!-- /.col-sm-4 -->
      </div>

      <div class="page-header">
      </div>
      <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php
    include 'footer.php';
    ?>