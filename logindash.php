<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dashboard</title>
    <style>
        body {
            
            height: 100vh;
            width: 100%;
            background: linear-gradient(rgba(0,0,0,0.7) 80%,#bb751a), url('img2.webp');
            background-size: 100% 100%;
            font-family: Arial, sans-serif;
            background-color: aqua;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .dashboard {
            display: flex;
            justify-content: space-around;
            width: 80%;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card {
            text-align: center;
            padding: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .card:hover {
            background-color: #f0f0f0;
        }

        .teacher {
            background-color: #3498db;
            color: #fff;
        }

        .student {
            background-color: #2ecc71;
            color: #fff;
        }

        .admin {
            background-color: #e74c3c;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="dashboard">
        <div class="card teacher" onclick="location.href='teacherslogin.php'">
            <h2>Teacher</h2>
            <p>Login as a teacher</p>
        </div>
        <div class="card student" onclick="location.href='login.php'">
            <h2>Student</h2>
            <p>Login as a student</p>
        </div>
        <div class="card admin" onclick="location.href='Adminlogin.php'">
            <h2>Admin</h2>
            <p>Login as an admin</p>
        </div>
    </div>
</body>

</html>
