<?php
$con = new mysqli('localhost', 'root', '', 'cvrs_db');

if ($con->connect_error) {
    die('Could not connect: ' . $con->connect_error);
}

echo "Connected successfully";
?>