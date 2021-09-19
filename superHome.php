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
                    <li class="active"><a href="#"  style='margin-left: 150px;' >User</a></li>
				    
                   			
				  <li class="dropdown "  >
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Notification <i class="fa fa-angle-down"></i></a>
								
						<ul class="dropdown-menu">
								
							<?php
								require('Notifigation.php');
							?>
								
									<li><a href="#">hi </a></li>
									
					     </ul>
				   </li>
			   
					
					 <li class="active"><a href="#"  style='margin-left: 630px;' >Home</a></li>
					  <li class="active"><a href="signSE.php" style='margin-left: 10px;'>Logout</a></li>
			</div>
			
			
		</div>
			 
			
			
		</div>
		

<main>


<div id="body-main">
<center> <h1 style="color: #48A9B0;" >  Home Page  </h1> </center>


<table style="width:100%">
  <tr>
     
 
<th>
<div  style='margin-left: 50px;   border: 1px solid #DCDCDC; width:250px; height: height: 70px;'>

<form action="superdoc.php" method="post" style="margin-left: 5px; margin-top: 10px;">
<p style="margin-left: 30px;">Select for show info:</p>



<select name="gropList" >

<option><font color="#DCDCDC"> Group list </font></option>
<?php
//قرا من الداتا بيس سلكت * وبعدين يعرض بس الي دي للقروب 
for ($d = 1; $d <= 11; $d++) {
	print "<option value=\"$d\">Group $d</option>\n";
}
?>

</select>

<input type="submit" name="submit" value="Open" />
</form>

</div>
</th>
<th>
	<div style='margin-left: 30px; margin-right: 60px; margin-top: 30px; border: 1px solid #DCDCDC;'>
	
		<br/><br/>	
		<a href="form.php" style='margin-left: 120px;'> <img src="formPic.png" alt="Form" height="122" width="122"> </a>
		<a href="lview.php" style='margin-left: 60px;'> <img src="libPic.png" alt="Library" height="122" width="122"> </a>
		
		<br/> <br/> <br/>
	</div>	
	</th>	
</tr>
</table>	
</div>

 

</main>




<!-- Script 3.3 - feedback.html -->
</body>
</html>