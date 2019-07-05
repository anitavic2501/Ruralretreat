<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';


class Sendemail{
//  private  $email = $_SESSION['email'];
// private $username = $_SESSION['uid'];
    static function sendmessage($messagebody){
    $mail = new PHPMailer(true);


    try {
    //Server settings
        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'ruralretreat123@gmail.com';                     // SMTP username
        $mail->Password   = '123rural';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('ruralretreat123@gmail.com', 'Rural Retreat');
        // var_dump($_SESSION['email']);

        $mail->addAddress(''.$_SESSION['email'].'', $_SESSION['username']);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Rural Retreat Booking Notification';
        $mail->Body    = $messagebody;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    
        }   catch (Exception $e) {
        echo "<script>console.log('mail not sent')</script>";
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


}
static function replytomail($username, $emailid , $messagebody){
    $mail = new PHPMailer(true);


    try {
    //Server settings
        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'ruralretreat123@gmail.com';                     // SMTP username
        $mail->Password   = '123rural';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('ruralretreat123@gmail.com', 'Rural Retreat');
        // var_dump($_SESSION['email']);

        $mail->addAddress(''.$emailid.'',''.$username.'');
            // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Message Reply';
        $mail->Body    = $messagebody;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    
        }   catch (Exception $e) {
        echo "<script>console.log('mail not sent')</script>";
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


}
}







?>