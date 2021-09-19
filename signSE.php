
<html>
<head>
		<title> </title>
		
		
		<style>
	header {
		background: #48A9B0 url("uqu10.png") no-repeat top;
		
		width: 100%;
		height: 100px;	
	}	
	
	#header {	
		width: 100%;
		height: 10px;
		background-color: 	#DCDCDC;
	}	
	#sign_box{
		width: 950px;
        height: 550px;
		background: #48A9B0 url("logn imge10.png") no-repeat;
		background-size: cover;
		margin: 70 auto;
		//background-color: #48A9B0 ;
		border: 1px solid #DCDCDC;

	}	
	#sign_box #sign_form{
				margin: 120 auto;
				margin-left: 720px;
				font-color: white;
		
	}
	
	</style>	
</head>

<body>


<header > </header>

<div id="header"></div>

<main>

<div id="sign_box">

		<div id="sign_form">
				<form action="signSE.php" method="post">

				User name:<br/>
				<input type="text" name="first_name" size="20" />
				<br/>
				<br/>
				Password: 
				<br/>
				<input type="password" name="password" size="20" />
				<br />
<br/>

<label><input type="radio" name="type" value="Admin" />Admin</label> <br/>
<label><input type="radio" name="type" value="Supervisor" />Supervisor</label><br/>
<label><input type="radio" name="type" value="Student" />Student</label>
<br/>
				<br/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="login" />
			
				</form>
	
				


</main>

<?php
$user = $_POST['first_name'];
$pass = $_POST['password'];
$type = $_POST['type'];
$user_valid = false;
$pass_valid = false;
$student = false;
$supervisor = false;
$admin = false;

if(isset($_POST['submit'])){

if (empty($user)) {?>
      <p id=sign_form>  print"Enter user name <br/>";<p>
	   <?php
    } else {
       
    }
	
	if (empty($pass)) {
        print"Enter password  <br/>";
    } else {
        
    }
	
	
	 ini_set ('display_errors', 1); 
error_reporting (E_ALL & ~E_NOTICE); 
// Attempt to connect to MySQL and print out messages. 
require('connectDB.php');

		if($type == 'Supervisor'){
	$sql = "SELECT ID FROM gpc_db.supervisor WHERE ID = '$user'";
    if ($r = mysqli_query ($conn, $sql)){
		while ($row = mysqli_fetch_array ($r)) {
			if($user== $row['ID']){
			$user_valid = true;
			//print"11111";
			}else{
			print"User name can not find";	
			}
		}
	}
	
		
	 if ($user_valid == TRUE) {
	$sql1 = "SELECT Password FROM gpc_db.supervisor WHERE ID = '$user'";
	if ($r1 = mysqli_query ($conn, $sql1)){
		while ($row1 = mysqli_fetch_array ($r1)) {
			if($pass== $row1['Password']){
				$pass_valid = true;
				//print"22222";
				header("location:superHome.php");
				exit();
				
			}else{
			print"Password not correct ";	
			}
		}
		
	
	}
    }
	
    else {
        $user_valid = false;
		print"can not find this superviser <br/>";
    }
		}

		
		
		
		if ($type == 'Student'){
	$sql2 = "SELECT ID FROM gpc_db.student WHERE ID = '$user'";
   if ($r2 = mysqli_query ($conn, $sql2)){
		while ($row2 = mysqli_fetch_array ($r2)) {
			if($user== $row2['ID']){
			$user_valid = true;
			//print"33333 ";
			}else{
			print"User name can not find";	
			}
		}
   }
	
	 if ($user_valid == true) {
	$sql3 = "SELECT Password FROM gpc_db.student WHERE ID = '$user'";
	if ($r3 = mysqli_query ($conn, $sql3)){
		while ($row3 = mysqli_fetch_array ($r3)) {
			if($pass== $row3['Password']){
				$pass_valid = true;
				//print"44444";
				header("location:studentHome.php");
				exit();
			}else{
			print"Password not correct ";	
			}
		}
		
	
	
    }
	}
    else {
        $user_valid = false;
		print"can not find this student <br/>";
    }
		}
	
	
	
	if ($type == 'Admin'){
	if ($user == "admin"){
		if($pass == '111'){
		$user_valid = true;
		header("location:adminHome.php");
		}else{
			print"Password not correct ";	
		}
	}
	else {
		 $user_valid = false;
		 print"user name not correct <br/>";
	}
	}
	
	if($type == NULL){
		 print"please choose one of options ( Admin , Supervisor , student ) <br/>";
	}
	
	


}



?>
</div>
	</div>
<!-- Script 3.3 - feedback.html -->
</body>
</html>