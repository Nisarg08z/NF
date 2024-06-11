<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["suemail"])) {

    $mail = new PHPMailer(true);

    $email = $_POST["suemail"];



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
        $mail->addAddress($_POST["suemail"]);
        $mail->addReplyTo('traveladdicts.ac.in@gmail.com', 'Travel Addicts');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Welcome to Travel Addicts - Let the Adventure Begin!';
        $mail->Body = "

        <p> Dear " . $_POST["firstname"] . " " . $_POST["lastname"] . ", </p>
        
        <p> Welcome to Travel Addicts! We're thrilled to have you join our community of fellow travelers and adventure seekers. </p>
        
        <p> Your new account is now active, opening the door to a world of exciting possibilities and unforgettable experiences. Here's what you can look forward to: </p>
        
        <p> 1. <b>Discover Amazing Destinations</b>: Explore our curated selection of destinations, from exotic beaches to breathtaking mountains, and everything in between. Your next adventure awaits! </p>
        
        <p> 2. <b>Plan Your Dream Trip</b>: Use our powerful trip planning tools to create your perfect itinerary. Whether you're a solo explorer, a family on vacation, or a group of friends seeking adventure, we've got you covered. </p>
        
        <p> 3. <b>Connect with Fellow Travelers</b>: Join discussions, share tips and advice, and connect with other travelers who share your passion for exploration. Our community is friendly, welcoming, and full of valuable insights. </p>
        
        <p> 4. <b>Exclusive Offers and Deals</b>: Keep an eye on your inbox for exclusive offers, discounts, and special deals available only to members of our community. We'll make sure you never miss out on a great opportunity to save on your next trip. </p>
        
        <p> Ready to embark on your next adventure? Simply go our website and log in to your account and start planning your journey with us. </p>
        
        <p> If you have any questions or need assistance, our dedicated support team is here to help. Feel free to reach out to us at any time. </p>
        
        <p> Once again, welcome to Travel Addicts. Get ready to experience the world like never before! </p>
        
        <p> Happy travels, </p>
        
        <p> Nisarg Patel (Founder) & Team </p>
        <p> Customer Experience Manager </p>
        <p> Travel Addicts </p>

        ";

        $mail->send();
        
}