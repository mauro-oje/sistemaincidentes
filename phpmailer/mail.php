<?php 
	require 'lib/class.phpmailer.php';

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Mailer = 'smtp';
	$mail->SMTPAuth = true;
	$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
	$mail->Port = 465;
	$mail->SMTPSecure = 'ssl';
	// or try these settings (worked on XAMPP and WAMP):
	// $mail->Port = 587;
	// $mail->SMTPSecure = 'tls';


	$mail->Username = "sgincidentes@gmail.com";
	$mail->Password = "SGincidentes21";

	$mail->IsHTML(true); // if you are going to send HTML formatted emails
	$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.

	$mail->From = "sgincidentes@gmail.com";
	$mail->FromName = "sgincidentes@gmail.com";

	$mail->addAddress("cromero2386@gmail.com","User 1");
	$mail->addAddress("mauro88_z@hotmail.com","User 2");

	//$mail->addCC("user.3@ymail.com","User 3");
	//$mail->addBCC("user.4@in.com","User 4");

	$mail->Subject = "Testing PHPMailer with localhost";
	$mail->Body = "Hi,<br /><br />This system is working perfectly.";

	if(!$mail->Send())
	    echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
	else
	    echo "Message has been sent";

 ?>