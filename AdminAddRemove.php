<?php
session_start();
if(!$_SESSION['login2'])
echo "<script> document.location.href='AdminLogin.php';</script>";


?>

<html>
<head>
	<title>Add/Remove Labs</title>
	<link href="labwebsitestyle.css" rel="stylesheet" type="text/css" media="all" />
    <script>
    function clr(){
            document.getElementById('schedule').innerHTML=" ";
        }
    
    function msg1(str){
        
         alert(str);   
        
        }
    </script>
</head>
    
    
    
    
    
    
<body>
    <div class="topnav">
   <a href="AdminMain.php">Home</a>
    <a class="active" href="AdminAddRemove.php">Add/Remove Labs</a>
  <a  href="AdminOpenClose.php">Open/Close Registeration</a>
    <a href="AdminLogout.php">Sign Out</a>
    <p>LABs Regestration System</p>
</div>


	<center><h1 id="name"></h1></center>
    
    <div class="form3 " style="margin-bottom:50px;">
        <div id="wrong"></div>
	<h2>Add Lab</h2>
	       <form method="post" action="">
               
               <table id='adminTable'>
                   <tr>
               <td>
               <span style="">
		      <label style="color: #f2f2f2; padding-right:5px;">Number</label>
			  <input type="number" name="labNum" min="000000" max="999999" style="" placeholder="Enter Lab#" required/>
			 </span>
               </td>
                       
                <td>       
               <span style="">
		      <label style="color: #f2f2f2; padding-right:5px;">Name</label>
			  <input type="text" name="labName"  style="" placeholder="Enter Lab Name" required/>
			 </span>
               </td>
                       
                 <td>      
               <span style="">
                <label style="color: #f2f2f2; padding-right:5px">Day</label>
               <select name="labDay" required>
                   <option value="" disabled selected>Select lab Day</option>
                    <option value="Sun">Sun</option>
                    <option value="Mon">Mon</option>
                    <option value="Tue">Tue</option>
                    <option value="Wed">Wed</option>
                   <option value="Thu">Thu</option>
                </select>
               </span>
                </td>
               
                
                <td> 
               <span style="">
                <label style="color: #f2f2f2; padding-right:5px">Time</label>
               <select name="labTime" required>
                   <option value="" disabled selected>Select lab time</option>
                    <option value="8:30-9:30">8:30-9:30</option>
                    <option value="9:30-10:30">9:30-10:30</option>
                    <option value="10:30-11:30">10:30-11:30</option>
                    <option value="11:30-12:30">11:30-12:30</option>
                   <option value="12:30-1:30">12:30-1:30</option>
                </select>
               </span>
                </td>
               </tr>
               
                   <tr>
                    <td>
               <span style="">
                <label style="color: #f2f2f2; padding-right:5px">Hall</label>
               <select name="labHall" required>
                   <option value="" disabled selected>Select lab Hall</option>
                    <option value="LAB1 (D3 L-2)">LAB1 (D3 L-2)</option>
                    <option value="LAB2 (D3 L-2)">LAB2 (D3 L-2)</option>
                    <option value="LAB3 (D3 L-2)">LAB3 (D3 L-2)</option>
                    <option value="LAB4 (D3 L-2)">LAB4 (D3 L-2)</option>
                   <option value="LAB5 (D3 L-2)">LAB5 (D3 L-2)</option>
                </select>
               </span>
                    </td>
                       
                    <td>
               <span style="">
                <label style="color: #f2f2f2; padding-right:5px">Section</label>
               <input type="number" name="labSec" min="0" max="99" style=" width:60px;" placeholder="0-99" required/>
               </span>
                    </td>
                       
                     <td>  
               <span style="">
                <label style="color: #f2f2f2; padding-right:5px">Instructor</label>
               <select name="labInst" required>
                   <option value="" disabled selected>Select lab Instructor</option>
                    <option value="Ali Ahmed Ali Omar">Ali Ahmed Ali Omar</option>
                    <option value="Ruba Qasem Ali Jameel">Ruba Qasem Ali Jameel</option>
                    <option value="Ola Ahmed Yousef Omar">Ola Ahmed Yousef Omar</option>
                    <option value="Naser Ammar Ali Omar">Naser Ammar Ali Omar</option>
                   <option value="Ghassan Waleed Ali Omar">Ghassan Waleed Ali Omar</option>
                </select>
               </span>
                    </td>
               
                    <td>
               <span style="">
                <label style="color: #f2f2f2; padding-right:5px">Capacity</label>
               <input type="number" name="labCap" min="0" max="99" style=" width:60px;" placeholder="0-99" required/>
               </span>
                    </td>
                 </tr>
            </table>
               
		<br>
        <br>
			<div>
					<input type="submit" name="addlab" class="button button3" value="Add" />
			</div>
	       </form>
    </div>
    
    <div class="form3" style="margin-bottom:50px;">
        <div id="wrong2"></div>
	<h2>Remove Lab</h2>
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
					<input type="submit" name="droplab" class="button button3" value="Remove " />
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
            
            
            
            
            
            
                function addLab($labNUM, $labNAME, $labDAY, $labTIME, $labHALL, $labSEC, $labINST, $labCAP, $zero){
             $zero=0;           
            $con = mysqli_connect('127.0.0.1','root','','lab_project');
            $query = "SELECT number, name, days, time, hall, section, Instructor, capacity, registered FROM labs where number =$labNUM and section = $labSEC";
            $result = mysqli_query($con, $query);
            $num= mysqli_num_rows($result);
            if($num>=1){
                mysqli_close($con);
                echo '<script> msg1("THERE IS A LAB ALREADY WITH THE SAME LAB NUMBER AND SECTION");</script>'; 
                return false;
                }
            else {
                $query2 ="INSERT INTO labs (`number`, `name`, `days`, `time`, `hall`, `section`, `Instructor`, `capacity`, `registered`) VALUES ('$labNUM','$labNAME','$labDAY','$labTIME','$labHALL','$labSEC','$labINST','$labCAP','$zero')";
                
                    
                if( mysqli_query($con,$query2)){
                    echo '<script> msg1("Lab Added Successfully!");</script>';
                   
                    
                }
                else{
                    echo '<script> msg1("'.mysqli_error($con2).'");</script>';
                    
                }
                
            }
                mysqli_close($con); 
            }
            
            
            function removeLab($labNUM, $labSEC){
                      
            $con = mysqli_connect('127.0.0.1','root','','lab_project');
            $query = "SELECT number, name, days, time, hall, section, Instructor, capacity, registered FROM labs where number =$labNUM and section = $labSEC";
            $result = mysqli_query($con, $query);
            $num= mysqli_num_rows($result);
            if($num < 1){
                mysqli_close($con);
                echo '<script> msg1("THERE IS NO LAB WITH THESE INFORMATION TO REMOVE");</script>'; 
                return false;
                }
            else {
                $query2 ="DELETE FROM labs WHERE number = $labNUM and section = $labSEC";
                
                    
                if( mysqli_query($con,$query2)){
                    echo '<script> msg1("Lab Removed Successfully!");</script>';
                   
                    
                }
                else{
                    echo '<script> msg1("'.mysqli_error($con2).'");</script>';
                    
                }
                
            }
                mysqli_close($con); 
            }
            
            
            
            
            
            
            
            
            if(isset($_POST['addlab']))
                {
                    echo addLab($_POST['labNum'],$_POST['labName'],$_POST['labDay'],$_POST['labTime'],$_POST['labHall'],$_POST['labSec'],$_POST['labInst'],$_POST['labCap'],0); 
                }
            
            if(isset($_POST['droplab']))
                {
                    echo removeLab($_POST['num2'],$_POST['sec2']); 
                }
        ?>
        
         
        </div>
    </div>
    
    
    
    <script>
  
    </script>
</body>
</html>