<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
	<link href="labwebsitestyle.css" rel="stylesheet" type="text/css" media="all" />
    
    <script>
        function msg(str,flag){
            if(!flag)
                document.getElementById("wrong").style.color="#8b0000";
            else
                document.getElementById("wrong").style.color="#C5FED9";
            
        document.getElementById("wrong").innerHTML=str;
        setTimeout(function(){ document.getElementById("wrong").innerHTML=""; }, 7000);
        
    }
    function validation()  
            {  
                var id=document.f1.sid.value;  
                var ps=document.f1.spwd.value;  
                var ps2=document.f1.rspwd.value; 
                var fn=document.f1.sfname.value; 
                var ln=document.f1.slname.value;
                var bod=document.f1.BOD.value;
                
                if(id.length=="" || ps.length=="" || ps2.length=="" 
                   || fn.length==""  || ln.length=="" || bod.length=="") {  
                    alert("Please make sure to fill out all fields");  
                    return false;  
                }  
                else  
                {  
                    if(ps!=ps2) {  
                        alert("Passwords fields are not same");  
                        return false;  
                    }
                    
                    else{
                        if(!(/\b\d{5}\b/.test(id))){
                            alert("Please enter a valid student ID");
                            return false;}
                    }
                     
                }                             
            }  
    
    </script>
</head>
<body>
<div class="topnav">
  <a href="index.html">Home</a>
    <a href="StudentLogin.php">Student</a>
  <a  href="AdminLogin.php">Admin</a>
    <a class="active" href="sign up.html">Sign up for new students</a>
    <p>LABs Regestration System</p>
</div>

<div class="title">
  <h1>LABs Registration System</h1>
</div>


<div class="form">
    <div id="wrong"></div>
	<form method="post" action="" name="f1" onsubmit = "return validation()">
		<h4>Student ID</h4>
			<div>
					<input type="number" name="sid" />
			</div>
	   <h4>First Name</h4>
			<div>
					<input type="text" pattern="[A-Za-z]{2,14}" title="Text Only with length from 2 to 14" name="sfname" />
			</div>
        <h4>Last Name</h4>
			<div>
					<input type="text" pattern="[A-Za-z]{2,14}" title="Text Only with length from 2 to 14" name="slname" />
			</div>
        <h4>Birth of Date</h4>
			<div>
					<input type="date" name="BOD" />
			</div>
		<h4>Password</h4>
			<div>
					<input type="password" pattern="{6}" name="spwd" />
			</div>
		<br>
		<h4>Re-enter Password</h4>
			<div>
					<input type="password" name="rspwd" />
			</div>
		<br>
			<div>
					<input type="submit" name="submit" value="Sign Up" class="button button1" />
			</div>
	</form>
	<br>
	<p>Already Registered? <a href="StudentLogin.php">Log In</a></p>
	
</div>
</body>

</html>

<?php
$passwordREGEX = '/^(?=.*[A-Z])(?=.*[!@#$&*])(?=.*[0-9])(?=.*[a-z]).{6}$/';

 if(isset($_POST['submit'])==1){
     $PASS = $_POST['spwd'];
     if (!preg_match($passwordREGEX,$PASS)) {
	echo '<script> msg("Password must have uppercase, lowercase, digit, special character and must be with length 6",0);</script>';
         die();
}
     session_start();
     $con = mysqli_connect('127.0.0.1','root','','lab_project');
     $ID = $_POST['sid'];
     $NAME = $_POST['sfname'];
     $lNAME = $_POST['slname'];
     $BOD = $_POST['BOD'];
     
     $query="select * from students where id = '$ID'";
     
     $result = mysqli_query($con,$query);
     
     $num = mysqli_num_rows($result);
     
     
     if($num==1){
        echo '<script> msg("There is already an existing account with this ID",0);</script>'; 
     }
     else
     {
         $query2="insert into students(fname,lname,id,password,bod) values ('$NAME','$lNAME','$ID','$PASS','$BOD')";
         mysqli_query($con,$query2);
         
         $con2 = mysqli_connect('127.0.0.1','root','','lab_enroll');
         if (!$con2) {
            die("Connection failed: " . mysqli_connect_error());
                            }
         $tableName = "T" . $ID;
         $query3 = "create table $tableName (
         number INT(6) UNSIGNED PRIMARY KEY,
         name VARCHAR(30) NOT NULL,
         days tinytext NOT NULL,
         time VARCHAR(11) NOT NULL,
         hall VARCHAR(20) NOT NULL,
         section int(2) NOT NULL,
         instructor tinytext NOT NULL
         )";
         
        if( mysqli_query($con2,$query3))
            echo '<script> msg("Account Created Successfully!",1);</script>';
        else    {
            echo "Error creating table: " . mysqli_error($con2);
            $fix = "DELETE FROM `students` WHERE id = '$ID'";
            mysqli_query($con,$fix);
        }
         
         mysqli_close($con2);
     }
     
     
     mysqli_close($con);
     
     
     
     // Qqqq1@
     
 }


?>