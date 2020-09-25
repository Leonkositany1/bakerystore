<?php 
include("session.php");
include("../connect.php");


$admin = mysqli_query($dbconnect, "select * from admin");
$admin = mysqli_fetch_assoc($admin);

  if(isset($_POST['submit'])){

    $email =$_POST['email'];
    $uname = $_POST['uname'];
    $password = sha1($_POST['password']);
    $con_password = sha1($_POST['con_password']);
    $error = '';
    $msg = '';

    if(strlen($password) <8){
      $error .= "password should be atleast 8 characters";
    } 


    
    $update_admin = mysqli_query($dbconnect, "UPDATE `admin` SET `uname`='$uname', `email`='$email',`password`='$password'");
    if($update_admin){
      global $msg;
      $msg .= "Credentials updated";
      header("location:profile.php");
    }else{
      global $error;
      $error .= "unable to update credentials. Try again...";
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
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <br>
        <h1>...</h1>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="products.php">
                <i class="fa fa-shopping-basket text-primary"></i>
                <span class="nav-link-text">Products</span>
              </a>
              <br>
              <a class="nav-link active" href="queries.php">
                <i class="fa fa-info-circle text-primary"></i>
                <span class="nav-link-text">Queries</span>
              </a>
              <br>
              <a class="nav-link active" href="orders.php">
                <i class="fa fa-shopping-cart text-primary"></i>
                <span class="nav-link-text">Orders</span>
              </a>
              <br>
              <a class="nav-link active" href="profile.php">
                <i class="fa fa-user text-primary"></i>
                <span class="nav-link-text">Profile</span>
              </a>
              <br>
              <a class="nav-link active" href="users.php">
                <i class="fa fa-users text-primary"></i>
                <span class="nav-link-text">Users</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-6 text-white">Hello, <?php echo $admin['uname'] ?></h1>
            <p class="text-white mt-0 mb-8">This is your profile page. You can edit your credentials here</p>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit profile </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form role="form" action="profile.php" method="post">
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
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control" name="uname" placeholder="New Username" value="<?php echo $admin['uname'] ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control" name="email" placeholder="jesse@example.com" value="<?php echo $admin['email'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Password</label>
                        <input type="password" id="input-first-name" name="password" class="form-control" placeholder="Enter new password">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Re-Type Password</label>
                        <input type="password" id="input-last-name" name="con_password" class="form-control" placeholder="Confirm your password">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h3 class="mb-0"></h3>
                    </div>
                    <div class="col-4 text-right">
                      <button type="submit" name="submit" class="btn btn-sm btn-primary">Edit Credentials</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <br>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>