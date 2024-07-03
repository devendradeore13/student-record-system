<?php
require_once "config.php";

$first_name = $last_name = $email = $username = $password = $confirm_password = $address = $department = $dob = $gender = $year = "";
$first_name_err = $last_name_err = $email_err = $username_err = $password_err = $confirm_password_err = $address_err = $department_err = $dob_err = $gender_err = $year_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Check if first name is empty
    if(empty(trim($_POST["first_name"]))){
        $first_name_err = "First Name cannot be blank";
    } else {
        $first_name = trim($_POST['first_name']);
    }

    // Check if last name is empty
    if(empty(trim($_POST["last_name"]))){
        $last_name_err = "Last Name cannot be blank";
    } else {
        $last_name = trim($_POST['last_name']);
    }

    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Email cannot be blank";
    } else {
        $email = trim($_POST['email']);
    }

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    } else {
        $sql = "SELECT id FROM students WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST['username']);
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1) {
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
    if(empty(trim($_POST['password']))){
        $password_err = "Password cannot be blank";
    } elseif(strlen(trim($_POST['password'])) < 5){
        $password_err = "Password cannot be less than 5 characters";
    } else {
        $password = trim($_POST['password']);
    }

    // Check for confirm password field
    if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
        $confirm_password_err = "Passwords should match";
    }

    // Check if address is empty
    if(empty(trim($_POST["address"]))){
        $address_err = "Address cannot be blank";
    } else {
        $address = trim($_POST['address']);
    }

    // Check if department is selected
    if(empty($_POST["department"])){
        $department_err = "Please select a department";
    } else {
        $department = trim($_POST['department']);
    }

    // Check if dob is empty
    if(empty(trim($_POST["dob"]))){
        $dob_err = "Date of Birth cannot be blank";
    } else {
        $dob = trim($_POST['dob']);
    }

    // Check if gender is selected
    if(empty($_POST["gender"])){
        $gender_err = "Please select a gender";
    } else {
        $gender = trim($_POST['gender']);
    }

    // Check if year of study is empty
    if(empty(trim($_POST["year"]))){
        $year_err = "Year of Study cannot be blank";
    } else {
        $year = trim($_POST['year']);
    }

    // If there were no errors, go ahead and insert into the database
    if(empty($first_name_err) && empty($last_name_err) && empty($email_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($address_err) && empty($department_err) && empty($dob_err) && empty($gender_err) && empty($year_err)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO students (first_name, last_name, email, username, password, address, department, dob, gender, year) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssssssssi", $first_name, $last_name, $email, $username, $hashed_password, $address, $department, $dob, $gender, $year);

            if (mysqli_stmt_execute($stmt)) {
                header("location: login.php");
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
    <title>Student Registration</title>
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
        <h2> Student Registration</h2>
        
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required>
        <span style="color: red;"><?php echo $first_name_err; ?></span>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>
        <span style="color: red;"><?php echo $last_name_err; ?></span>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <span style="color: red;"><?php echo $email_err; ?></span>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <span style="color: red;"><?php echo $username_err; ?></span>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <span style="color: red;"><?php echo $password_err; ?></span>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <span style="color: red;"><?php echo $confirm_password_err; ?></span>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>
        <span style="color: red;"><?php echo $address_err; ?></span>

        <label for="department">Department:</label>
        <select id="department" name="department" required>
            <option value="" disabled selected>Select Department</option>
            <option value="mechanical">Mechanical Engineering</option>
            <option value="electrical">Electrical Engineering</option>
            <option value="computer">Computer Engineering</option>
            <option value="information_technology">Information Technology</option>
            <option value="civil">Civil Engineering</option>
            <option value="electronics_telecommunication">Electronics & Telecommunication Engineering</option>
        </select>
        <span style="color: red;"><?php echo $department_err; ?></span>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>
        <span style="color: red;"><?php echo $dob_err; ?></span>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="" disabled selected>Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        <span style="color: red;"><?php echo $gender_err; ?></span>

        <label for="year">Year of Study:</label>
        <input type="number" id="year" name="year" min="1" max="4" required>
        <span style="color: red;"><?php echo $year_err; ?></span>

        <button type="submit">Register</button>
    </form>
</body>
</html>
