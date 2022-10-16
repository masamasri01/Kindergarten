<?php

// Connect to database
$con = mysqli_connect("localhost","root","","kinderhome");
$sql = "SELECT * FROM kids";
$all_kids = mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">
    <meta name="description" content="this is description">
    <meta name="keywords" content="keyword">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <title>Observation  | Kinder Home</title>
        <!-- import select  -->
        <link rel="stylesheet" href="assets/css/select2.min.css">
    <!-- import font awesome icon -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- import bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- import style  -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- import style responsive -->
    <link rel="stylesheet" href="assets/css/style_responsive.css">
    <link rel="stylesheet" href="assets/css/adminlte.min.css">
</head>
<body>

      <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="index.php" class="nav-link">new activity </a>
            </li>
          </ul>
      
        </nav>
        <!-- /.navbar -->
      
        <!-- start Main Sidebar Container -->
        <?php
        include('./navbar.php')
        ?>
        <!-- end  Main Sidebar Container -->
        
        
      
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-white">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Learning and Development</h1>
                </div><!-- /.col -->

              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
      
          <!-- Main content -->
          <section class="content">
            <!-- start profile  -->
            <div class="container mb-3">

              <form action="general.php" class="row" method="post" enctype="multipart/form-data">

                  <div class="card">
                      <div class="card-body">

                      <label for="current_date" >Activity's Date</label>
                  <input name="date" type="text" id="current_date" class="container-fluid">
                      <script>
                          document.getElementById("current_date").value = Date();
                      </script>
            </div>
                  </div>
                  <div class="card">
                      <div class="card-body">


                          <div class="col-12 mb-3">
                              <label for="children:">Children</label>
                              <?php
                              while ($kid = mysqli_fetch_array(
                                  $all_kids, MYSQLI_ASSOC)):;
                                  ?>
                                  <div class="form-check" id="children">
                                      <input name="children[]" class="form-check-input" type="checkbox" value="<?php echo $kid["kidid"];
                                      // The value we usually set is the primary key
                                      ?>"
                                             id="<?php echo $kid["kidid"];  ?>">
                                      <label class="" for="<?php echo $kid["kidid"];
                                      ?>">
                                          <?php echo $kid["fname"] . " " . $kid["lname"]; ?>
                                      </label>
                                  </div>
                              <?php
                              endwhile;
                              // While loop must be terminated
                              ?>

                          </div>
                      </div>
                  </div>
                <div class="col-12 mb-3">
                  <label for="children">Description</label>
                  <textarea class="form-control" name="desc" id="children" cols="30" rows="6"></textarea>
                </div>
                <div class="input-group mb-3">
                    <label> Upload photo of the Activity</label>
                  <input type="file" name="img" class="form-control" id="inputGroupFile02">
                  <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
                <div class="mt-2">
                  <button name="submit" type="submit" class="btn btn-primary float-end">Submit Observation</button>
                </div>
              </form>
            </div>
            <!-- end profile  -->
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
      </div>
      <!-- ./wrapper -->







    <!-- import popper js -->
    <script src="assets/js/popper.min.js"></script>
    <!-- import jquery js -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <!-- import bootstrap js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- import admin js  -->
    <script src="assets/js/adminlte.js"></script>
        <!-- import select  -->
        <script src="assets/js/select2.full.min.js"></script>
    <!-- import main js -->
    <script src="assets/js/main.js"></script>
    <script>
        $('.navbar .nav-link').removeClass('active')
        $('.activity').addClass('active')
    </script>
     <script>
        $(function() {
            $('.select2').select2()
        });
    </script>
    
</body>
</html>