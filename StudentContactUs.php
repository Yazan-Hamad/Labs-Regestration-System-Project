<?php
session_start();
if(!$_SESSION['login'])
echo "<script> document.location.href='StudentLogin.php';</script>";

$name=$_SESSION['user'];
$lname= $_SESSION['userl'];
$ID = $_SESSION['id'];

?>

<html>
<head>
	<title>Student Main Page</title>
	<link href="labwebsitestyle.css" rel="stylesheet" type="text/css" media="all" />
    <script>
        function msg1(str){
        
         alert(str);   
        
        }
       
        
    </script>
</head>
    
    
    
    
    
    
<body>
    <div class="topnav">
   <a  href="StudentMain.php">Home</a>
    <a  href="StudentSchedule.php">My Schedule</a>
  <a  href="StudentRegistration.php">Register</a>
    <a class="active" href="StudentContactUs.php">Contact Us</a>
    <a href="StudentLogout.php">Sign Out</a>
    <p>LABs Regestration System</p>
</div>


	<div class="form3">
	<h2>Your Message</h2>
        <div id="schedule">
        
       <form method="post" action="" >
		
        
			<div>
                <textarea id="w3review" name="Message" rows="4" cols="50" maxlength="500" required></textarea>
			</div>
           <br>
           <br>
           
      <input type="submit" name="subM" value="Send"/>
           
           <br>
           <br>
           
            <label style="color: #f2f2f2; padding-right:5px">To Attach a file, please share it with OneDrive or Google Drive and attach the link inside the message</label>
	</form>
        
        
        </div>
    </div>
    
    
</body>
</html>

<?php

     if(isset($_POST['subM'])){
         $M = $_POST['Message'];
         $con = mysqli_connect('127.0.0.1','root','','lab_project');
         $query = "INSERT INTO students_messages (`id`, `fname`, `lname`, `message`) VALUES ('$ID','$name','$lname','$M')";
         
         if(mysqli_query($con,$query))
             echo '<script> msg1("Message Sent!");</script>';
         else
             echo '<script> msg1("'.mysqli_error($con).'");</script>';
         
     }






?>