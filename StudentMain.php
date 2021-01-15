<?php
session_start();
if(!$_SESSION['login'])
echo "<script> document.location.href='StudentLogin.php';</script>";

$name= $_SESSION['user'];
$lname= $_SESSION['userl'];
?>

<html>
<head>
	<title>Student Main Page</title>
	<link href="labwebsitestyle.css" rel="stylesheet" type="text/css" media="all" />
    
</head>
    
    
    
    
    
    
<body>
    <div class="topnav">
   <a class="active" href="StudentMain.php">Home</a>
    <a  href="StudentSchedule.php">My Schedule</a>
  <a  href="StudentRegistration.php">Register</a>
    <a href="StudentContactUs.php">Contact Us</a>
    <a href="StudentLogout.php">Sign Out</a>
    <p>LABs Regestration System</p>
</div>


	<center><h1 id="name"></h1></center>
    
    <div class="form2">
	<a href="StudentSchedule.php"><button class="button button2">My Schedule</button></a>
	<a href="StudentRegistration.php"><button class="button button2">Register</button></a>
</div>
    
    
    <script>
    var name = "<?php echo $name; ?>";
    var lname = "<?php echo $lname; ?>";
    document.getElementById("name").innerHTML="Welcome back " + name + " " + lname +"!";
    </script>
</body>
</html>


