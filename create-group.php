<!-- 2:43 am asayel 30 march  -->
<html>
<head>
		<title> home page </title>
		
		
		<style>
	header {
		background: #48A9B0 url("uqu10.png") no-repeat top;
		
		width: 100%;
		height: 100px;	
	}	
	
	#header {	
		width: 100%;
		height: 50px;
		background-color: 	#DCDCDC;
	}	
	#body-main{
		width: 950px;
        height: 100%;
		//background: #48A9B0 url("logn imge10.png") no-repeat;
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

<link rel="stylesheet" href="http://www.noblecomputer.co.in//css/bootstrap.min.css">
		<link href="http://www.noblecomputer.co.in//css/responsive.css" rel="stylesheet">
		
		
</head>

<body>


<header > </header>
<!-- 3:15am 28 march Asayel -->
		<div id="header" >
		
			<div class="collapse navbar-collapse navbar-left" style='margin-left: 10px; '>
			
         <ul class="nav navbar-nav">
                    <li class="active"  style='margin-left: 150px;' ><a href="#">User</a></li>
				    
                   			
	
			   
			   <li class="dropdown "  >
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Notification <i class="fa fa-angle-down"></i></a>
								
						<ul class="dropdown-menu">
								
							<?php
								require('Notifigation.php');
							?>
								
									
									
					     </ul>
				   </li>
					
					 <li class="active"><a href="adminHome.php"  style='margin-left: 630px;' >Home</a></li>
					  <li class="active"><a href="signSE.php" style='margin-left: 10px;'>Logout</a></li>
			</div>
			
			
		</div>
			 
			
			
		</div>
		

<main>


<div id="body-main">


<center><p>  Create gruop </p></center>

<form action="#" method="post">
	Group ID: <input type="text" name="groupID" size="20" />
	<br/>
	Select student:
	

<select name="group-member">

<option value='0' >Select student</option>
<?php

// 10:02pm 30 March Asayel
                                        //require('connectDB.php');
										
										$servername="localhost";
										$username = "root";
										$password = "asole12345";

										// Create connection
										$conn = new mysqli($servername, $username, $password);

										// Check connection
										if ($conn->connect_error) {
											die("Connection failed: " . $conn->connect_error);
										} 
										
										
										$sql = "SELECT * FROM gpc_db.student;";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											while($row = $result->fetch_assoc()) {
										?>						 
											 
										<option value="<?php echo $row["ID"]; ?>" ><?php echo $row["Name"] ?></option>
										
										<?php
										
										}//end while 
										}

								$conn->close();
?>

</select>

<input type="submit" name="Add-student" value="Add student" />
<br/>
<!-- *****************************************************************************  -->
<select name="group-super">

<option value='0' >Select supervisor</option>
<?php

// 10:02pm 30 March Asayel
                                        //require('connectDB.php');
										
										$servername="localhost";
										$username = "root";
										$password = "asole12345";

										// Create connection
										$conn = new mysqli($servername, $username, $password);

										// Check connection
										if ($conn->connect_error) {
											die("Connection failed: " . $conn->connect_error);
										} 
										
										
										$sql = "SELECT * FROM gpc_db.supervisor;";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											while($row = $result->fetch_assoc()) {
										?>						 
											 
										<option value="<?php echo $row["ID"]; ?>" ><?php echo $row["Name"] ?></option>
										
										<?php
										
										}//end while 
										}

								$conn->close();
?>

</select>

<input type="submit" name="Add-super" value="Add supervisor" />




</form>


<?php
if(isset($_POST['Add-student'])){
		
										$servername="localhost";
										$username = "root";
										$password = "asole12345";

										// Create connection
										$conn = new mysqli($servername, $username, $password);

										// Check connection
										if ($conn->connect_error) {
											die("Connection failed: " . $conn->connect_error);
										} 
	
	
	$gid=$_POST['groupID'];
	$gmember=$_POST['group-member'];
			$sql0 = "UPDATE gpc_db.student SET Group_ID='$gmember' WHERE ID='';";


if ($conn->query($sql0) === TRUE) {
    echo "Done student is added";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


}	

?>

<?php
if(isset($_POST['Add-super'])){
		
										$servername="localhost";
										$username = "root";
										$password = "asole12345";

										// Create connection
										$conn = new mysqli($servername, $username, $password);

										// Check connection
										if ($conn->connect_error) {
											die("Connection failed: " . $conn->connect_error);
										} 
	
			//$sql0 = "UPDATE gpc_db.`group` SET Group_ID=".$_POST['groupID']." WHERE Suupervisor_ID=."$_POST['group-super']."";
$id=$_POST['groupID'];
$super=$_POST['group-super'];

			$sql0 = "INSERT INTO gpc_db.`group` (Group_ID, Suupervisor_ID) VALUES ('$id','$super')";

if ($conn->query($sql0) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


}	

?>



</div>
</main>




<!-- Script 3.3 - feedback.html -->
</body>
</html>