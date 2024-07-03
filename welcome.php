<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Dashboard</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">

    <style>
        body {
          background: url('img.jpg');
            background-size:cover;
            background-repeat: no-repeat;
        }

        .navbar {
            background-color: #343a40; /* Dark background color */
        }

        .navbar-dark .navbar-toggler-icon {
            background-color: #ffffff; /* White color for the toggle icon */
        }

        .navbar-dark .navbar-nav .nav-link {
            color: #ffffff;
        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: #f8f9fa; /* Lighter color on hover */
        }

        .container {
            text-align: center;
            margin-top: 80px;
        }

        .welcome-text {
            color: #ffffff;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">Student Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pd.php">Personal Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="syllabus.php">Syllabus</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="fetch_result.php">Result</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="news.php">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://docs.google.com/forms/d/e/1FAIpQLScvGfG43spjrEFbmq1EcfHsqT7rUDA2qVliQdEZcYKFEa3mFg/viewform">Send Query</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">logout</a>
            </li>
        </ul>
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><img src="https://img.icons8.com/metro/26/000000/guest-male.png">
                        <?php echo "Welcome " . $_SESSION['username'] ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h3 class="welcome-text"><?php echo "Welcome " . $_SESSION['username'] ?>! </h3>
    <hr>
</div>

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
