<!DOCTYPE html>
<html>
<head>
	<title>Admin Log In</title>
	<link href="labwebsitestyle.css" rel="stylesheet" type="text/css" media="all" />
    <script>
    function wrgpass(){
        alert("Wrong Information");
        
    }
    
    </script>
</head>

<body>
<div class="topnav">
  
  <a href="index.html">Home</a>
    <a href="StudentLogin.php">Student</a>
  <a class="active" href="AdminLogin.php">Admin</a>
    <a href="sign up.php">Sign up for new students</a>
    <p>LABs Regestration System</p>
</div>

<div class="title">
  <h1>LABs Registration System</h1>
</div>


<div class="form blue">
	<form method="post" action="">
		<h4 style="color: #f2f2f2;">Email</h4>
			<div>
					<input type="Email" name="un" />
			</div>
		<h4 style="color: #f2f2f2;">Password</h4>
			<div>
					<input type="password" name="pwd" />
			</div>
		<br>
			<div>
					<input type="submit" name="submit" class="button button3" value="Log In" />
			</div>
	</form>
</div>



</body>

            <?php
    
            session_start();
            $_SESSION['login2']=false;
    
            if(isset($_POST['submit'])==1)
            {

            $con = mysqli_connect('127.0.0.1','root','','lab_project');
            $sname = $_POST['un'];
            $spass=$_POST['pwd'];

        
                $query = "SELECT email, password FROM admins WHERE email = '$sname' AND BINARY password='$spass'";
                $result = mysqli_query($con, $query);

                $num= mysqli_num_rows($result);

                if($num==1){
	               $_SESSION['login2']=true;
    
	
                    $nameRo = mysqli_fetch_assoc($result);
  
    
    
	               header('Location: /mysite/AdminMain.php');
                            }
	   else
           echo '<script> wrgpass();</script>';
    }
	


?>
</html>