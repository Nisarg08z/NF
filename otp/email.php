<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Forgot Password</title>
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
        <form action="send_otp.php" method="POST" autocomplete="">
          <h2>Forgot Password</h2>
          <p>Enter your email address</p>
          <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="Enter email address">
          </div>
          <div class="form-group">
            <input class="form-control button" type="submit" name="check-email" value="Continue">
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>