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
		height: 10px;
		background-color: 	#DCDCDC;
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
	<header > </header>
<div id="header"></div>
<title>  </title>


</head>
<body>
<?php 

if (isset($_POST['addgrp'])) {
 

    $addgrp = "INSERT INTO db.groups (`id`, `name` ) VALUES 
    ('$_POST[id]' , '$_POST[name]' )" ;
            
    
            if ($conn->query($addgrp) ) {
    
    
                echo'<div class="msgg">
               Done! 
                </div>
                ';
                $last_id = $conn->insert_id;
                header("location:add-supergrp.php?gr=" . $last_id . "");
              } else {
                 
                  echo'<div class="msgr">
                  Error! 
                   </div>';
                   echo "<meta http-equiv='refresh' content='2'; url='.$_SERVER[REQUEST_URI]. '/>";
          
              } 
    
    
    
            }
            
?>
<form action="" method="post">
<h3> Add group </h3>
<p> Name: 
<input name="name"> </p>

<p> id: 
<input name="id"> </p>

<button name="addgrp" type="submit" > ADD </button>
</form>
<footer></footer>
</body>
</html>