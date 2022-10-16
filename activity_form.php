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
                <a href="index.php" class="nav-link">New Observation</a>
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
                        <h1 class="m-0">New Observation</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-primary d-block ms-auto" >Save Draft</button>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <!-- start profile  -->
            <div class="container mb-3">
                <form action="#" class="row" method="post">
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="New Observation">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="date" class="form-control" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <select class="form-select mb-3" aria-label="Default select example">
                            <option disabled value="">select Author </option>
                            <option value="1">Author 1</option>
                            <option value="2">Author 2</option>
                            <option value="3">Author 3</option>
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="children">Children</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                child 1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                child 2
                            </label>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="children">Description</label>
                        <textarea class="form-control" name="" id="" cols="30" rows="6"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary float-end">add</button>
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
<!-- import main js -->
<script src="assets/js/main.js"></script>
<script>
    $('.navbar .nav-link').removeClass('active')
    $('.home').addClass('active')
</script>

</body>
</html>