<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>3rd year</title>
    <link rel="stylesheet">
    <style>
        body {
  margin: 0;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  height: 5%;
  margin-top: 1%;
  background-color: #070606;
  position: fixed;
}

li a {
  color: #f0ecec;
  padding: 30px 100px;
  text-decoration: none;
}

li a.active {
  background-color: #16cf8b;
  color: rgb(8, 8, 8);
}

li a:hover:not(.active) {
  background-color: #555;
  color: rgb(240, 232, 232);
}
img {
  width: 150px;
  height: 150px;
}

.btn
{
display: inline-block;
padding: 10px 30px;
font-size: 20px;
background: #333;
color: #fff;
margin: 0 5px;
margin-top: 5%;
text-transform: capitalize;
position: absolute;
top: 60px;
right: 1100px;
text-decoration: none;
}
.btn:hover
{
  background:  #16cf8b;
}


.btn1
{
display: inline-block;
padding: 10px 30px;
font-size: 20px;
background: #333;
color: #fff;
margin: 0 5px;
margin-top: 5%;
text-transform: capitalize;
position: absolute;
top: 60px;
right: 800px;
text-decoration: none;
}
.btn1:hover
{
  background:  #16cf8b;
}

.btn2
{
  display: inline-block;
  padding: 10px 30px;
  font-size: 20px;
  color: #fff;
  margin: 0 5px;
  margin-top: 5%;
  text-transform: capitalize;
  position: absolute;
  top: 60px;
  right: 550px;
  background-color: #f5faf8;
  color: rgb(8, 8, 8); 
  border-top-style: solid;
  border-color: #16cf8b;
  text-decoration: none;
}
.btn2:hover
{
  background:  #16cf8b;
}

.btn3
{
  display: inline-block;
  padding: 10px 30px;
  font-size: 20px;
  background: #333;
  color: #fff;
  margin: 0 5px;
  margin-top: 5%;
  text-transform: capitalize;
  position: absolute;
  top: 60px;
  right: 300px;
  text-decoration: none;
}
.btn3:hover
{
  background:  #16cf8b;
}
div .div1 {
margin-left: 25%;
padding: 1px 16px;
height: 10px;
background: url('bg1.webp');
overflow: auto;
}
table
{
  font-family: Calibri;
  color: #0a0a0a;
  font-size: 20pt;
  font-style: normal;
  margin-top: 10%;
  margin-left: 17%;
  background-color: rgb(246, 248, 248);
  border-collapse: collapse;
  border: 2px;
  width: 70%;
  text-align: center;
}
table.inner
{
  border:1px;
}
tr {
height: 60px;
}
.cont {
display: flex;
justify-content: space-between;
margin-top: 100px;
}
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
                        window.open('entc3.pdf', '_blank');
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
                        window.open('it3.pdf', '_blank');
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
                        window.open('comp3.pdf', '_blank');
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
                        window.open('ee3.pdf', '_blank');
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
                        window.open('mech3.pdf', '_blank');
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
                        window.open('civil3.pdf', '_blank');
                    });
                </script>  
            </td>
        </tr>
        
    </table>

</body>
</html>