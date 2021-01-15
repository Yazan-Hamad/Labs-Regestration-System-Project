<?php
session_start();
if(!$_SESSION['login'])
echo "<script> document.location.href='StudentLogin.php';</script>";

$name=$_SESSION['user'];
?>

<html>
<head>
	<title>Student Main Page</title>
	<link href="labwebsitestyle.css" rel="stylesheet" type="text/css" media="all" />
    
</head>
    
    
    
    
    
    
<body>
    <div class="topnav">
   <a  href="StudentMain.php">Home</a>
    <a class="active" href="StudentSchedule.php">My Schedule</a>
  <a  href="StudentRegistration.php">Register</a>
    <a href="StudentContactUs.php">Contact Us</a>
    <a href="StudentLogout.php">Sign Out</a>
    <p>LABs Regestration System</p>
</div>


	
    
    <div class="form3">
	<h2>My Schedule</h2>
        <div id="schedule">
        
        <?php
                $tableNAME = "t".$_SESSION['id'];
                $con2 = mysqli_connect('127.0.0.1','root','','lab_enroll');
                $sql = "SELECT number, name, days, time, hall, section, Instructor FROM $tableNAME";
                $result = mysqli_query($con2, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<table id='customers'><tr><th>NUMBER</th><th>NAME</th><th>DAYS</th><th>TIME</th><th>HALL</th><th>SECTION</th><th>INSTRUCTOR</th></tr>";
                    while($row = mysqli_fetch_assoc($result)) {
      
                    echo "<tr><th>". $row["number"]."</th><th>". $row["name"]."</th><th>". $row["days"]."</th><th>". $row["time"]."</th><th>". $row["hall"]."</th><th>".$row["section"]."</th><th>".$row["Instructor"]."</th></tr>";
      
                    }
    
                    echo "</table>";
                    }


                    else {
                    echo "";
                        }


        ?>
        
        
        </div>
    </div>
    
     
</body>
</html>



