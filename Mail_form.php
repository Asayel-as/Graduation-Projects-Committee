<!DOCTYPE html> 

<html>
<head>
		<title>Send message</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		
		 <link rel="stylesheet" href="http://www.noblecomputer.co.in//css/bootstrap.min.css">
		<link href="http://www.noblecomputer.co.in//css/responsive.css" rel="stylesheet">
	
	<style>
	#body-main{
		width: 950px;
        height: 100%;
		background-size: cover;
		margin: 70 auto;
		border: 1px solid #DCDCDC;

	}
	
	</style>
</head>

<body>


<header > </header>
<!-- 3:15am 28 march Asayel -->
		<div id="header" >
		
			<div class="collapse navbar-collapse navbar-left" style='margin-left: 10px; '>
			
         <ul class="nav navbar-nav">
                    <li class="active"><a href="#">User</a></li>
				    
                   			
				  <li class="dropdown "  >
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Notification <i class="fa fa-angle-down"></i></a>
								
						<ul class="dropdown-menu">
								
							<?php
								require('Notifigation.php');
							?>
								
									<li><a href="#">hi </a></li>
									
					     </ul>
				   </li>
			   
					
					 <li class="active"><a href="#"  style='margin-left: 160px;' >Home</a></li>
					  <li class="active"><a href="signSE.php" style='margin-left: 10px;'>Logout</a></li>
			</div>
			
			
		</div>
			 
			
			
		
	
</body>
</html>



<div id='body-main'	>


<!-- ثابت ******************************************************************************************* -->

<?php

//require 'C:\AppServ\www\conn.php';
require('connectDB.php');

// supervisors ****************************************************************************
$sql = "SELECT Email,Name FROM gpc_db.supervisor";
$result = $conn->query($sql);

$sql2 = "SELECT Email,Name FROM gpc_db.student";
$result2 = $conn->query($sql2);

echo "<form method= \"post\" action= \"Handel_Mail_form.php\" enctype=\"multipart/form-data\">";



// supervisors ****************************************************************************
 echo " </br></br></br> <h4>Select checkboxes before name you want to send a message for him :</h4>
 <div class=\"container\">
 <h3>All supervisors :</h3></br>";
 
 
if ($result->num_rows > 0) {
	
    while($row = $result->fetch_assoc()) {
		
		echo "<input type=\"checkbox\" name=\"supervisors[]\" value=".$row["Email"].">".$row["Name"]."</br>";	
    }	
} else {
    echo "</br>0 results";
}
echo "</div><br/>";   



// student checkbox ***************************************************************************

	//echo "<input type=checkbox name=\"all_students[]\" value=".$stu.">"."All students";

 echo "
 <div class=\"container\">
 <h3>All students :</h3></br> ";
if ($result2->num_rows > 0) {
	
    while($row2 = $result2->fetch_assoc()) {
		
	    //$all= array($row2["Email"]=>$row2["Name"]);
		//echo $all." 1</br>";
		
		echo "<input type=checkbox name=\"all_students[]\"value=".$row2["Email"].">".$row2["Name"]."</br>";	
    }	
} else {
    echo "</br>0 results";
}
echo "</div>";


echo "
</br>
<h4>Or write email address below</h4></br>
To : <input type =\"text\" name=\"mail_to\"> </br> </br> 
Title : <input type=\"text\" name=\"mail_sub\">  <br/> <br/>
Message : <textarea name=\"mail_msg\" ></textarea><br/>  <br/>
Add file : <input type=\"file\" class=\"form-control\" name=\"att[]\" multiple =\"multiple\" >
</br></br></br>
<input type=\"submit\" name=\"submit\" value=send>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
<input type=\"reset\" value=\"Reset\">
</form>";
$conn->close();
?>
</div>