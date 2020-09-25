<?php
include("session.php");
include("connect.php");
$id = $_GET['id'];

if(isset($id)){
    $select_product = mysqli_query($dbconnect, "SELECT * FROM `products` WHERE `id` = '$id'");
    if(mysqli_num_rows($select_product) == 1){
        $products = mysqli_fetch_assoc($select_product);
        // print_r($products);
        // return;
    }
 }else{
   header("location:first.php");
 }

if(isset($_POST['submit'])){
  $product_id =mysqli_real_escape_string ($dbconnect,$_POST['product_id']);
  $name =mysqli_real_escape_string ($dbconnect,$_POST['name']);
  $phone =mysqli_real_escape_string ($dbconnect,$_POST['phone']);
  $location =mysqli_real_escape_string ($dbconnect,$_POST['location']);
  $price =mysqli_real_escape_string ($dbconnect,$_POST['price']);
  $product =mysqli_real_escape_string ($dbconnect,$_POST['product']);
  
  $insert = mysqli_query($dbconnect,"INSERT INTO `orders` (`product_id`,`name`,`phone`,`location`,`price`,`product`) VALUES ('$product_id','$name','$phone','$location','$price','$product')");
  if($insert){
    global $msg;
    $msg .="inserted";
    header("location:first.php");
    }else{
        global $error;
        $error .= "unable to insert";
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
              <h1>Check Out</h1>
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
              <h2>Check Out</h2>
              <span class="back-text">Check Out</span>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <form action="checkout.php" method="post">
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
              
                <div class="row col-md-12">
                    <div class="col-md-6 form-group">
                        <div class="bg-image">
                            <img src="img/2.jpg" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <div class="col-md-12 form-group">
                            <input type="text" id="name" class="form-control " name="name" required placeholder="Your name">
                        </div>
                        <br>
                        <div class="col-md-12 form-group">
                            <input type="number" id="phone" class="form-control " name="phone" required placeholder="Your phone number">
                        </div>
                        <br>
                        <div class="col-md-12 form-group">
                            <input type="text" id="address" class="form-control" name="location" required placeholder="Your location">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="hidden" class="form-control" name="price" value="<?php echo $products['price'] ?>" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="hidden" class="form-control" name="product" value="<?php echo $products['name'] ?>" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="hidden" class="form-control" name="product_id" value="<?php echo $products['id'] ?>" required>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="submit" value="Order Product" class="btn btn-primary" name="submit">
                        </div>
                    </div>
                </div>
            </form>
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