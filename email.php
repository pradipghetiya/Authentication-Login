<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php'; // Adjust path if necessary

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'codetechflutter@gmail.com';                 // SMTP username (your Gmail email)
    $mail->Password   = 'fkae anzg opbh jjka';              // SMTP password (or app password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to (587 for TLS)

    // Recipients
    $mail->setFrom('codetechflutter@gmail.com', 'Ravi Godhani');        // Sender's email
    $mail->addAddress('pradipghetiya@gmail.com', 'Ravi');    // Add recipient

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = 'Test Email using PHPMailer';
    $mail->Body    = 'This is a <b>test email</b> sent from localhost using PHPMailer and Gmail SMTP.';
    $mail->AltBody = 'This is the plain text version of the email content.';

    $mail->send();
    echo 'Email has been sent successfully';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
