<?php
session_start(); // Start the session at the beginning
include("includes/db_con.php"); // Include your MySQLi connection file

$error = '';
$empty = '';
$no_acc = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $empty = "Username or Password cannot be empty.";
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $type = '';

        $query = "SELECT * FROM account WHERE username = ? AND password = ?";
        $stmt = $con->prepare($query); // Prepare the statement
        $stmt->bind_param("ss", $username, $password); // Bind parameters
        $stmt->execute(); // Execute the query
        $result = $stmt->get_result(); // Get the result

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $id = $data['account_id'];
            $name = $data['fname'];
            $photo = $data['photo'];
            $type = $data['user_type'];

            // Set session variables based on user type
            if ($type == 'City_admin') {
                $_SESSION['cityad_loged'] = $id;
                $_SESSION['fname'] = $name;
                $_SESSION['photo'] = $photo;
                header("Location: C_index.php");
                exit();
            } elseif ($type == 'Kebele_admin') {
                $_SESSION['kebele_loged'] = $id;
                $_SESSION['fname'] = $name;
                header("Location: K_index.php");
                exit();
            } elseif ($type == 'Resident') {
                $_SESSION['res_loged'] = $id;
                $_SESSION['fname'] = $name;
                header("Location: R_index.php");
                exit();
            } else {
                header("Location: index.php");
                exit();
            }
        } else {
            echo "<script>
                    alert('Username and password is invalid!');
                    window.location.href = 'index.php';
                  </script>";
            exit();
        }

        $stmt->close();
        $con->close(); 
    }
}
?>