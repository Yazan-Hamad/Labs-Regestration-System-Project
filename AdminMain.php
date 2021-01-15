<?php
session_start();
if(!$_SESSION['login2'])
echo "<script> document.location.href='AdminLogin.php';</script>";


?>

<html>
<head>
	<title>Admin Main Page</title>
	<link href="labwebsitestyle.css" rel="stylesheet" type="text/css" media="all" />
    
</head>
    
    
    
    
    
    
<body>
    <div class="topnav">
   <a class="active" href="AdminMain.php">Home</a>
    <a  href="AdminAddRemove.php">Add/Remove Labs</a>
  <a  href="AdminOpenClose.php">Open/Close Registeration</a>
    <a href="AdminLogout.php">Sign Out</a>
    <p>LABs Regestration System</p>
</div>


	<center><h1 id="name"></h1></center>
    
    <div class="form2">
	<a href="AdminAddRemove.php"><button class="button button2">Add/Remove Labs</button></a>
	<a href="AdminOpenClose.php"><button class="button button2">Open/Close Registeration</button></a>
</div>
    
    
    <script>
  
    </script>
</body>
</html>