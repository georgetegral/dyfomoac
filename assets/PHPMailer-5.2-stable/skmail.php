<?php
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'sk2644303@gmail.com';                 // set youe email id
$mail->Password = '7301636258';                           // write password of the above email id
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('sk2644303@gmail.com', 'Santosh');
$mail->addAddress('sonusantoshkr@gmail.com', 'S Kumar');     // Add a recipient. This is recipient.
//$mail->addAddress('sonusantoshkr@gmail.com');               // Name is optional
//$mail->addReplyTo('sonusantoshkr@gmail.com', 'Information');
$mail->addBCC('sonusantoshkr@gmail.com');
//$mail->addBCC('sonusantoshkr@gmail.com','sonu');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'mail';
$mail->Body    = 'Hi there! What is going these days <b>Guys!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}