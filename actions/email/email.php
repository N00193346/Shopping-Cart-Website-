<?php
require_once '../../config.php';
   require "include/flash.php";
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    $rules = [
        "message" => "present|minlength:10|maxlength:256",
        "name" => "present|minlength:4|maxlength:64",
        "email" => "present|minlength:7|maxlength:128",
    ];

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.mailtrap.io';                     // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '952bf7c174c357';                       // SMTP username
    $mail->Password   = '3398da268a1dbc';                       // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 2525;                                   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');           // Add a recipient
    $mail->addAddress('ellen@example.com');                     // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');            // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');       // Optional name

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->setFrom($request->input("email"), $request->input("name"));
    $mail->Subject = $request->input("subject");
    $mail->Body    = $request->input("message");
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    if ($mail->send()) {
        $request->session()->set("flash_message", "Your message has been sent!");
        $request->session()->set("flash_message_class", "alert-info");

        $request->session()->forget("flash_data");
        $request->session()->forget("flash_errors");
        
        $request->redirect("/views/contact.php");
    }


    // echo 'Message has been sent';
} catch (Exception $e) {
    $request->session()->set("flash_message", "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    $request->session()->set("flash_message_class", "alert-warning");

    $request->session()->set("flash_data", $request->all());
    $request->session()->set("flash_errors", $request->errors());

    $request->redirect("/views/contact.php");
}
?>