<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require_once('db.php'); // Used require_once for better error handling
session_start();

// If form submitted, insert values into the database.
if (isset($_POST['username'])) {
    // Removes backslashes
    $username = stripslashes($_REQUEST['username']);

    // Check if the connection is still valid
    if (!$con) { 
        // Re-establish the connection if it's closed
        $con = mysqli_connect($host, $user, $password, $dbname); 

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    // Escapes special characters in a string
    $username = mysqli_real_escape_string($con, $username); 
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password); 

    // Checking is user existing in the database or not
    $query = "SELECT * FROM `users` WHERE username='$username' AND password='" . md5($password) . "'";
    $result = mysqli_query($con, $query); 

    if (!$result) { 
        die("Query failed: " . mysqli_error($con)); 
    }

    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $_SESSION['username'] = $username;
        // Redirect user to index.php
        header("Location: index.php"); 
        exit(); 
    } else {
        echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
    }

} else {
?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<br>
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>
<?php } ?>
</body>
</html>