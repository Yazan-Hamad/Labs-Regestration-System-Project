<?php
session_start();
if(!$_SESSION['login2'])
echo "<script> document.location.href='AdminLogin.php';</script>";


$con = mysqli_connect('127.0.0.1','root','','lab_project');
$query = "select state from register_state where id = 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

$state = $row['state'];

mysqli_close($con);

?>



<html>
<head>
	<title>Add/Remove Labs</title>
	<link href="labwebsitestyle.css" rel="stylesheet" type="text/css" media="all" />
    <script>
    
    function msg1(str){
        
         alert(str);   
        
        }
    </script>
</head>
    
    
    
    
    
    
<body>
    <div class="topnav">
   <a href="AdminMain.php">Home</a>
    <a  href="AdminAddRemove.php">Add/Remove Labs</a>
  <a class="active" href="AdminOpenClose.php">Open/Close Registeration</a>
    <a href="AdminLogout.php">Sign Out</a>
    <p>LABs Regestration System</p>
</div>


	<center><h1 id="name"></h1></center>
    
     <div class="form3">
	
        <div id="schedule">
        
        <h1 id = "hh"></h1>
        
        <form method="post" action="" id="ff"></form>
        
        </div>
    </div>
    
    
    <script>
  var s = <?php echo $state; ?>;
  
        if(s){
            document.getElementById("hh").innerHTML="Registration is Open <br><br> ";
            document.getElementById("ff").innerHTML="<input type='submit' value='Close Registration' name='closeR'/>";
            
            
        }
        else {
            document.getElementById("hh").innerHTML="Registration is Closed <br><br> ";
            document.getElementById("ff").innerHTML="<input type='submit' value='Open Registration' name='openR'/>";}
    </script>
    
    
    <?php
            function openReg(){
            $con = mysqli_connect('127.0.0.1','root','','lab_project');
            $query2 = "UPDATE `register_state` SET `state`= 1 WHERE `id`= 1 ";
                if(mysqli_query($con, $query2)){
                    
                    echo '<script> msg1("Regestration Opened!");</script>';
                    }
                else
                    echo '<script> msg1("'.mysqli_error($con).'");</script>';
            mysqli_close($con);
                    }
            
    
    
            function closeReg(){
            $con = mysqli_connect('127.0.0.1','root','','lab_project');
            $query2 = "UPDATE `register_state` SET `state`= 0 WHERE `id`= 1 ";
                if(mysqli_query($con, $query2)){
                    
                    echo '<script> msg1("Regestration Closed!");</script>';
                    }
                else
                    echo '<script> msg1("'.mysqli_error($con).'");</script>';
            mysqli_close($con);
                    }
    
            
            if(isset($_POST['openR']))
                {
                    echo openReg();
                echo "<script> document.location.href='AdminMain.php';</script>";
                }
            
            if(isset($_POST['closeR']))
                {
                    echo closeReg(); 
                 echo "<script> document.location.href='AdminMain.php';</script>";
                }
    ?>
</body>
</html>