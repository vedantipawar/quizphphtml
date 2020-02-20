<?php
session_start();


$con = mysqli_connect('localhost','root');
  
  mysqli_select_db($con,'quizdatabase');

$mailid=$_REQUEST["mail"];
echo $mailid;
$query=mysqli_query($con,"select * from quizregistration where email='$mailid' LIMIT 1");
$row=mysqli_fetch_array($query);
print_r($row);
require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer();
  
  //Enable SMTP debugging.
  $mail->SMTPDebug = 1;
  //Set PHPMailer to use SMTP.
  $mail->isSMTP();
  //Set SMTP host name
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
  //Set this to true if SMTP host requires authentication to send email
  $mail->SMTPAuth = TRUE;
  //Provide username and password
  $mail->Username = "hallohappiness1234@gmail.com";
  $mail->Password = "admin@1234";
  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "false";
  $mail->Port = 587;
  //Set TCP port to connect to
  
  $mail->From = "hallohappiness1234@gmail.com";
  $mail->FromName = "vedanti";
  
  $mail->addAddress("hallohappiness1234@gmail.com");
  
  $mail->isHTML(true);
 
  $mail->Subject = "test mail";
  $mail->Body = "<i>this is your password:</i>".$row["pass"];
  $mail->AltBody = "This is the plain text version of the email content";
  if(!$mail->send())
  {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
   echo "Message has been sent successfully";
  }