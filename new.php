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
								
								<?php						require('Notifigation.php');						?>
								
								
									<li><a href="#">hi </a></li>
									
					     </ul>
				   </li>
			   
					
					 <li class="active"><a href="home.php"  style='margin-left: 630px;' >Home</a></li>
					  <li class="active"><a href="signSE.php" style='margin-left: 10px;'>Logout</a></li>
			</div>
			
			
		</div>
			 
		</div>
		

<main>


<div id="body-main">

<div>

<form action="" method="" style="margin-top: 10px;">
<p>Group ID:  <!-- يقرا من الداتا بيس -->
</p>


<p>Group Member:
<!-- select all where -->

</p>

<p>Super Member:
<!-- select all where -->

</p>

<select name="gropList" >

<option><font color="#DCDCDC"> Group list </font></option>

<?php
//قرا من الداتا بيس سلكت * وبعدين يعرض بس الي دي للقروب 
for ($d = 1; $d <= 11; $d++) {
	print "<option value=\"$d\">Group $d</option>\n";
}
?>


</select>

</form>

</div>

	<div style='margin-left: 300px; margin-right: 80px; margin-top: 80px; border: 1px solid #DCDCDC;'>
	
		<br/><br/>	
			<form>
				<p>student: </p>
				<select name="gropList" >

				<option><font color="#DCDCDC"> Group list </font></option>

				<?php
				//قرا من الداتا بيس سلكت * وبعدين يعرض بس الي دي للقروب 
				for ($d = 1; $d <= 11; $d++) {
					print "<option value=\"$d\">Group $d</option>\n";
				}
				?>

				</select>
			</form>
			
		<br/> <br/> <br/>
		
	</div>

	
	
</div>



</main>




<!-- Script 3.3 - feedback.html -->
</body>
</html>