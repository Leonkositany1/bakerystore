<?php
include("session.php");

include("../connect.php");
    if(isset($_POST['submit'])){

      $file = $_FILES["filetoupload"]["tmp_name"];
      $target_dir = "../uploads/";

      $file_array = explode(".", $_FILES["filetoupload"]["name"]);
      $file_ext = end($file_array);
      $new_file_name = md5(microtime(true).mt_rand()) . "." . $file_ext;
      $uploadOk = 1;

      if ($_FILES["filetoupload"]["size"] > 10000000){
        echo "Sorry file too large";
        $uploadOk = 0;
      }



      if($uploadOk != 0){
        if(move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_dir.$new_file_name)){

          $name =mysqli_real_escape_string ($dbconnect,$_POST['name']);
          $price =mysqli_real_escape_string ($dbconnect,$_POST['price']);
          // $created_at =date("Y-m-d H:i:s",time());
          $error = '';
          $msg = '';

          $insert = mysqli_query($dbconnect,"INSERT INTO `products` (`name`,`price`,`img`) VALUES ('$name','$price','$new_file_name')");
          if($insert){
              global $msg;
              $msg .="inserted";
              header("location:products.php");
          }else{
              global $error;
              $error .= "unable to insert";
          }
        }else{
          global $error;
          $error .= "Sorry, there was an error uploading your file";
        }

      }

    }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Eatery Bakers</title>
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/argon.min.css" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand">
          <br>
          <h1>...</h1>
        </a>
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
    
    <div class="header bg-primary pb-6" >
      <div class="container-fluid">
        <div class="header-body">
          <br>
          <br>
          <br>
          <!-- Card stats -->
          <div class="row">
            
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">ADD PRODUCT</h3>
            </div>
            <hr>
            <form  method="post" action="add_product.php" enctype="multipart/form-data">
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
                    <div class="row form-group col-md-12">
                        <div class="row form-group col-md-12"></div>
                            <div class="form-group col-md-6">
                                <label for="title">Title</label>
                                <input type="text" id="title" class="form-control"  name="name" placeholder="Product Title" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="price">Price</label>
                                <input type="number" id="price" class="form-control"  name="price" placeholder="Product Price" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <input type="file" accept="image/x-png,image/gif,image/jpeg" class="custom-file-input custom-file-label" name="filetoupload" required>
                            <!-- <label class="custom-file-label" for="img">Add an image</label> -->
                        </div>
                        <br><br>
                        <div class="form-group col-md-12">
                            <!-- <input type="submit" class="btn btn-primary" name="submit" value="Submit"> -->
                            <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </div>
                </form>
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
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>