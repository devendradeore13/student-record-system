<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['id'])) {
  header("location: trdash.php");
//  exit;

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
        $sql = "SELECT id, username, password FROM students WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;

        // Try to execute this statement
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        // This means the password is correct. Allow user to login
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedin"] = true;

                        
                       // header("location: trdash.php");
                        exit();
                    }
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="box">
    <span class="borderLine"></span>
    <form method="POST" action="teacherslogin.php">

        <h2>Teacher Login</h2>
        <?php if (isset($error)) : ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
         <div class="inputBox">
                <input type="text" name="username" required>
                <span>username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required>
                <span>password</span>
                <i></i>
            </div>
            <div class="links">
                <a href="Tsignup.php">Register</a>
            </div>
            <br>
            <input type="submit" value="Login">
        </form>
    </div>
    
   
</body>
</html>
