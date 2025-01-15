<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('db.php'); 
// Ensuring the database connection is properly established
if (!$con) { 
    $con = mysqli_connect($host, $user, $password, $dbname); 
    
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo "Connected successfully"; 
    }
}

// If form submitted, insert values into the database.
if (isset($_POST['username'])) { 
    // Sanitize and escape user inputs
    $username = mysqli_real_escape_string($con, stripslashes($_POST['username']));
    $email = mysqli_real_escape_string($con, stripslashes($_POST['email']));
    $password = mysqli_real_escape_string($con, stripslashes($_POST['password']));
    $trn_date = date("Y-m-d H:i:s");

    // Created SQL query to insert data into the database
    $query = "INSERT INTO `users` (username, password, email, trn_date) 
              VALUES ('$username', '" . md5($password) . "', '$email', '$trn_date')";
    
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<div class='form'>
                <h3>You are registered successfully.</h3>
                <br/>Click here to <a href='login.php'>Login</a></div>";
    } else {
        echo "<div class='form'>
                <h3>Registration failed. Please try again.</h3>
                <br/>Error: " . mysqli_error($con) . "</div>";
    }
} else {
?>
<div class="form">
    <h1>Registration</h1>
    <form name="registration" action="" method="post">
        <input type="text" name="username" placeholder="Username" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <input type="submit" name="submit" value="Register" />
    </form>
</div>
<?php 
}

// Close the database connection at the end of the script
mysqli_close($con);
?>
</body>
</html>
