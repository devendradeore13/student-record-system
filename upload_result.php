<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: url('img.jpg');
            background-size:cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .form-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 70px;
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
    <title>Student Result Form</title>
</head>
<body>
    <div class="form-container">
        <h2>Enter Student Result</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="student_id">Student ID:</label>
            <input type="text" name="student_id" required>

            <label for="seat_no">seat_no:</label>
            <input type="text" name="seat_no" required>

            <label for="mother_name">mother_name:</label>
            <input type="mother_name" name="mother_name" required>

            <label for="subject1">Subject 1 Marks:</label>
            <input type="text" name="subject1" required>

            <label for="subject2">Subject 2 Marks:</label>
            <input type="text" name="subject2" required>

            <label for="subject3">Subject 3 Marks:</label>
            <input type="text" name="subject3" required>

            <label for="subject4">Subject 4 Marks:</label>
            <input type="text" name="subject4" required>

            <label for="subject5">Subject 5 Marks:</label>
            <input type="text" name="subject5" required>

            <button type="submit">Submit Result</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
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
            $student_id = $_POST['student_id'];
            $seat_no = $_POST['seat_no']; // Corrected variable name
            $mother_name = $_POST['mother_name'];
            $subject1 = $_POST['subject1'];
            $subject2 = $_POST['subject2'];
            $subject3 = $_POST['subject3'];
            $subject4 = $_POST['subject4'];
            $subject5 = $_POST['subject5'];

            // Calculate total and percentage
            $total_marks = $subject1 + $subject2 + $subject3 + $subject4 + $subject5;
            $percentage = ($total_marks / 500) * 100;

            // Determine class based on percentage
            if ($percentage >= 90) {
                $class = 'A+';
            } elseif ($percentage >= 80) {
                $class = 'A';
            } elseif ($percentage >= 70) {
                $class = 'B';
            } elseif ($percentage >= 60) {
                $class = 'C';
            } elseif ($percentage >= 50) {
                $class = 'D';
            } else {
                $class = 'Fail';
            }

            // Insert data into the database
            $sql = "INSERT INTO result (student_id, seat_no, mother_name, subject1, subject2, subject3, subject4, subject5, total_marks, percentage, class) 
                    VALUES ('$student_id', '$seat_no', '$mother_name', '$subject1', '$subject2', '$subject3', '$subject4', '$subject5', '$total_marks', '$percentage', '$class')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Result stored successfully!</p>";
            } else {
                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }

            // Close the database connection
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
