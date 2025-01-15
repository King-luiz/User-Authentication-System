<?php
$host = 'localhost'; 
$user = 'root';      
$password = '';   
$dbname = 'mytrials'; 

// Establish the connection
$con = mysqli_connect($host, $user, $password, $dbname);

// Check the connection
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
