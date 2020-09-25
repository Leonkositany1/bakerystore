<?php 
include("session.php");
include("connect.php");

$products = mysqli_query($dbconnect, "select * from products");


?>
<!doctype html>
<html lang="en">
  <head>
    <title>Eatery Colorlib Website Template</title>
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
          <ul class="navbar-nav ml-auto">
            <li class="nav-item cta-btn">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- END header -->
    
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url('img/hero1.jpg');">
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-8 text-center col-sm-12 element-animate">
              <h1>Expert Chefs</h1>
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url('img/2.jpg');">
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-8 text-center col-sm-12 element-animate">
              <h1>Great Taste</h1>
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url('img/hero2.jpg');">
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-8 text-center col-sm-12 element-animate">
              <h1>Delecious Bread</h1>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- END slider -->

    <section class="section element-animate">
      <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center heading-wrap">
              <h2>Our Products</h2>
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
              
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
        <?php while($product=mysqli_fetch_assoc($products)){ global $product ?>
          <div class="col-md-6">
            <div class="blog d-block d-lg-flex">
              <div class="bg-image" style="background-image: url('uploads/<?php echo $product['img'] ?>');"></div>
              <div class="text">
                <h3><?php echo $product['name'] ?></h3>
                <p class="sched-time">
                  <span><span class="fa fa-calendar"></span> <?php echo date("M dS Y", strtotime( $product['created_at']));; ?></span> <br>
                </p>
                <h4>Ksh <?php echo $product['price'] ?></h4>
                <br>
                  <a href="checkout.php?id=<?php echo $product['id'] ?>" class="btn btn-primary btn-sm">Order</a>
              </div>
            </div>
          </div>
         
        <?php } ?>
        </div>
      </div>

    </section> <!-- .section -->

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