<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["email"])) {

    $mail = new PHPMailer(true);

    $email = $_POST["email"];



    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'traveladdicts.ac.in@gmail.com';
    $mail->Password = 'voifdcmgxqpvvlry';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Recipients
    $mail->setFrom('traveladdicts.ac.in@gmail.com', 'Travel Addicts');
    $mail->addAddress($_POST["email"]);
    $mail->addReplyTo('traveladdicts.ac.in@gmail.com', 'Travel Addicts');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Your One-Time Password (OTP) Verification';
    $mail->Body = "



            <p>Dear user,</p>

            <p>OTP :- ".$otp."</p>

            <P>Thank you</P>

        ";

    $mail->send();

}