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
		height: 50px;
		background-color: 	#DCDCDC;
	}	
	#body-main{
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
			   
					
					 <li class="active"><a href="adminHome.php"  style='margin-left: 160px;'>Home</a></li>
					 <li class="active"><a href="signSE.php" style='margin-left: 10px;'>Logout</a></li>
			</div>
			
			
		</div>
			 
			
			
		</div>
		

</body>
</html>

<?php
require('connectDB.php');
 
$sql = "SELECT Email,Name FROM gpc_db.supervisor";
$result = $conn->query($sql);

echo "<div id= \"body-main\"> <form method= \"post\" action= \"my_mail.php\">";



if ($result->num_rows > 0) {
	
    while($row = $result->fetch_assoc()) {
		
        $all_supervisors = array($row["Email"]=>$row["Name"]);

		echo "<input type=checkbox name=\"supervisors[]\" value=".$row["Email"].">".$row["Name"]."</br>";	
    }	
} else {
    echo "</br>0 results";
}

echo "
</br>
To : <input type =\"text\" name=\"mail_to\"> </br> </br> 
Subject: <input type=\"text\" name=\"mail_sub\">  <br/> <br/>
Msg: <input type=\"text\" name=\"mail_msg\"> <br/>  <br/>
<input type=\"submit\" name=\"submit\" value=send> 
</form> </div>";
$conn->close();
?>