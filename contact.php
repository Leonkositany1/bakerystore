<?php
include("session.php");
include("connect.php");
    if(isset($_POST['submit'])){

      $name =mysqli_real_escape_string ($dbconnect,$_POST['name']);
      $phone =mysqli_real_escape_string ($dbconnect,$_POST['phone']);
      $email =mysqli_real_escape_string ($dbconnect,$_POST['email']);
      $message =mysqli_real_escape_string ($dbconnect,$_POST['message']);
      // $created_at =date("Y-m-d H:i:s",time());
      $error = '';
      $msg = '';

      function isValidEmail($email){ 
        global $error;
          $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i"; 
      
          if (!preg_match( $pattern,$email)){
              $error .="Invalid email";
          } 
            
       } 
       
       isValidEmail($email);

      if(empty($error)){
        $insert = mysqli_query($dbconnect,"INSERT INTO `queries` (`name`,`phone`,`email`,`message`) VALUES ('$name','$phone','$email','$message')");
        if($insert){
            global $msg;
            $msg .="Message sent";
        }else{
            global $error;
            $error .= "Unable to send message";
        }
      }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Eatery Bakers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="css/magnific-popup.css">


    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticons/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <header role="banner">
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="first.php">Eatery</a>
          </div>
        </div>
      </nav>
    </header>
    <!-- END header -->
    
    <section class="home-slider-loop-false  inner-page owl-carousel">
      <div class="slider-item" style="background-image: url('img/5.jpg');">
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-8 text-center col-sm-12 element-animate">
              <h1>Contact Us</h1>
            </div>
          </div>
        </div>
      </div>

    </section>


    <section class="section element-animate">
      <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center heading-wrap">
              <h2>Get In Touch</h2>
              <span class="back-text">Contact Form</span>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <form action="contact.php" method="post">
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
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="name">Name</label>
                  <input type="text" id="name" class="form-control " name="name" required>
                </div>
                <div class="col-md-6 form-group">
                  <label for="phone">Phone</label>
                  <input type="text" id="phone" class="form-control " name="phone" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" class="form-control " name="email">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="message">Write Message</label>
                  <textarea name="message" id="message" class="form-control " cols="30" rows="8" required></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit" value="Send Message" class="btn btn-primary" name="submit">
                </div>
              </div>
            </form>
          </div>
          
          <div class="col-lg-6 pl-2 pl-lg-5">

            <div class="col-md-8 mx-auto contact-form-contact-info">
              <h4 class="mb-5">Contact Details</h4>
                <p class="d-flex">
                  <span class="ion-ios-location icon mr-5"></span>
                  <span>34 Street Name, City Name Here, United States</span>
                </p>

                <p class="d-flex">
                  <span class="ion-ios-telephone icon mr-5"></span>
                  <span>+1 242 4942 290</span>
                </p>

                <p class="d-flex">
                  <span class="ion-android-mail icon mr-5"></span>
                  <span>eaterybakers@gmail.com</span>
                </p>
              </div>

          </div>
        </div>
      </div>

    </section>
    

    <footer class="site-footer" role="contentinfo">
      <div class="container">
        <div class="row">
          <div class="col-12 text-md-center text-left">
            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- END footer -->

    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#cf1d16"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>

    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    

    <script src="js/main.js"></script>
  </body>
</html>