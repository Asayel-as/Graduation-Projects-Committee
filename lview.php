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
                    <li class="active" style='margin-left: 150px;'><a href="#">User</a></li>
				    
                   			
				  <li class="dropdown "  >
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Notification <i class="fa fa-angle-down"></i></a>
								
						<ul class="dropdown-menu">
								
							<?php
								require('Notifigation.php');
							?>
								
									<li><a href="#">hi </a></li>
									
					     </ul>
				   </li>
			   
					
					 <li class="active"><a href='javascript:history.go(-1)'  style='margin-left: 630px;' >Home</a></li>
					  <li class="active"><a href="signSE.php" style='margin-left: 10px;'>Logout</a></li>
			</div>
			
			
		</div>
			 
			
			
		</div>
		

<main>


<div id="body-main">
<center> <h1 style="color: #48A9B0;" >  Projects library  </h1> </center>

<?php

 ini_set ('display_errors', 1); 
error_reporting (E_ALL & ~E_NOTICE); 
// Attempt to connect to MySQL and print out messages. 
require('connectDB.php');

$query1 = "SELECT * FROM gpc_db.container ORDER BY Container_name DESC"; 
if ($r = mysqli_query ($conn, $query1)) {
// Run the query1.
// Retrieve and print every record.
while ($row = mysqli_fetch_array ($r)) {
echo" <div style=\"background-color:#eeedf2; height:150px; border-top-left-radius:1.5em; border-top-right-radius:1.5em; border-bottom-right-radius:1.5em;  border-bottom-left-radius:1.5em;  text-align:center; margin-bottom:2%; font:24px Verdana,arial,Helvetica,sans-serif\" > 
<div style=\"background-color:#20B2AA; height:30px; border-top-left-radius:1.5em; border-top-right-radius:1.5em;  text-align:center; margin-bottom:1%;\"> {$row['Container_name']}   </div>";  
echo"<table> <tr><td><div style=\"background-color:#eeedf2; height:100px; width:200px; border-bottom-left-radius:1.5em;   text-align:left;  font:15px Verdana,arial,Helvetica,sans-serif\" > "; view($row['Container_name']); 
echo"</div> </td></tr></table></div>";
}} else { // Query1 didn't run.
die ('<p>Could not retrieve the data because: <b>' . mysqli_error($conn) . "</b>. The query was $query1.</p>");} 
 
 
 
// Close the connection.
		mysqli_close($conn);


function view($directory_name){
	
$handle = opendir($directory_name);

if($handle){
	
	while(($entry = readdir($handle)) !== false){
		
		if($entry != '.' && $entry != '..'){
			echo " <a  style=\"margin-left:60; margin-left:12%; text-decoration:none; color : #20B2AA;  \" href=\"$directory_name/$entry\"> &#8900 $entry ,</a> ";
		}
	}
	closedir($handle);

}

	 
 }


?>
</div>
</html>