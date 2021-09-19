<?php include('coonfig.php')?>

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
			   
					
					 <li class="active"><a href="home.php"  style='margin-left: 630px;' >Home</a></li>
					  <li class="active"><a href="signSE.php" style='margin-left: 10px;'>Logout</a></li>
			</div>
			
			
		</div>
			 
			
			
		</div>
		
<div id='body-main'>


<?php
$idgrp = $_GET['gr'];  
$type_grp = mysqli_query($conn , "SELECT * FROM `groups` where `id` = $idgrp" );
$groups = mysqli_fetch_array($type_grp);



if (isset($_POST['go'])){

    echo$idgrp = $_GET['gr'];
    $checkbox = $_POST['checkbox'];
    $count = count($checkbox);

    for($i=0;$i<$count;$i++){

        if(!empty($checkbox[$i])){ /* CHECK IF CHECKBOX IS CLICKED OR NOT */

        $id = mysqli_real_escape_string($conn,$checkbox[$i]); /* ESCAPE STRINGS */
        mysqli_query($conn,"INSERT INTO `grpstud` (`id`, `idstud` , `idgrp` ) VALUES (NULL , '$id' , '$idgrp')"); /* EXECUTE QUERY AND USE ' ' (apostrophe) IN YOUR VARIABLE */
        
        echo "<meta http-equiv='refresh' content='0; url=group.php?id=$idgrp' />";
        } 

    } 

} 

$query = "SELECT * FROM student"; /* SELECT FROM Cards TABLE */
$result = mysqli_query($conn,$query); /* EXECUTE QUERY */

echo "<h3> Add student for group " . $groups['name'] . "</h3>  <form action='' method='POST'>"; /* SUBMIT PAGE ON ITSELF */

echo "<table>";
echo "<tr><td></td><td>id</td><td>name</td><td>email</td></tr>";
while ($row = mysqli_fetch_array($result)){ /* FETCH ARRAY */
   
    $id=mysqli_real_escape_string($conn,$row['id']);
   
    $chickgrp = mysqli_query($conn , " SELECT * FROM `grpstud` where `idstud` = '$id' ");
    $check = mysqli_num_rows($chickgrp);
    if($check < 1){
     
    echo "<tr><td><input type='checkbox' name='checkbox[]' value='$id'></td>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td></tr>"; 
    } else {
    }
}
mysqli_free_result($result);
echo "</table>";
?>

<tr>
<td colspan="5" align="center"><input name="go" type="SUBMIT" id="go" value="ADD" action="POST"></td>
</tr>
</form>
<div>

<footer></footer>
</body></html>