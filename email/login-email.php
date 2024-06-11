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
        $mail->Subject = 'Account Activity Alert: Successful Login to Your Travel Addicts Account';
        $mail->Body = "

        <p> Dear user, </p>
        
        <p> We hope this email finds you well. </p>
        
        <p> We're writing to inform you that there has been a recent login to your account on Travel Addicts. Your account security is of utmost importance to us, and we wanted to keep you informed about this activity. </p>
        
        <p> Here are the details of the login: </p>
        
        <p> If this login was initiated by you, you can disregard this email. However, if you did not log in recently or if you notice any suspicious activity on your account, please take immediate action: </p>
        
        <p> 1. <b>Secure Your Account</b>: Change your password immediately by visiting the login page of our website and selecting the Forgot Password option. </p>
        
        <p> 2. <b>Review Account Activity</b>: Check your account settings and recent activity to ensure that no unauthorized changes have been made. </p>
        
        <p> 3. <b>Contact Support</b>: If you believe your account has been compromised or if you have any concerns, please contact our support team immediately for assistance. </p>
        
        <p> Your security is our top priority, and we are here to help you protect your account and personal information. </p>
        
        <p> Thank you for your attention to this matter. </p>
        
        <p> Best regards, </p>
        
        <p> [Nisarg Patel & Kunj Dave](Founder) & Team </p>
        <p> Customer Experience Manager </p>
        <p> Travel Addicts </p>
        
        ";

        $mail->send();
        
}