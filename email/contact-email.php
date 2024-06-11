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
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'traveladdicts.ac.in@gmail.com';
        $mail->Password   = 'voifdcmgxqpvvlry';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('traveladdicts.ac.in@gmail.com', 'Travel Addicts');
        $mail->addAddress($_POST["email"]);
        $mail->addReplyTo('traveladdicts.ac.in@gmail.com', 'Travel Addicts');

        // Content
        $mail->isHTML(true);
        $mail->Subject = $_POST["subject"];
        $mail->Body = "

        <p> Dear ".$_POST["myname"].", </p>
        
        <p> We're pleased to inform you that a new inquiry has been submitted via our website, Travel Addicts. Here are the details: </p>
        
        <p> Inquirer's Name: ".$_POST["myname"]." </p>
        <p> Email Address: ".$_POST["email"]." </p>
        <p> Subject of Inquiry: ".$_POST["subject"]." </p>
        <p> Message: ".$_POST["message"]." </p>
        
        <p> Please make sure to respond promptly to address the inquiry and provide the necessary assistance. This timely response will greatly contribute to our commitment to excellent customer service. </p>
        
        <p> Should you require any further information or assistance, please feel free to reach out to us at Travel Addicts. </p>
        
        <p> Thank you for your attention to this matter. </p>
        
        <p> Warm regards, </p>
        
        <p> Nisarg Patel (Founder) & Team </p>
        <p> Customer Experience Manager </p>
        <p> Travel Addicts </p>

        ";

        $mail->send();
        
}