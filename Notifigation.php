<?php
function trace_calendar(){
										require('connectDB.php');
										
										$sql0 = "SELECT Deadline_date , Notification_title FROM gpc_db.calendar";
										$result = $conn->query($sql0);

										if ($result->num_rows > 0) {
											// output data of each row
										
											while($row = $result->fetch_assoc()) {
												$x=$row["Deadline_date"];
												
												//$ten_days = strtotime('-5 days', $x);
												
												//$alertdate=date('Y-m-d', $alert);
												//echo $ten_days;
												if($x.""<=date("Y-m-d").''){?>
												
												 <li><a href="#">  
												 <?php 
												 echo "".$row["Deadline_date"]."<br/>Title :".$row["Notification_title"]." <br/>"; ?> </a></li>
										
										<?php 
										
										
												}//edn if deadline_date==today date
										
										}//end while 
										}


								$conn->close();
}
trace_calendar();
								
								?>