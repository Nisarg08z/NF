<?php
if (isset($_POST['check'])) {
    session_start();
    if (!isset($_SESSION['otp']) || !isset($_POST['otp']) || $_SESSION['otp'] != $_POST['otp']) {
        echo "Invalid OTP or session expired.";
        exit();
    }

}



require ('../required-file/dbconnection.php');

if (isset($_POST['change-password'])) {
    session_start();
    $email = $_SESSION['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if (empty($password) || empty($cpassword)) {
        echo "<script>alert('Please fill out all the fields')</script>";
        echo '<meta http-equiv="refresh" content="0; url=change_Password.php">';
    } else if ($password !== $cpassword) {
        echo "<script>alert('Passwords do not match')</script>";
        echo '<meta http-equiv="refresh" content="0; url=change_Password.php?error=notmatching">';
    } else {
        $query = "UPDATE user SET password = '$password' WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            header("location: ../user/login.php");
        } else {
            echo "Error changing password: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create a New Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        html,
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        ::selection {
            color: #fff;
            background: #6665ee;
        }

        .container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;

        }

        .row {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
        }

        video {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
            overflow: hidden;
        }

        .form {

            position: relative;
            z-index: 1;
            margin: 0 auto;
            max-width: 400px;
            background: #fff;
            padding: 30px 35px;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .form h2 {
            text-align: center;
        }

        .form p {
            text-align: center;
            margin-bottom: 15px;
        }

        .form .form-control {
            height: 40px;
            font-size: 15px;
        }

        .form .button {
            background: #6665ee;
            color: #fff;
            font-size: 17px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .form .button:hover {
            background: #5757d1;
        }

        .form .link {
            text-align: center;
            padding: 5px 0;
        }

        .form .link a {
            color: #6665ee;
        }
    </style>
</head>

<body>
    <div class="container">
        <video autoplay muted loop>
            <source src="../img/bgvid.mp4" type="video/mp4">
        </video>
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="" method="POST">
                    <h2 class="text-center">New Password</h2>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Create new password"
                            required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password"
                            required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change-password" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>