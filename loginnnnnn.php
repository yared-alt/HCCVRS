<?php
include("includes/db_con.php");
// session_start(); // Starting Session

if (isset($_POST['login'])) 
{   
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
$type='';
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from account where password ='$password' AND username='$username'");
$rows = mysql_num_rows($query);
$data = mysql_fetch_array($query);
$type = $data['user_type']; 
$_SESSION['id']=$data['account_id'];   
if ($rows > 0) 
{
$_SESSION['username'] = $data['username'];
$_SESSION['fname'] = $data['fname'];

    if($type=='C_admin')
        {   
             $_SESSION['login_user'] = $username;
            header("location:C_index.php");
        }
    elseif ($type=='K_admin')
        {
            $_SESSION['login_user']=$username; // Initializing Session
            header("location:K_index.php");   
        }
    elseif ($type=='Resident')
        {

            $_SESSION['login_user']=$username; // Initializing Session

            header("location:R_index.php"); 
        }
    else
    {
        header("location:index.php"); 
        echo "Username and password is invalid!";
    }
}
else 
{
 header("location:index.php"); 
}
mysql_close($con); // Closing Connection
}  
          

?>