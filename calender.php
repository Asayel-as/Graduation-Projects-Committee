
<html>
<head>
		<title> calender</title>
			
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
	#sign_box{
		width: 950px;
        height: 550px;
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
<!-- update 11:35 am 30 march Asayel -->
		<div id="header" >
		
			<div class="collapse navbar-collapse navbar-left" style='margin-left: 10px; '>
			
         <ul class="nav navbar-nav">
		 <!--select name user from form login by Get  -->
                    <li class="active"style='margin-left: 150px;' ><a href="#">User</a></li>
				    
				  <li class="dropdown "  >
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Notification <i class="fa fa-angle-down"></i></a>
								
						<ul class="dropdown-menu">
						     <?php
								require('Notifigation.php');
								?>
								
									<li><a href="#">hi </a></li>
									
					     </ul>
				   </li>
			   
					
					 <li class="active"><a href="adminHome.php"  style='margin-left: 630px;' >Home</a></li>
					  <li class="active"><a href="signSE.php" style='margin-left: 10px;'>Logout</a></li>
			</div>
			
			
		</div>
			 
			
			
		</div>
		

<main>


<div id="sign_box" >
<form action="calender.php" method="post"style='margin-left: 150px;'>

<br/>  <br/><h1>Calendar</h1> <br/> <br/> <br/>
Date: 

<select name="day">
<?php
for ($d = 1; $d <= 31; $d++) {
	print "<option value=\"$d\">$d</option>\n";
}
?>

</select>



<select name="month">
<option value="1">January</option>
<option value="2">Febraury</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>

<select name="year">
<?php
$var= date("Y");
print "<option value=\"$var\">$var</option>\n";
$var++;
print "<option value=\"$var\">$var</option>\n";
 ?>
</select>
<br/>


<br/>



<br />
Title: <input type="text" name="title" size="20" />
<br />
<br />
<input type="submit" name="submit"
 value="add" />
 
 
</form>
 
 <div style='margin-left: 150px;'>
<?php	


	// $Deadline_date;
	 // $Notification_title;
	

			
if(isset($_POST['submit'])){
		
	
		$title=$_POST['title'];
			
			
		$rawdate = htmlentities($_POST['day']."-".$_POST['month']."-".$_POST['year']);
		
		//https://www.php.net/manual/en/function.date-default-timezone-set.php
		//builte in function
		
		date_default_timezone_set('Asia/Riyadh');
		$date = date('Y-m-d', strtotime($rawdate));
		require('connectDB.php');
		
			$sql = "INSERT INTO gpc_db.calendar(Deadline_date, Notification_title,State)
			VALUES( '$date','$title',0 )";
			if ($conn->query($sql) === FALSE) {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

		
			
			}
				

require('connectDB.php');
				
			//select all  from table in DB then print it 
			$sql0 = "SELECT Deadline_date, Notification_title FROM gpc_db.calendar";
			$result = $conn->query($sql0);

			if ($result->num_rows > 0) {
				// output data of each row
				$num=1;
				while($row = $result->fetch_assoc()) {
					echo "Task".$num.": date: " . $row["Deadline_date"]. ".    Title: " . $row["Notification_title"]."<br>";
					$num++;
				}
			} else {
				echo "0 results";
			}
		
$conn->close();

?>
</div>
</div>



</main>
</html>