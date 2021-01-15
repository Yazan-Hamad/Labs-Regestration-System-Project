<?php
session_start();
if(!$_SESSION['login'])
echo "<script> document.location.href='StudentLogin.php';</script>";



$con = mysqli_connect('127.0.0.1','root','','lab_project');
$query = "select state from register_state where id = 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

$state = $row['state'];

if(!$state){

echo "<script> alert('Regestration is not available right now ');</script>";
    mysqli_close($con);
echo "<script> document.location.href='StudentMain.php';</script>";

}
else
    mysqli_close($con);


?>

<html>
<head>
	<title>Student Main Page</title>
	<link href="labwebsitestyle.css" rel="stylesheet" type="text/css" media="all" />
    <script>
        function msg1(str){
        var Duplicate = /duplicate/i;
            if(Duplicate.test(str)){
                alert("You have already registered this lab, if you want to change the section, please drop the lab then add it with the new section number.");
                return false;}
         alert(str);   
        
        }
        
        function clr(){
            document.getElementById('schedule').innerHTML=" ";
        }
        
    </script>
</head>
    
    
    
    
    
    
<body>
    <div class="topnav">
   <a  href="StudentMain.php">Home</a>
    <a  href="StudentSchedule.php">My Schedule</a>
  <a class="active" href="StudentRegistration.php">Register</a>
    <a href="StudentContactUs.php">Contact Us</a>
    <a href="StudentLogout.php">Sign Out</a>
    <p>LABs Regestration System</p>
