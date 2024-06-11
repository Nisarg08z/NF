<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign up</title>
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <nav>
        <img src="../img/logo.png" class="logo" alt="Logo" title="Travel Addicts">

        <ul class="navbar">
            <li>
                <a href="../website.php">Home</a>
                <a href="../website.php#locations">Locations</a>
                <a href="../website.php#package">Packages</a>
                <a href="../html/about.php">About Us</a>
                <a href="../html/contact.php">Contact Us</a>
            </li>
        </ul>
    </nav>

    <div class="wrapper">

        <!----------------------------- Form box ----------------------------------->
        <div class="form-box">

            <!------------------- registration form -------------------------->

            <form action="../data/user.php" method="post" class="register-container" id="register">
                <div class="top">
                    <span>Have an account? <a href="login.php" onclick="">Login</a></span>
                    <header>Sign Up</header>
                </div>
                <div class="two-forms">
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Firstname " name="firstname" required>
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Lastname" name="lastname" required>
                        <i class="bx bx-user"></i>
                    </div>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Email" name="suemail" required>
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Password" name="supassword" required>
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Register" id="submit">
                </div>
                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" id="register-check">
                        <label for="register-check"> Remember Me</label>
                    </div>
                    <div class="two">
                        <label><a href="#">Terms & conditions</a></label>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!-- Footer -->

    <section class="footer">
        <div class="foot">
            <div class="footer-content">

                <div class="footlinks">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="../html/register.php">booking</a></li>
                        <li><a href="../html/about.php">About Us</a></li>
                        <li><a href="../html/contact.php">Contact Us</a></li>
                    </ul>
                </div>

                <div class="footlinks">
                    <h4>Connect</h4>
                    <div class="social">
                        <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                        <a href="#" target="_blank"><i class='bx bxl-instagram'></i></a>
                        <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                        <a href="#" target="_blank"><i class='bx bxl-linkedin'></i></a>
                        <a href="#" target="_blank"><i class='bx bxl-youtube'></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="end">
            <p>Copyright © 2022 Travel Addicts All Rights Reserved.<br>Website developed by: Nisarg & Kunj</p>
        </div>
    </section>
    <?php
      if(isset($_COOKIE['emailerror']) && $_COOKIE['emailerror'] == true){
        echo '<script> alert("Email is already registered!!"); </script> ';
      }
    ?>


</body>

</html>