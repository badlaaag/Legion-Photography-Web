<?php
/**
 * This example shows sending a message using PHP's mail() function.
 */
require 'phpmailer/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
if(isset($_POST['fname']) && isset($_POST['phone']) && isset($_POST['email'])) {
	//Important - UPDATE YOUR RECEIVER EMAIL ID, NAME AND SUBJECT
		
	// Please enter your email ID 	
	$to_email = 'your-email@website.com';
	// Please enter your name		
	$to_name ="your name";
	// Please enter your Subject
	$subject="PHOTOGRAPHY LP";
	
	$sender_fname = $_POST['fname'];
	$sender_phone = $_POST['phone'];
	$from_mail = $_POST['email'];	
	$mail->SetFrom( $from_mail , $sender_name );
	$mail->AddReplyTo( $from_mail , $sender_name );
	$mail->AddAddress( $to_email , $to_name );
	$mail->Subject = $subject;
	
	if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['message']) && isset($_POST['phone']) && isset($_POST['email'])) {
		$message = $_POST['message'];
		$lname = $_POST['lname'];
		$received_content = "SENDER FIRST NAME : ". $sender_fname ."</br> SENDER LAST NAME : ".$lname."</br> SENDER PHONE : ".$sender_phone."</br> SENDER EMAIL : ".$from_mail. "</br> SENDER MESSAGE: </br/> ".$message;
	}
	else {
		$sender_message ="";
		$sender_lname ="";
		
	$received_content = "SENDER FIRST NAME : ". $sender_fname ."</br> SENDER PHONE : ".$sender_phone."</br> SENDER EMAIL : ".$from_mail;
	}
	
	$mail->MsgHTML( $received_content );
	
	echo $mail->Send();
	exit;	
}