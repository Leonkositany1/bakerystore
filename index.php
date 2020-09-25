<?php
session_start();
include("connect.php");
    if(isset($_POST['submit'])){

      $email =$_POST['email'];
      $password =$_POST['password'];
      $con_password =$_POST['con_password'];
      $error = '';
      $msg = '';

      if($password !==$con_password){
          global $error;
          $error .= "password do not match";
      }

      
      function isValidEmail($email){ 
        global $error;
          $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i"; 
      
          if (!preg_match( $pattern,$email)){
              global $error;
              $error .="Invalid email";
          } 
            
        } 
        
        isValidEmail($email);

        if(strlen($password) <8){
            global $error;
            $error .= "password should be atleast 8 characters";
        } 

      if(empty($error)){

        $check_email = mysqli_query($dbconnect,"SELECT email FROM `users` WHERE `email` = '$email'");
        if (mysqli_num_rows($check_email) > 0) {
            global $error;
            $error .= "Email already exists";
        }

        if(empty($error)){
          $e_password = sha1($password);
          $insert = mysqli_query($dbconnect,"INSERT INTO `users` (`email`,`password`) VALUES ('$email','$e_password')");
          if($insert){
              global $msg;
              $msg .="Account created";
              $_SESSION['email'] = $email;
              header("location:first.php");
          }else{
              global $error;
              $error .= "Unable to create account";
          }
        }
      }
    }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Eatery Bakers</title>
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="admin/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="admin/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="admin/assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body class="bg-default">
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Welcome!</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Sign up</small>
              </div>
              <form role="form" action="index.php" method="post">
              <?php
                if(!empty($error)){?>
                  <div class="alert alert-danger alert-dismissible col-md-12">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error!</strong> <?php echo $error ?>
                  </div>
              <?php } ?>
              <?php
                if(!empty($msg)){?>
                  <div class="alert alert-success alert-dismissible col-md-12">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> <?php echo $msg ?>
                  </div>
              <?php } ?>
                <div class="form-group mb-4">
                  <div class="input-group input-group-merge input-group-alternative">
                    <input class="form-control" placeholder="Email" type="email" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <input class="form-control" placeholder="Password" type="password" name="password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <input class="form-control" placeholder="Confirm Password" type="password" name="con_password">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4" name="submit">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="login.php" class="text-light"><small>Login to your account?</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2020
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src="admin/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="admin/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="admin/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="admin/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="admin/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="admin/assets/js/argon.js?v=1.2.0"></script>
</body>

</html>