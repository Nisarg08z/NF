<?php

require('../required-file/dbconnection.php');

$email = $_POST['email'];

$query = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    
    $otp = mt_rand(100000, 999999);

    require "../email/otp-email.php";

    session_start();
    $_SESSION['otp'] = $otp;
    $_SESSION['email'] = $email;

    header("Location: otp.php");
    exit();
} else {
    echo "Email not found in database.";
}
?>
