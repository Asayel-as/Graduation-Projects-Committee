
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
                    <li class="active"><a href="#">User</a></li>
				    
                   			
				  <li class="dropdown "  >
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Notification <i class="fa fa-angle-down"></i></a>
								
						<ul class="dropdown-menu">
								
								<?php						require('Notifigation.php');						?>
								
									
					     </ul>
				   </li>
			   
					
					 <li class="active"><a href='javascript:history.go(-1)' style='margin-left: 160px;' >Home</a></li>
					  <li class="active"><a href="signSE.php" style='margin-left: 10px;'>Logout</a></li>
			</div>
			
		</div>
			
		</div>
		
<main>


<div id="body-main">
<h1 style=" margin-left:10%;  font-family: Times New Roman",Times, serif;"  > Form Uploaded: </h1>

 <?php
$handle = opendir('uploads');

if($handle){
	
	while(($entry = readdir($handle)) !== false){
		
		if($entry != '.' && $entry != '..'){
			echo "<br> <a  style=\"margin-left:60; margin-left:12%; text-decoration:none; color : #20B2AA; font-family: Arial, Helvetica, sans-serif; \" href=\"uploads/$entry\"> &#8900 $entry</a> <br>";
		}
	}
	closedir($handle);

}




?>

</div>


</main>



<!-- Script 3.3 - feedback.html -->
</body>
</html>