</div>


	<div class="form3" style="margin-bottom:50px;">
        <div id="wrong"></div>
	<h2>Add Lab</h2>
	       <form method="post" action="">
               
               <span style="margin-right:220px;">
		      <label style="color: #f2f2f2; padding-right:5px;">Number</label>
			  <input type="number" name="num"  style=" width:80px;"  required/>
			 </span>
               
               <span style="">
                <label style="color: #f2f2f2; padding-right:5px">Time</label>
               <select name="time" required>
                   <option value="" disabled selected>Select lab time</option>
                    <option value="8:30-9:30">8:30-9:30</option>
                    <option value="9:30-10:30">9:30-10:30</option>
                    <option value="10:30-11:30">10:30-11:30</option>
                    <option value="11:30-12:30">11:30-12:30</option>
                   <option value="12:30-1:30">12:30-1:30</option>
                </select>
               </span>
               
               <span style="margin-left:220px;">
                <label style="color: #f2f2f2; padding-right:5px">Section</label>
               <input type="number" name="sec" min="0" max="99" style=" width:40px;" required/>
               </span>
               
               			
		<br>
        <br>
			<div>
					<input type="submit" name="add" class="button button3" value="Add" />
			</div>
	       </form>
    </div>
    
    <div class="form3" style="margin-bottom:50px;">
        <div id="wrong2"></div>
	<h2>Drop Lab</h2>
	       <form method="post" action="">
               
               <span style="margin-right:220px;">
		      <label style="color: #f2f2f2; padding-right:5px;">Number</label>
			  <input type="number" name="num2"  style=" width:80px;"  required/>
			 </span>
               
               
               <span style="margin-left:220px;">
                <label style="color: #f2f2f2; padding-right:5px">Section</label>
               <input type="number" name="sec2"  style=" width:40px;" required/>
               </span>
			
		<br>
        <br>
			<div>
					<input type="submit" name="drop" class="button button3" value="Drop" />
			</div>
	       </form>
    </div>
    
    
    <div class="form3">
	<h2>LABs Schedule</h2>
    <span>
    <form method="post" action="">
        <label style="color: #f2f2f2; padding-right:5px">Search for a lab</label>
        <input type="number" placeholder="Enter lab number" style=" width:125px;" name="ss" required/>
        <input type="submit" name="serachLab"  value="Search" />
    </form>
        
        <form method="post" action="" style="display: inline;">
        <label style="color: #f2f2f2; padding-right:5px">Show all labs</label>
        <input type="submit" name="showLabs"  value="Show all Labs" />
    </form>
        
        
        <input type="submit" name="clear"  value="clear" onclick="clr()" />
    
    
    </span>
        <br>
        <br>
        
        
        <div id="schedule">
        
        <?php
                if(isset($_POST['showLabs'])==1){
                
                $con2 = mysqli_connect('127.0.0.1','root','','lab_project');
                $sql = "SELECT number, name, days, time, hall, section, Instructor, capacity, registered FROM labs";
                $result = mysqli_query($con2, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<table id='customers'><tr><th>NUMBER</th><th>NAME</th><th>DAYS</th><th>TIME</th><th>HALL</th><th>SECTION</th><th>INSTRUCTOR</th><th>CAPACITY</th><th>REGISTERED</th></tr>";
                    while($row = mysqli_fetch_assoc($result)) {
      
                    echo "<tr><th>". $row["number"]."</th><th>". $row["name"]."</th><th>". $row["days"]."</th><th>". $row["time"]."</th><th>". $row["hall"]."</th><th>".$row["section"]."</th><th>".$row["Instructor"]."</th><th>".$row["capacity"]."</th><th>".$row["registered"]."</th></tr>";
      
                    }
    
                    echo "</table>";
                    }


                    else {
                    echo "";
                        }
                    
                    mysqli_close($con2);

                }
            
            
                if(isset($_POST['serachLab'])==1){
                $S = $_POST['ss'];
                $con3 = mysqli_connect('127.0.0.1','root','','lab_project');
                $sql2 = "SELECT number, name, days, time, hall, section, Instructor, capacity, registered FROM labs where number = '$S'";
                $result = mysqli_query($con3, $sql2);

                if (mysqli_num_rows($result) > 0) {
                    echo "<table id='customers'><tr><th>NUMBER</th><th>NAME</th><th>DAYS</th><th>TIME</th><th>HALL</th><th>SECTION</th><th>INSTRUCTOR</th><th>CAPACITY</th><th>REGISTERED</th></tr>";
                    while($row = mysqli_fetch_assoc($result)) {
      
                    echo "<tr><th>". $row["number"]."</th><th>". $row["name"]."</th><th>". $row["days"]."</th><th>". $row["time"]."</th><th>". $row["hall"]."</th><th>".$row["section"]."</th><th>".$row["Instructor"]."</th><th>".$row["capacity"]."</th><th>".$row["registered"]."</th></tr>";
      
                    }
    
                    echo "</table>";
                    }


                    else {
                    echo "<h3>no labs</h3>";
                        }
                    
                    mysqli_close($con3);

                }
        ?>
        
         
        </div>
    </div>
    
    
    
                <?php
        function addLab($labNUM,$labSEC,$labTIME){
            $table="t" . $_SESSION['id'];
            
            $con = mysqli_connect('127.0.0.1','root','','lab_project');
            $query = "SELECT number, name, days, time, hall, section, Instructor, capacity, registered FROM labs where number =$labNUM and time = '$labTIME' and section = $labSEC";
            $result = mysqli_query($con, $query);
            $num= mysqli_num_rows($result);
            if($num!=1){
                mysqli_close($con);
                echo '<script> msg1("Wrong Information");</script>'; 
                return false;
                }
            else {
                $row = mysqli_fetch_assoc($result);
                $n1=$row['number'];
                $n2=$row['name'];
                $n3=$row['time'];
                $n4=$row['hall'];
                $n5=$row['section'];
                $n6=$row['Instructor'];
                $n7=$row['registered'];
                $n8=$row['capacity'];
                $d1=$row['days'];
                
                $con2 = mysqli_connect('127.0.0.1','root','','lab_enroll');
                $Tquery="SELECT number, name, days, time, hall, section, Instructor FROM $table where time = '$labTIME'";
                $Tresult = mysqli_query($con2, $Tquery);
                $Tnum = mysqli_num_rows($Tresult);
                
                if($Tnum==1){
                   echo '<script> msg1("Cant Add this lab, You have a lab with the same time");</script>'; 
                    mysqli_close($con);
                    mysqli_close($con2);
                return false;
                    
                }
                
                if($n7==$n8){
                   echo '<script> msg1("Cant Add this lab, The capacity is full");</script>'; 
                    mysqli_close($con);
                    mysqli_close($con2);
                return false;
                    
                }
                
                else
                {
                    $n9=$row['registered']+1;
                $query2 ="INSERT INTO `$table`(`number`, `name`, `days`, `time`, `hall`, `section`, `Instructor`) VALUES ('$n1','$n2','$d1','$n3','$n4','$n5','$n6')";
                    
                 $query3 = 
                "UPDATE labs
                 SET registered = '$n9'
                 WHERE number =$labNUM and time = '$labTIME' and section = $labSEC";
                    
                if( mysqli_query($con2,$query2) && mysqli_query($con,$query3)){
                    echo '<script> msg1("Lab Added Successfully!");</script>';
                    mysqli_close($con);
                    mysqli_close($con2);
                }
                else{
                    echo '<script> msg1("'.mysqli_error($con2).'");</script>';
                    mysqli_close($con);
                    mysqli_close($con2);
                }
                
            }
                
            }
            
        }
    
    
        function dropLab($labNUM,$labSEC){
            $table="t" . $_SESSION['id'];
            
            $con = mysqli_connect('127.0.0.1','root','','lab_enroll');
            $query = "SELECT number, name, days, time, hall, section, Instructor FROM $table where number =$labNUM and section = $labSEC";
            $result = mysqli_query($con, $query);
            $num= mysqli_num_rows($result);
            if($num!=1){
                mysqli_close($con);
                echo '<script> msg1("Wrong Information");</script>'; 
                return false;
                }
            else {
                
                
                $query2 ="DELETE FROM $table WHERE number = $labNUM and section = $labSEC";
                
                
                    $con2 = mysqli_connect('127.0.0.1','root','','lab_project');
                    $query02 = "SELECT number, name, days, time, hall, section, Instructor, registered FROM labs where number =$labNUM and section = $labSEC";
                    $result02 = mysqli_query($con2, $query02);
                    $row02 = mysqli_fetch_assoc($result02);
                    $C = $row02['registered'] - 1;
                
                    $query3 = 
                "UPDATE labs
                 SET registered = '$C'
                 WHERE number =$labNUM and section = $labSEC";
                
                 if( mysqli_query($con,$query2) && mysqli_query($con2,$query3)){   
                    echo '<script> msg1("Lab Dropped Successfully!");</script>';
                    mysqli_close($con);
                }
                else{
                    echo '<script> msg1("'.mysqli_error($con2).'");</script>';
                     mysqli_close($con);
                }
            }
            
        }
    
    
    
        if(isset($_POST['add']))
                {
                    echo addLab($_POST['num'],$_POST['sec'],$_POST['time']); 
                }
    
        if(isset($_POST['drop']))
                {
                    echo dropLab($_POST['num2'],$_POST['sec2']); 
                }
                ?>
     
</body>
</html>