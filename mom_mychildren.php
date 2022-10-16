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
    <title>Observation  |Kinder Home</title>
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
                <a href="index.php" class="nav-link">My children </a>
            </li>
        </ul>

    </nav>
    <!-- /.navbar -->

    <!-- start Main Sidebar Container -->
    <?php
    include('./mom_navbar.php')
    ?>
    <!-- end  Main Sidebar Container -->



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-white">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Your Lovely Kids: </h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <!-- start profile  -->
            <div class="container mb-3">




                <div id="pills-profile" role="tabpanel"
                     aria-labelledby="pills-profile-tab">
                    <div class="container">

                        <?php

                        $sql = "Select * from kids ";
                        $res = mysqli_query($con, $sql);
                        $i = 0;
                        if (mysqli_num_rows($res)) {
                        while ($images = mysqli_fetch_assoc($res)) {

                        $name = $images['fname'] . ' ' . $images['lname'];
                        $idstaff = $images['kidid'];
                        $i = $i + 1;
                        $s = $images['img_url'];
                        $room_id = $images['roomid'];
                            $sql2 = "SELECT * FROM room";
                            $all_room = mysqli_query($con,$sql2);
                            while ($room = mysqli_fetch_array(
                                $all_room, MYSQLI_ASSOC)):;
                                if ( $room_id==$room['roomid'] ) {
                                    $roomname = $room['roomname'];
                                    break;

                                }
                            endwhile;

                            if($images['momid']==$_GET['id']){


                        ?>

                        <div class="card" style="width: 18rem;display:inline-block;">
                            <img class="card-img-top" src="uploads/<?= $s ?>"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h2 class="font-weight-light">.<?= $name ?>.</h2>
                                <p>is in room <?php echo $roomname?></p>
                            </div>
                        </div>
                        <?php
                        }
                        }}

                        ?>
                    </div>
                </div>
            </div>








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
    $('.mom_navbar .nav-link').removeClass('active')
    $('.room').addClass('active')
</script>
<script>
    $(function() {
        $('.select2').select2()
    });
</script>

</body>
</html>