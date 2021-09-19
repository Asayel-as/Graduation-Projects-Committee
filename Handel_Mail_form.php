<!-- Done by Marcus Bointon-->
<!-- Modified shath alseni 29 march -->
<?php

//require 'C:\AppServ\www\conn.php';

require('connectDB.php');

function send_message(){
	
	$super = false;
	$st =  false;
	$all = false;
	
if(isset($_POST['submit'])){//to run PHP script on submit


//supervisors ************************************************************************
if(!empty($_POST['supervisors'])){
	
	$super = true;
// Loop to store values of individual checked checkbox.
foreach($_POST['supervisors'] as $selected){
$to_chechboxs[] = $selected;
}
}

//students ************************************************************************
if(!empty($_POST['all_students'])){
	
	$super = true;
// Loop to store values of individual checked checkbox.
foreach($_POST['all_students'] as $selected){
$to_chechboxs[] = $selected;
}
}



}// end if submit


$mailto = $_POST['mail_to']; 
$mailSub = $_POST['mail_sub']; 
$mailMsg = $_POST['mail_msg'];






require 'C:\AppServ\www\PHPMailer-master\PHPMailer-master\src\PHPMailer.php';
require 'C:\AppServ\www\PHPMailer-master\PHPMailer-master\src\Exception.php';
require 'C:\AppServ\www\PHPMailer-master\PHPMailer-master\src\SMTP.php';

$mail = new PHPMailer\PHPMailer\PHPMailer();
//$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'gpCommittee.uqu@gmail.com';                 // SMTP username
    $mail->Password = 'gpcUQU1440';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('gpCommittee.uqu@gmail.com', 'Graduation projects committee');
	
    // Add a recipient	
	$mail->addAddress($mailto);
		
	
	if($super){
	foreach($to_chechboxs as $selected){
		$mail->addAddress($selected);
	} }



if($st){
	
	echo "send to stu";
	foreach($to_chechboxs2 as $selected2){
		$mail->addAddress($selected2);
} } 

	
  
     for($i=0;$i<count($_FILES['att']['temp_name']);$i++){
    //Attachments
	//print_r($_FILES['att']);exit;
	$mail->AddAttachment($_FILES['att']['temp_name'][$i],$_FILES['att']['name'][$i]);
	 }
   // $mail->addAttachment($path);         // Add attachments
   // $mail->addAttachment('');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $mailSub;
    $mail->Body = $_POST['mail_msg'];
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
	


	
	
	
	
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
}// end send_message function 





send_message();// call send_message
?>

<html>
</html>