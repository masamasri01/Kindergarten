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
    <title>Children |Kinder Home</title>
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
                <a href="children.html" class="nav-link">Mom</a>
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

        <!-- Main content -->
        <section class="content">
            <!-- start profile  -->
            <div class="container">
                <div class="row">
                    <div class="nav flex-column border-end nav-pills col-md-3 col-sm-4" id="v-pills-tab" role="tablist"
                         aria-orientation="vertical">
                        <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                            <h2>Moms</h2>
                            <button class="p-3 btn border-0 btn-secondary text-center" data-bs-toggle="modal"
                                    data-bs-target="#addChild"><i class="fas fa-plus"
                                                                  style="width: 20px;height: 20px;"></i></button>
                        </div>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "kinderhome");
                        $sql = "Select * from mom ";
                        $res = mysqli_query($conn, $sql);
                        $i = 0;
                        if (mysqli_num_rows($res)) {
                            while ($images = mysqli_fetch_assoc($res)) {

                                $name = $images['fname'] . " " . $images['lname'];
                                $id = $images['momid'];
                                $i = $i + 1;
                                $s = $images['img_url']; ?>

                                <div id="<?= $i ?>" onclick="f1(this,<?= $id ?>)"
                                     class="  d-flex justify-content-between align-items-center py-3 border-bottom view ">

                                    <img style="width: 70px; height:70px; border-radius: 100%;margin-right: 15px;"
                                         src="uploads/<?= $s ?> ">
                                    <h5>   <?= $name ?></h5>
                                </div>
                                <?php
                            }
                        }
                        ?>

                    </div>



                </div>
                <!-- end profile  -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->


<!-- Modal new activity -->
<div class="modal addChildren fade" id="addChild" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Register a Mom</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="addmom.php" method="post"  enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">First Name *</label>
                        <input type="text" name="firstname" class="form-control" id="formGroupExampleInput"
                               placeholder="Enter First Name ...">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Last Name *</label>
                        <input type="text" name="lastname" class="form-control" id="formGroupExampleInput"
                               placeholder="Enter Last Name ...">
                    </div>

                    <label for="inputGroupFile02">Photo</label>
                    <div class="input-group mb-3">
                        <input type="file" name="img" class="form-control" id="inputGroupFile02" required>
                        <label class="input-group-text" for="inputGroupFile02">Upload Profile Picture</label>
                    </div>
                    <div class="mt-2">
                        <button type="submit" name="submit" class="btn btn-primary float-end">Register Mom</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
<!-- //multi select in staff -->
<script src="assets/js/jquery.multi-select.min.js"></script>
<script>
    $(function () {
        $('#children').multiSelect();
    });
</script>
<script>
    $(function () {
        $('.select2').select2()
    });
</script>
<script>
    $('.navbar .nav-link').removeClass('active')
    $('.mom').addClass('active')
</script>

</body>
</html>