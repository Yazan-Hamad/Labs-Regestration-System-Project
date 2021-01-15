
<!DOCTYPE html>
<html>
<head>
	<title>Student Log In</title>
	<link href="labwebsitestyle.css" rel="stylesheet" type="text/css" media="all" />
    <script>
    function wrgpass(){
        document.getElementById("wrong").innerHTML="incorrect username/password";
        setTimeout(function(){ document.getElementById("wrong").innerHTML=""; }, 2000);
        
    }
        
        
     function validation()  
            {  
                var id=document.f1.un.value;  
                var ps=document.f1.pwd.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("Student ID and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("Student ID field is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
    </script>
</head>
 
<body >

<div class="topnav">
   <a href="index.html">Home</a>
    <a class="active" href="StudentLogin.php">Student</a>
  <a  href="AdminLogin.php">Admin</a>
    <a href="sign up.php">Sign up for new students</a>
    <p>LABs Regestration System</p>
</div>

<div class="title">
  <h1 >LABs Registration System</h1>
</div>


<div class="form">
    <div id="wrong" style="color:
#8b0000;"></div>
	<form method="post" action="" name="f1" onsubmit = "return validation()">
        	<h4>Student ID</h4>
			<div>
					<input type="text" name="un" />
			</div>
		<h4>Password</h4>
			<div>
					<input type="password" name="pwd" />
			</div>
		<br>
			<div>
					<input type="submit" name="submit" class="button button1" value="Log In" />
			</div>
	</form>
	<br>
	<p>New student? <a href="sign up.php">sign up</a></p>
    
    
    
</div>


    
    
    
    <?php
    
session_start();
$_SESSION['login']=false;
    
    if(isset($_POST['submit'])==1)
    {

$con = mysqli_connect('127.0.0.1','root','','lab_project');
$sname = $_POST['un'];
$spass=$_POST['pwd'];

        
$query = "SELECT * FROM students WHERE id = '$sname' AND BINARY password='$spass'";
$result = mysqli_query($con, $query);

$num= mysqli_num_rows($result);

if($num==1){
	$_SESSION['login']=true;
    $query2 = "SELECT fname, lname FROM students WHERE id = '$sname' AND BINARY password='$spass'";
	$nameRh= mysqli_query($con, $query2);
    $nameRo = mysqli_fetch_assoc($nameRh);
    $_SESSION['user']= $nameRo['fname'];
    $_SESSION['userl']= $nameRo['lname'];
    $_SESSION['id']=$_POST['un'];
    
	header('Location: /mysite/StudentMain.php');
}
	else
echo '<script> wrgpass();</script>';
    }
	


?>
</body>

</html>