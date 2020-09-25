<?php 
include("session.php");
include("../connect.php");

$Queries = mysqli_query($dbconnect, "select * from Queries");

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

              <h3 class="mb-0">Queries</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table id="queries" class="display container" style="width:100%">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="budget">Phone</th>
                    <th scope="col" class="sort" data-sort="status">Time</th>
                    <th scope="col" class="sort" data-sort="status">Message</th>
                  </tr>
                </thead>
                <tbody class="list">
                <?php while($contact=mysqli_fetch_assoc($Queries)){ ?>
                  <tr>
                    <td><?php echo $contact['name'] ?></td>
                    <td>+254 <?php echo $contact['phone'] ?></td>
                    <td> <?php echo date("M dS Y |  H:i", strtotime( $contact['time']));; ?></td>
                    <td><?php echo $contact['message'] ?></td>
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
      $('#queries').DataTable();
  } );
  </script>
</body>

</html>