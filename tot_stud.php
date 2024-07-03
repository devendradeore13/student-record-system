<?php
require_once "config.php";

// Query to get all data from the "students" table
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Fetch all rows as an associative array
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $error = "Error fetching data";
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Data</title>
    <style>
        body {
            background:#3cb371;
            background-size:cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
          
           
        }

        h2 {
            color: #333333;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php if (isset($error)) : ?>
        <p class="error"><?php echo $error; ?></p>
    <?php else : ?>
        <h2>LIST OF STUDENTS:</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Address</th>
                    <th>Department</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Year</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['dob']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['year']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
