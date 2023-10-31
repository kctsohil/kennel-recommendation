<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "item";
$vcode=rand(10,1000);
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$pass=$_REQUEST['pass'];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO userinfo
VALUES ('$name', '$email','$pass','$vcode')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}




 
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
 
//Create an instance; passing `true` enables exceptions

 
  $mail = new PHPMailer(true);
 
    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;             //Enable SMTP authentication
    $mail->Username   = 'kctsohil@gmail.com';   //SMTP write your email
    $mail->Password   = 'tabpuooygdcuyjls';      //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit SSL encryption
    $mail->Port       = 587;                                    
 
    //Recipients
    $mail->setFrom( 'kctsohil@gmail.com', 'admin'); // Sender Email and name
    $mail->addAddress($email);     //Add a recipient email  
	$mail->isHTML(true);
$mail->CharSet='UTF-8';

 
    //Content
                   //Set email format to HTML
    $mail->Subject = "fsdfsdf sdf";   // email subject headings
    $mail->Body    =  "verification code is".$vcode; //email message
	$mail->SMTPOptions=array('ssl'=>array('verify_peer'=>false,'verify_peer_false'=>false,'allow_self_signed'=>false));      



    // Success sent message alert
    if(!($mail->send())) echo $mail->ErrorInfo; else echo 'verification code sent';




?>