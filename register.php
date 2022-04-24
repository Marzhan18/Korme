<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kórme Registration</title>
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="form-elements.css">
  <link rel="stylesheet" href="style.css">

</head>
<body>
  <div class="top-content">
          
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Korme</strong> Registration </h1>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                          <div class="form-top">
                            <div class="form-top-left">
                              <h3>Log in Korme</h3>
                                <p>Enter your username and password to log on:</p>
                            </div>
                            <div class="form-top-right">
                              <i class="fa fa-lock"></i>
                            </div>
                            </div>
                            <div class="form-bottom">
                          <form action="register.php" method="post" >
                            <?php include "errors.php" ?>
                            <div class="form-group">
                              <input type="text" name="email" value="<?php echo $email; ?>" placeholder="E-mail..."class="form-password form-control" >
                            </div>
                            <div class="form-group">
                              <label class="sr-only" >Phone Number</label>
                                <input type="text" name="phone" value="<?php echo $phone; ?>" placeholder="Phone..." class="form-username form-control">
                              </div>
                              <div class="form-group">
                              <label class="sr-only" >Username</label>
                                <input type="text" name="username" placeholder="Username..." class="form-username form-control" >
                              </div>
                              <div class="form-group">
                                <label class="sr-only" >Password</label>
                                <input type="password" name="password_1" placeholder="Password..." class="form-password form-control" >
                              </div>
                                    <div class="form-group">
                                        <label class="sr-only" >Confirm Password</label>
                                        <input type="password" name="password_2" placeholder="Password..." class="form-password form-control">
                                    </div>
                              <button type="submit" class="btn" name="reg_user1">Sign in!</button>
                              <div class="form-top-left">
                                <p>
      Already a member? <a href="login.php">Sign in</a>
    </p>
                            </div>
                          </form>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                          <h3>...or login with:</h3>
                          <div class="social-login-buttons">
                            <a class="btn btn-link-2" href="#">
                              <i class="fa fa-facebook"></i> Facebook
                            </a>
                            <a class="btn btn-link-2" href="#">
                              <i class="fa fa-twitter"></i> Twitter
                            </a>
                            <a class="btn btn-link-2" href="#">
                              <i class="fa fa-google-plus"></i> Google Plus
                            </a>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
</body>
</html>