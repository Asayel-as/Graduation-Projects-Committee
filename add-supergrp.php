<?php require('connectDB.php');?>

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
	
<title>  </title>
<link rel="stylesheet" href="http://www.noblecomputer.co.in//css/bootstrap.min.css">
	<link href="http://www.noblecomputer.co.in//css/responsive.css" rel="stylesheet">
	

</head>
<body>


<header > </header>
<!-- 3:15am 28 march Asayel -->
		<div id="header" >
		
			<div class="collapse navbar-collapse navbar-left" style='margin-left: 10px; '>
			
         <ul class="nav navbar-nav">
                    <li class="active"><a href="http://www.noblecomputer.co.in/index.php">User</a></li>
				    
                   			
				  <li class="dropdown "  >
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Notification <i class="fa fa-angle-down"></i></a>
								
						<ul class="dropdown-menu">
								
								<?php
								require('Notifigation.php');
								?>
								
								
									<li><a href="#">hi </a></li>
									
					     </ul>
				   </li>
			   
					
					 <li class="active"><a href="home.php"  style='margin-left: 160px;' >Home</a></li>
					  <li class="active"><a href="signSE.php" style='margin-left: 10px;'>Logout</a></li>
			</div>
			
			
		</div>
			 
			
			
		</div>



 
 <div id='body-main'>

<?php





$idgrp = $_GET['gr'];  
$type_grp = mysqli_query($conn , "SELECT * FROM db.groups where `ID` = $idgrp" );
$groups = mysqli_fetch_array($type_grp);



$query = "SELECT * FROM gpc_db.supervisor"; /* SELECT FROM Cards TABLE */
$result = mysqli_query($conn,$query); /* EXECUTE QUERY */

echo " <h3> Add supervisor for group " . $groups['Name'] . "</h3>"; /* SUBMIT PAGE ON ITSELF */

echo "<table>";
echo "<tr><td>id</td><td>name</td><td>email</td> <td></td> </tr>";
while ($row = mysqli_fetch_array($result)){ /* FETCH ARRAY */
   
    $id=mysqli_real_escape_string($conn,$row['ID']);
   
   $chickgrp = mysqli_query($conn , " SELECT * FROM db.groupst where `idstud` = '$id' ");
    $check = mysqli_num_rows($result);
	print '999';
    if($check < 1){
     
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>"; 
    echo "<td> <form method='post' action='index.php'>  <input type='hidden' name='idspr' value='" . $row['id'] . "'> 
    <input type='hidden' name='idgrpp' value='" . $idgrp . "'>
     <button type='submit' name='addspr' > Select  </button> </a></td></tr>
     </form>"; 
    } else {
    }
}
mysqli_free_result($result);
echo "</table>";
?>
</div>
<footer></footer>
</body>
</html>