<style>
	#body-main{
		width: 950px;
        height: 100%;
		//background: #48A9B0 url("logn imge10.png") no-repeat;
		background-size: cover;
		margin: 70 auto;
		//background-color: #48A9B0 ;
		border: 1px solid #DCDCDC;

	}	
	
	</style>
<div id="body-main">
<?php
require('cont.php');

 $myfile1 = fopen("directory.txt","r") or die("Unable to open file!");
$s= fread($myfile1,filesize("directory.txt"));
fclose($myfile1);


$target_file = basename($_FILES["fileToUpload"]["name"]);
$target_dir = $s."/";
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


ini_set ('display_errors', 1); 
error_reporting (E_ALL & ~E_NOTICE);
 
require('connectDB.php');

$query1 = "SELECT * FROM gpc_db.container ORDER BY Container_name DESC"; 
if ($r = mysqli_query ($conn, $query1)) {
// Run the query1.
// Retrieve and print every record.
while ($row = mysqli_fetch_array ($r)) {
echo" <div style=\"background-color:#eeedf2; height:150px; border-top-left-radius:1.5em; border-top-right-radius:1.5em; border-bottom-right-radius:1.5em;  border-bottom-left-radius:1.5em;  text-align:center; margin-bottom:2%; font:24px Verdana,arial,Helvetica,sans-serif\" > 
<div style=\"background-color:#20B2AA; height:30px; border-top-left-radius:1.5em; border-top-right-radius:1.5em;  text-align:center; margin-bottom:1%;\"> {$row['Container_name']}   </div>";  
echo"<table> <tr><td><div style=\"background-color:#eeedf2; height:100px; width:500px; border-bottom-left-radius:1.5em;   text-align:left;  font:15px Verdana,arial,Helvetica,sans-serif\" > "; view($row['Container_name']); 
echo"</div> </td></tr></table></div>";
}} else { // Query1 didn't run.
die ('<p>Could not retrieve the data because: <b>' . mysqli_error($conn) . "</b>. The query was $query1.</p>");} 
 





?>
</div>