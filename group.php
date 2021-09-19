
<?php require('connectDB.php') ?>

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



$idgrp = $_GET['id'];  
$type_grp = mysqli_query($conn , "SELECT * FROM db.groups where `id` = $idgrp" );
$groups = mysqli_fetch_array($type_grp);



if (isset($_POST['delete'])){
    $checkbox = $_POST['checkbox'];
    $count = count($checkbox);

    for($i=0;$i<$count;$i++){

        if(!empty($checkbox[$i])){ /* CHECK IF CHECKBOX IS CLICKED OR NOT */

        $id = mysqli_real_escape_string($conn,$checkbox[$i]); /* ESCAPE STRINGS */
        mysqli_query($conn,"DELETE FROM grpstud WHERE id = '$id'"); /* EXECUTE QUERY AND USE ' ' (apostrophe) IN YOUR VARIABLE */

        } /* END OF IF NOT EMPTY CHECKBOX */

    } /* END OF FOR LOOP */

} /* END OF ISSET DELETE */
echo "<h3> <b>name group:</b> " . $groups['name'] . "<h3>";
?>

<h3>
Supervisor
</h3>
<table>
<tr><td> </td><td>id </td><td>name </td> <td> </td></tr>
<?php
$query1 = "SELECT * FROM grpsuper where idgrpp = '$idgrp'"; /* SELECT FROM Cards TABLE */
$result1 = mysqli_query($conn,$query1); /* EXECUTE QUERY */
while ($row1 = mysqli_fetch_array($result1)){ /* FETCH ARRAY */


    $id= $row1['id'] ;    
    $idspr = $row1['idspr']; 
    $type_spr = mysqli_query($conn , "SELECT * FROM `supervisor` where `id` = $idspr" );
    $spr = mysqli_fetch_array($type_spr);    
?>
<tr>
<td> <?php echo $spr['id'] ?> </td>
   <td> <?php echo $spr['name'] ?> </td>
   <td> <?php echo $spr['email'] ?> </td>
   
   </tr>
</table>


<?php
}
$query = "SELECT * FROM grpstud where idgrp = '$idgrp'"; /* SELECT FROM Cards TABLE */
$result = mysqli_query($conn,$query); /* EXECUTE QUERY */

echo " <h3> <b>student</b> <h3> <form action='' method='POST'>"; /* SUBMIT PAGE ON ITSELF */

echo "<table>";
echo "<tr><td> </td><td>id </td><td>name </td> <td>email </td></tr>";
while ($row = mysqli_fetch_array($result)){ /* FETCH ARRAY */

$id= $row['id'] ;    
$idstd = $row['idstud']; 
$type_std = mysqli_query($conn , "SELECT * FROM `student` where `id` = $idstd" );
$student = mysqli_fetch_array($type_std);
?>

   <tr><td><input type='checkbox' name='checkbox[]' value='<?php echo  $id ?>'></td>
   <td> <?php echo $student['id'] ?> </td>
   <td> <?php echo $student['name'] ?> </td>
   <td> <?php echo $student['email'] ?> </td>
<?php   
}
mysqli_free_result($result);
echo "</table>";
?>

<tr>
<td colspan="5" align="center"><input  name="delete" type="SUBMIT" id="delete" value="delete" action="POST"></td>
</tr>
</form>
<footer></footer>
</body></html>