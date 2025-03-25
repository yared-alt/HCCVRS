
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
<small>Account Management</small>
</h1>
</div>
</div>
</div>
<!-- /.container-fluid -->
<div class="row">
<div class="col-lg-12">


<div class="panel-body">
<div class="dataTable_wrapper">
    <form action="add_kadmin.php" name="cadd" method="post">
                              <input type="submit" class="btn btn-primary" name="add" value="&nbsp;&nbsp;Add Kebele Admin">
                            </form><br>
<table class="table table-striped table-bordered table-hover" style="width:600px;"id="dataTables-example">
<thead>
<tr bgcolor="#3399FF">
<th style="width:100px;">Account Id</th>
<b><th bgcolor="#3399FF">Name</th>
<th>Sex</th>
<th>Remove</th>
</tr></b>
</thead>
<tbody>

<?php
$con=mysql_connect('localhost','root','');
    mysql_select_db("cvrs_db",$con);
    $sql="select * from account ORDER BY account_id ASC";

    $res=mysql_query($sql);
    while ($row=mysql_fetch_assoc($res)) {
        $user_type=$row['user_type'];
        if($user_type=='Kebele_admin'){
        $id=$row['account_id'];
        ?>
        <tr >
<td><?php echo $row['account_id'];?></td>
<td><?php echo $row['fname']." ".$row['mname']." ".$row['lname'];?></td>
<td><?php echo $row['sex'];?></td>
<td>
<?php
        
        echo"<a href ='delete_kadmin.php?id=$id'class='btn btn-defualt'>Delete</a>";
    
    ?>
</td>
</tr>
    <?php
}}
?>


</tbody>
</table>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
<?php
include'footer.php';
?>