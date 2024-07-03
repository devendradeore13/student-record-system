<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("location: admindash.php");
    exit;
}

require_once "config.php";

$username = $password = "";
$err = "";

// If request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Please enter username + password";
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }

    if (empty($err)) {
        $sql = "SELECT id, username, password FROM admin WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;

        // Try to execute this statement
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $username, $stored_password);
                if (mysqli_stmt_fetch($stmt)) {
                    // Compare passwords in plain text
                    if ($password === $stored_password) {
                        // This means the password is correct. Allow the user to log in
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedin"] = true;

                        // Redirect user to welcome page
                        header("location: admindash.php");
                        exit();
                    } else {
                        $err = "Invalid password";
                    }
                }
            } else {
                $err = "User not found";
            }
        } else {
            echo "Error executing SQL statement: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body style="background: url('img.jpg');
    background-repeat: no-repeat;
    background-size: cover;">
  <div class="box">
    <span class="borderLine"></span>
    <form method="POST" action="Adminlogin.php">
      <h2>Admin Login</h2>
      <div class="inputBox">
        <input type="text" name="username" required="required">
        <span>Username</span>
        <i></i>
      </div>
      <div class="inputBox">
        <input type="password" name="password" required="required">
        <span>Password</span>
        <i></i>
      </div>
      
      <br>
      <input type="submit" value="Login">
    </form>
  </div>
 
</body>
</html>

