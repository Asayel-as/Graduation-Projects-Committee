<?php require('connectDB.php');?>


<html>
<head>
<title> Groupes </title>

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
                    <li class="active"  style='margin-left: 150px;'><a href="#">User</a></li>
				    
                   			
				  <li class="dropdown "  >
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Notification <i class="fa fa-angle-down"></i></a>
								
						<ul class="dropdown-menu">
								
								<?php require('Notifigation.php');	?>
								
									<li><a href="#"> hi </a></li>
	
					     </ul>
				   </li>
			   
					
					 <li class="active"><a href="home.php"  style='margin-left: 360px;' >Home</a></li>
					  <li class="active"><a href="signSE.php" style='margin-left: 10px;'>Logout</a></li>
			</div>
			
			
		</div>
			 
			
			
		</div>



 
 <div id='body-main'>



<center>
</br></br></br></br>
<?php 
if (isset($_POST['addspr'])) {
 

    $addgrpspr = "INSERT INTO `grpsuper` (`id`, `idspr` , `idgrpp` ) VALUES 
    (NULL , '$_POST[idspr]' , '$_POST[idgrpp]' )" ;
            
    
            if ($conn->query($addgrpspr) ) {
    
    
                echo' 
               Done
               
                ';
                echo "<meta http-equiv='refresh' content='10'; url='.$_SERVER[REQUEST_URI]. '/>";
          
              } else {
                 
                  echo' 
                  Error! 
                   ';
                   echo "<meta http-equiv='refresh' content='10'; url='.$_SERVER[REQUEST_URI]. '/>";
          
              } 
    
    
    
            }

if(isset($_GET['delete'])){

    $del = mysqli_query($conn,"DELETE FROM groups WHERE id = ".$_GET['delete']);
    if($del){
    echo'
    Done';
                            
}else{
   echo'
   Error!
   </div>';
}
}

    ?>
<a href="add-group.php"><button> Add group </button> </a>

    
    
<table>
<tr>
<td> Name </td>
<td> <td>
<td> <td>

<td> <td>
</tr>
<tr>
    <?php

$group = mysqli_query($conn , " SELECT * FROM groups  " );
while($row_grp = $group->fetch_assoc()) {
?>
<td> <?php echo $row_grp['name']?> </td>
<td> 
<a href="group.php?id=<?php echo $row_grp['id']?>"><button> Show  </button> </a> <td>

<td> 
<a href="add-stdgrp.php?gr=<?php echo $row_grp['id']?>"><button> Add student </button> </a> <td>
<td> 
<a href="?delete=<?php echo $row_grp['id']?>"><button> Delete </button> </a> <td>

</tr>
<?php 
}

?>


</table>
</div>
</footer></footer>
</body>
</html>