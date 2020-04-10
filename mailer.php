<?php
	
	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	// Load Composer's autoloader
	require 'vendor/autoload.php';
	
	$senderName =$_POST["name"];
	$senderEmail = $_POST["email"];
	$senderContactNo = $_POST["contactno"];
	$senderSubject = $_POST["subject"];
	$senderMessageBody = $_POST["message"];


	$mail = new PHPMailer(true);

	try {
    //Server settings
    $mail->SMTPDebug = 2;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.sendgrid.net';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'apikey';                     // SMTP username
    $mail->Password   = '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';                               // SMTP password
    $mail->SMTPSecure = 'TLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('ubaidurrehman@gmail.com', 'Portfolio');
    $mail->addAddress('ubaidurrehman@gmail.com', $senderName);     // Add a recipient
    

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $senderSubject;
    // $mail->Body    = 'Contact No# '.$senderContactNo.'. Message : '.$senderMessageBody;
    $mail->AltBody = 'Contact No# '.$senderContactNo.'. Message : '.$senderMessageBody;

    $mail->send();
    echo 'Message has been sent';
	} catch (Exception $e) {
	    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}

?>