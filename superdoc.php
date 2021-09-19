<html>

<head>

<style>

input{
  width: 10%;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 3px;
  font-size: 16px;
  padding: 10px 10px 10px 10px;
  background-color: #DCDCDC;
  cursor: pointer;
   font-family: "Times New Roman", Times, serif;		

}

		
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


	
	footer{
		background: #48A9B0 url("uqu11.png") no-repeat top;
		
		width: 100%;
		height: 100px;	
	}	
	#footer {	
	
		width: 100%;
		height: 100px;
		background-color: #DCDCDC;
	}	


tr{
 padding: 8px;
  text-align: center;
  background-color:#DCDCDC ;
  color: #383838;
}


	</style>
	
	<link rel="stylesheet" href="http://www.noblecomputer.co.in//css/bootstrap.min.css">
	<link href="http://www.noblecomputer.co.in//css/responsive.css" rel="stylesheet">
	
<title>  </title>


</head>


<body>

<header > </header>
<!-- 3:15am 28 march Asayel -->
		<div id="header" >
		
			<div class="collapse navbar-collapse navbar-left" style='margin-left: 10px; '>
			
         <ul class="nav navbar-nav">
                    <li class="active"><a href="#"  style='margin-left: 150px;'>User</a></li>
				    
                   			
				  <li class="dropdown "  >
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Notification <i class="fa fa-angle-down"></i></a>
								
						<ul class="dropdown-menu">
								
								<?php
								require('Notifigation.php');
								?>
								
								
									<li><a href="#">hi </a></li>
									
					     </ul>
				   </li>
			   
					
					 <li class="active"><a href="home.php"  style='margin-left: 630px;' >Home</a></li>
					  <li class="active"><a href="signSE.php" style='margin-left: 10px;'>Logout</a></li>
			</div>
			
			
		</div>
			 
			
			
		</div>



 
 <div id='body-main'>







<center>

	
	<table style="border:1px solid;">
	<tr><td style="background-color:20B2AA; color:FFFFFF; text-align:center; hight:70px; width:900px;"> Submitted documents</td></tr>
	<tr><td>
	<?php
	echo"<table>";
	$handle = opendir('documents');

if($handle){
	
	while(($entry = readdir($handle)) !== false){
		
		if($entry != '.' && $entry != '..'){
			echo"<tr><td style=\"  text-align:left; border:1px solid; border-color:20B2AA;   width:890px; \"  > <a style=\" color : #20B2AA; text-decoration:none;\" href=\"documents/$entry\"> &nbsp;&nbsp;&nbsp;&nbsp; $entry </a> </td></tr>";
		}
	}
	closedir($handle);

}
?>
</tr>
</table>
</center>
</div>
</body>
</html>