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
        $mail->Subject = 'New Booking Confirmation: [Trip Details]';
        $mail->Body = "

            <p> Dear " . $_POST["name"] . ", </p>
            
            <p> We are delighted to inform you that a new booking has been made on Travel Addicts for a trip. Here are the details: </p>
        
            <p> Guest Name: ".$_POST["name"]." </p>
            <p> Trip Date: ".$_POST["departure"]." </p>
            <p> return Date: ".$_POST["returndate"]." </p>
            <p> Trip Details: ".$_POST["destination"]." + ".$_POST["package"]." </p> 
            <p> Contact Information: traveladdicts.ac.in@gmail.com | +91 9979069166 & +91 8320947770 </p>
            
            <p> Please ensure that you have all necessary arrangements in place for the guest's arrival. If there are any specific requirements or preferences indicated by the guest, kindly take note and make necessary arrangements to ensure their satisfaction. </p>
            
            <p> If you have any questions or need further assistance, please feel free to contact us at TravelAddicts.com. </p>
            
            <p> Thank you for using Travel Addicts! </p>
            
            <p> Best regards, </p>

            <p> Nisarg Patel (Founder) & Team </p>
            <p> Customer Experience Manager </p>
            <p> Travel Addicts </p>

        ";

        $mail->send();
        
}