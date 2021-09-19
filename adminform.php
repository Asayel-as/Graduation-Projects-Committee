
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
								
								<?php
								require('Notifigation.php');
								?>
								
								
									<li><a href="#">hi </a></li>
									
					     </ul>
				   </li>
			   
					
					 <li class="active"><a href="adminHome.php"  style='margin-left: 160px;' >Home</a></li>
					  <li class="active"><a href="signSE.php" style='margin-left: 10px;'>Logout</a></li>
			</div>
			
			
		</div>
			 
			
			
		</div>
		

<main>


<div id="body-main">
 <h1 style=" margin-left:10%;  font-family: Times New Roman",Times, serif;"  > Form Uploaded: </h1>
  
 <form action="adminform.php" method="post" enctype="multipart/form-data">
  <table style="float:right;  margin-right:17%;  ">
  <tr>  
  <td > <input type="file" name="fileToUpload" id="fileToUpload"> </td>
  <td >  <input type="image"  name="submit"  width="50" height="50" alt="upload" src="add.PNG"></td>
  </tr>
   </form>
   <form action="adminform.php" method="post" >
  <tr>
  <td ><input type="text" name="f_name" size="34" placeholder="FileName.type"/></td>
  <td ><input type="image" name="done"  width="50" height="50" alt="delete" src="xxx.PNG"></td>
  </tr>
  </table>
 </form>
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
//---------------------------------

$target_file = basename($_FILES["fileToUpload"]["name"]);
$target_dir = "uploads/";
$target_path = $target_dir . $target_file ;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_path,PATHINFO_EXTENSION));

if($target_file){

// Check if file already exists
if (file_exists($target_path)) {
    echo "Sorry, file already exists.";
	
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
	
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_path)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
		//
    }
}

}
//----------------------
$file_name = $_POST['f_name'];
$file_path = "uploads/".$file_name;
if($file_name){
if (!unlink($file_path))
  {
  echo ("Error deleting $file_path");
  }
else
  {
  echo ("Deleted $file_path");
  }
}


?>

</div>



</main>




<!-- Script 3.3 - feedback.html -->
</body>
</html>