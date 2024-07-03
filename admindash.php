<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: Adminlogin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            background: url('img.jpg');
            background-size:cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
        }

        nav {
            display: flex;
            background-color: #555;
            padding: 1em;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
        }

        section {
            padding: 20px;
            text-align: center;
        }

        .button-container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .button-container a {
            background-color: #333;
            color: white;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <header>
        <h1>Admin Dashboard</h1>
    </header>

    <section>
        <h2>Admin Actions</h2>
        <div class="button-container">
            <a href="add_teacher.php">Add New Teacher</a>
            <a href="add_student.php">Add New Student</a>
        </div>
    </section>

</body>
</html>
