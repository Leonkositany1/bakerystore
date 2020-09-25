<?php 
include("session.php");
include("../connect.php");

// $orders = mysqli_query($dbconnect, "SELECT products.name, products.price, products.created_at FROM products INNER JOIN orders ON orders.order_id=products.id");
$orders = mysqli_query($dbconnect, "select * from orders"); 

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Eatery Bakers</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" href="DataTables/datatables.min.css" type="text/css">
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
    
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <br>
          <br>
          <br>
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

              <h3 class="mb-0">Orders</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table id="orders" class="display container" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="name">Product</th>
                    <th scope="col" class="sort" data-sort="name">Price</th>
                    <th scope="col" class="sort" data-sort="name">Location</th>
                    <th scope="col" class="sort" data-sort="name">Phone</th>
                  </tr>
                </thead>
                <tbody>
                <?php while($order=mysqli_fetch_assoc($orders)){ ?>
                  <tr>
                    <td><?php echo $order['name'] ?></td>
                    <td><?php echo $order['product'] ?></td>
                    <td><?php echo $order['price'] ?></td>
                    <td><?php echo $order['location'] ?></td>
                    <td>0<?php echo $order['phone'] ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
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
  <script type="text/javascript" src="DataTables/datatables.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
  <script>
    $(document).ready(function() {
      $('#orders').DataTable();
  } );
  </script>
</body>

</html>