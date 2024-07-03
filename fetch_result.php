<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        body {
            background:url('img.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .form-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
    <title>Fetch Student Result</title>
</head>
<body>
<button><a href="welcome.php">Back</a></button>
    <div class="form-container">
        <h2>Check Result</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="seat_no">Seat No :</label>
            <input type="text" name="seat_no" required>

            <label for="mother_name">Mother's Name :  </label>
            <input type="password" name="mother_name" required>

            <button type="submit">Check Result</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Establish a connection to your database
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'login';

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve form data
            $seat_no = $_POST['seat_no'];
            $mother_name = $_POST['mother_name'];

            // Fetch result based on seat_no and mother_name
            $sql = "SELECT * FROM result WHERE seat_no = '$seat_no' AND mother_name = '$mother_name'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Display results
                while ($row = $result->fetch_assoc()) {
                    echo "<h3>Student ID: " . $row['student_id'] . "</h3>";
                    echo "<p>Total Marks: " . $row['total_marks'] . "</p>";
                    echo "<p>Percentage: " . $row['percentage'] . "%</p>";
                    echo "<p>Class: " . $row['class'] . "</p>";
                }
            } else {
                echo "<p>No results found for the provided seat_no and mother_name.</p>";
            }

            // Close the database connection
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
