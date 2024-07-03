<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>syllabus</title>
    <link rel="stylesheet" href="sttyle.css">
    <style>
        
    </style>
</head>
<body style="background: url('img.jpg');background-repeat: no-repeat;background-size:cover;">
<button><a href="welcome.php">Back</a></button>


    <a href="syllabus.php" class="btn">1st Year</a>
    <a href="2ndyear.php" class="btn1">2nd Year</a>
    <a href="3rdyear.php" class="btn2">3rd Year</a>
    <a href="4thyear.php" class="btn3">4th Year</a>
    <br><br>
    <table>
        <tr style="font-weight: bold;" ;>
            <br><br>
            <td>Sr.no</td>
            <td> Branch</td>
            <td>Syllabus</td>
        </tr>
        <tr>
            <td>1</td>
            <td> E&TC</td>
            <td><button id="openPdfButton">Open PDF</button>
                <script>
                    document.getElementById('openPdfButton').addEventListener('click', function() {
                        window.open('pdf1.pdf', '_blank');
                    });
                </script>  
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>IT</td>
            <td><button id="openPdfButton">Open PDF</button>
                <script>
                    document.getElementById('openPdfButton').addEventListener('click', function() {
                        window.open('pdf1.pdf', '_blank');
                    });
                </script>  
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Computer</td>
            <td><button id="openPdfButton">Open PDF</button>
                <script>
                    document.getElementById('openPdfButton').addEventListener('click', function() {
                        window.open('pdf1.pdf', '_blank');
                    });
                </script>  
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Electrical</td>
            <td><button id="openPdfButton">Open PDF</button>
                <script>
                    document.getElementById('openPdfButton').addEventListener('click', function() {
                        window.open('pdf1.pdf', '_blank');
                    });
                </script>  
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>Mechanical</td>
            <td><button id="openPdfButton">Open PDF</button>
                <script>
                    document.getElementById('openPdfButton').addEventListener('click', function() {
                        window.open('pdf1.pdf', '_blank');
                    });
                </script>  
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td>Civil</td>
            <td><button id="openPdfButton">Open PDF</button>
                <script>
                    document.getElementById('openPdfButton').addEventListener('click', function() {
                        window.open('pdf1.pdf', '_blank');
                    });
                </script>  
            </td>
        </tr>
        
    </table>

</body>
</html>