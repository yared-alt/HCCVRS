<?php
include("includes/db_con.php"); // Ensure this file contains the mysqli connection code
session_start(); // Starting Session

// Storing Session
if (isset($_SESSION['login_user'])) {
    $user_check = $_SESSION['login_user'];

    // SQL Query To Fetch Complete Information Of User
    $query = "SELECT username FROM account WHERE username = ?";
    $stmt = $con->prepare($query); // Prepare the statement
    $stmt->bind_param("s", $user_check); // Bind the parameter
    $stmt->execute(); // Execute the query
    $stmt->store_result(); // Store the result

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($login_session); // Bind the result to a variable
        $stmt->fetch(); // Fetch the result
    } else {
        header('Location: index.php');
        exit();
    }

    $stmt->close(); // Close the statement
} else {
    header('Location: index.php');
    exit();
}

if (!isset($login_session)) {
    $con->close(); // Close the connection
    header('Location: index.php');
    exit();
}
?>