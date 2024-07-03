<?php
require_once "config.php";

$fullname = $email = $mobile = $username = $password = $confirm_password = "";
$fullname_err = $email_err = $mobile_err = $username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Check if full name is empty
    if (empty(trim($_POST["fullname"]))) {
        $fullname_err = "Full Name cannot be blank";
    } else {
        $fullname = trim($_POST['fullname']);
    }

    // Check if email is empty
    if (empty(trim($_POST["email"]))) {
        $email_err = "Email cannot be blank";
    } else {
        $email = trim($_POST['email']);
    }

    // Check if mobile is empty
    if (empty(trim($_POST["mobile"]))) {
        $mobile_err = "Mobile cannot be blank";
    } else {
        $mobile = trim($_POST['mobile']);
    }

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Username cannot be blank";
    } else {
        $sql = "SELECT id FROM teacher WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST['username']);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken";
                } else {
                    $username = trim($_POST['username']);
                }
            } else {
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);

    // Check for password
    if (empty(trim($_POST['password']))) {
        $password_err = "Password cannot be blank";
    } elseif (strlen(trim($_POST['password'])) < 5) {
        $password_err = "Password cannot be less than 5 characters";
    } else {
        $password = trim($_POST['password']);
    }

    // Check for confirm password field
    if (trim($_POST['password']) !=  trim($_POST['confirm_password'])) {
        $confirm_password_err = "Passwords should match";
    }

    // If there were no errors, go ahead and insert into the database
    if (empty($fullname_err) && empty($email_err) && empty($mobile_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO teacher (FULLNAME, EMAIL, MOBILE, username, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssss", $fullname, $email, $mobile, $username, $hashed_password);

            if (mysqli_stmt_execute($stmt)) {
                header("location: teacherslogin.php");
            } else {
                echo "Something went wrong... cannot redirect!";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Registration</title>
    <style>
        body {
            background: url('img.jpg');
            background-size:cover;
            background-repeat: no-repeat;
            
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px; /* Increased width */
            margin: auto; /* Center the form */
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input,
        select {
            width: calc(100% - 16px); /* Adjusted width for two fields per line */
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: inline-block;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2> Teacher Registration</h2>
        
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required>
        <span style="color: red;"><?php echo $fullname_err; ?></span>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <span style="color: red;"><?php echo $email_err; ?></span>

        <label for="mobile">Mobile:</label>
        <input type="text" id="mobile" name="mobile" required>
        <span style="color: red;"><?php echo $mobile_err; ?></span>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <span style="color: red;"><?php echo $username_err; ?></span>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <span style="color: red;"><?php echo $password_err; ?></span>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <span style="color: red;"><?php echo $confirm_password_err; ?></span>

        <button type="submit">Register</button>
    </form>
</body>
</html>
