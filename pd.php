<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['id'])) {
    header("location: login.php");
    exit();
}

// Check if session variables are set before accessing them
$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$first_name = isset($_SESSION['first_name']) ? $_SESSION['first_name'] : '';
$last_name = isset($_SESSION['last_name']) ? $_SESSION['last_name'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$address = isset($_SESSION['address']) ? $_SESSION['address'] : '';
$department = isset($_SESSION['department']) ? $_SESSION['department'] : '';
$dob = isset($_SESSION['dob']) ? $_SESSION['dob'] : '';
$gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
$year = isset($_SESSION['year']) ? $_SESSION['year'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Details</title>
    <style>
        body{
            background: url('img.jpg');
            background-size:cover;
            background-repeat: no-repeat;
        }
        
        </style>
    <!-- Add your CSS styles here -->
</head>
<body>
    <div class="container" style="text-align: center";>
        <h2>Welcome, <?php echo $first_name . " " . $last_name; ?>!</h2>
        <h3>Your Personal Details:</h3>
        <ul>
            <li>ID: <?php echo $id; ?></li>
            <li>Username: <?php echo $username; ?></li>
            <li>Email: <?php echo $email; ?></li>
            <li>Address: <?php echo $address; ?></li>
            <li>Department: <?php echo $department; ?></li>
            <li>Date of Birth: <?php echo $dob; ?></li>
            <li>Gender: <?php echo $gender; ?></li>
            <li>Year: <?php echo $year; ?></li>
        </ul>
        <a href="dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>
