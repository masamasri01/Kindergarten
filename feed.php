<?php
$con = mysqli_connect("localhost", "root", "", "kinderhome");

$sql = "SELECT * FROM general";
$all_general = mysqli_query($con, $sql);

$sql3="select * from food";
$all_food=mysqli_query($con, $sql3);

$sql4="select * from nap";
$all_nap=mysqli_query($con, $sql4);

$sql5="select * from acident";
$all_accident=mysqli_query($con, $sql5);


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
    <title>Feed | Kinder Home</title>
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
                <a href="feed.html" class="nav-link">Feed</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <button type="button" class="btn  btn-primary mr-1">Filter</button>
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


    <!-- Main content -->
    <section class="content">
        <!-- start profile  -->
        <div class="container py-3">
            <div class="row justify-content-center">


                <!--                  food+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php

                while ($activity = mysqli_fetch_array(
                    $all_food, MYSQLI_ASSOC)):
                $ac_id = $activity['activity_id'];
                $descrip = $activity['descrip'];
                $img_url = $activity['img_url'];
                $date = $activity['date'];


                ?>

                <div class="col-lg-7 my-3 border border-1 col-md-12">
                    <div class="border-1 border-bottom d-flex align-items-center justify-content-between p-2">
                        <div class="d-flex align-items-center">
                          <span class="bg-success me-3 d-flex justify-content-center align-items-center rounded-circle"
                                style="width: 40px;height:40px;">
                            <i class=" fab fa-apple fa-2x"></i>
                          </span>
                            <div>
                                <h5>Food </h5>
                                <p class="text-muted">
                                    Created by Admin on <?php echo $date; ?>
                                </p>
                            </div>
                        </div>
                        <span>
                          <i id="btnGroupDrop1" class="fa fa-ellipsis-v" data-bs-toggle="dropdown" aria-expanded="false"
                             style="cursor: pointer;"></i>
                          <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <li><a class="dropdown-item" href="#">EDIT</a></li>
                            <li><a class="dropdown-item" href="#">DELETE</a></li>
                          </ul>
                        </span>
                     </div>
                     <div class="p-2">
                         <p class="text-muted"><?= $descrip?></p>

                            <?php
                            $sql22 = "SELECT * FROM food1 ";
                            $all_food22 = mysqli_query($con, $sql22);
                            while ($kids = mysqli_fetch_array(
                                $all_food22, MYSQLI_ASSOC)):
                            $ac_id1 = $kids['activity_id'];
                            $kidid= $kids['kidid'];
                            $amount=$kids['amount'];
                            if($ac_id==$ac_id1){
                            $q="select * from kids where kidid='$kidid'";
                            $all_kids = mysqli_query($con,$q);

                            while ($kid = mysqli_fetch_array(
                                $all_kids,MYSQLI_ASSOC)):

                            ?>
                                <div class="d-flex align-items-center justify-content-between p-2">
                            <div class="d-flex align-items-center">
                                <div style="width:50px;">
                                    <img src="uploads/<?= $kid['img_url'] ?>"  class="img-fluid rounded-circle" alt="">
                                </div>
                                <p  class=" mb-0 text-success pl-3"><?= $kid['fname'].' '.$kid['lname']?></p>
                            </div>

                            <!-- empty -->
                                    <?php
                                    if ($amount=='1'){
                                    ?>
                                    <div>
                                        amount consumed by <?php  echo $kid['fname']?> :                                        <span class="bg-danger d-inline-block rounded-circle"
                                              style="width: 30px;height:30px;border-bottom:15px solid #FFF;border-left:15px solid #FFF"></span>  </div>                                      <?php }?>
                                    <?php
                                    if ($amount=='2'){
                                        ?>
                                    <div>
                                        amount consumed by <?php  echo $kid['fname']?> :
                                        <span class="rounded-circle d-inline-block"
                                              style="width: 30px;height:30px;border-right:15px solid #8c68ce;"></span></div>
                                    <?php }?>
                                    <?php
                                    if ($amount=='3'){
                                        ?>
                                    <div>
                                        amount consumed by <?php  echo $kid['fname']?> :                                        <span class="rounded-circle d-inline-block"
                                              style="width: 30px;height:30px;border-bottom:15px solid  #34ce57;border-right:15px solid #34ce57;"></span></div>
                                    <?php }?>
                                    <?php
                                    if ($amount=='4'){
                                        ?>
                                            <div>
                                                amount consumed by <?php  echo $kid['fname']?> :                                        <span class="border border-1 d-inline-block rounded-circle bg-blue"
                                              style="width: 30px;height:30px;"></span> </div>                                  <?php }?>
                        </div>
                        <?php
                            endwhile;}
                              endwhile;

                            ?>

                         <img src= "uploads/<?= $img_url ?> " style="" class="img-fluid" alt="">

                    </div>
                </div>
                <?php
                endwhile;
                ?>
                <!--        nap    +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                <?php

                while ($activity = mysqli_fetch_array(
                    $all_nap, MYSQLI_ASSOC)):
                $ac_id = $activity['activity_id'];
                $descrip = $activity['descrip'];
                $img_url = $activity['img_url'];
                $date = $activity['date'];
                $start=$activity['starttime'];
                    $end=$activity['endtime'];
                    $kidid=$activity['kidid'];
                $q="select * from kids where kidid='$kidid'";
                $all_kids = mysqli_query($con,$q);

                while ($kid = mysqli_fetch_array(
                    $all_kids,MYSQLI_ASSOC)):


                ?>
                <div class="col-lg-7 my-3 border border-1 col-md-12">
                    <div class="border-1 border-bottom d-flex align-items-center justify-content-between p-2">
                        <div class="d-flex align-items-center">
                          <span class="bg-yellow me-3 d-flex justify-content-center align-items-center rounded-circle"
                                style="width: 40px;height:40px;">
                            <i class="white fa fa-child fa-2x "></i>
                          </span>
                            <div>
                                <h5>Nap</h5>
                                <p class="text-muted">
                                    Created by Admin on date  <?php echo $date; ?>
                                </p>
                            </div>
                        </div>
                        <span>
                          <i id="btnGroupDrop1" class="fa fa-ellipsis-v" data-bs-toggle="dropdown" aria-expanded="false"
                             style="cursor: pointer;"></i>
                          <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <li><a class="dropdown-item" href="#">EDIT</a></li>
                            <li><a class="dropdown-item" href="#">DELETE</a></li>
                          </ul>
                        </span>
                    </div>
                    <div class="p-2">
                        <p class="text-muted"><?php echo $descrip ?></p>

                        <div class="d-flex align-items-center justify-content-between p-2">
                            <div class=" d-flex align-items-center justify-content-between p-2">
                                <div class="d-flex align-items-center">
                                    <div class="border-3 border-primary" style="width:50px;">
                                        <img  src= "uploads/<?= $kid['img_url'] ?> " class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <p  class="text-yellow mb-0  pl-3"><?= $kid['fname'].' '.$kid['lname']?> </p>
                                </div>
                            </div>
                            <div class>
                            <span class="bg-secondary rounded-pill row  px-3">
                         Start time: <?php echo $start ?>
                        </span>
                            <span class="bg-secondary rounded-pill row mt-2  px-3">
                          End time:<?php echo $end ?>
                        </span>
                            </div>
                        </div>
                        <img src= "uploads/<?= $img_url ?> " style="" class="img-fluid" alt="">
                    </div>
                </div>
                <?php
                endwhile;
                endwhile;
                        ?>

                <!--         accident         +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                <?php

                while ($activity = mysqli_fetch_array(
                    $all_accident, MYSQLI_ASSOC)):
                $ac_id = $activity['activity_id'];
                $descrip = $activity['descrip'];
                $img_url = $activity['img_url'];
                $date = $activity['date'];
                $time=$activity['time'];
                $type=$activity['type'];
                $kidid=$activity['kidid'];
                $q="select * from kids where kidid='$kidid'";
                $all_kids = mysqli_query($con,$q);

                while ($kid = mysqli_fetch_array(
                    $all_kids,MYSQLI_ASSOC)):


                ?>
                <div class="col-lg-7 my-3 border border-1 col-md-12">
                    <div class="border-1 border-bottom d-flex align-items-center justify-content-between p-2">
                        <div class="d-flex align-items-center">
                          <span class="bg-danger me-3 d-flex justify-content-center align-items-center rounded-circle"
                                style="width: 40px;height:40px;">
                            <i class="fa fa-car-crash fa-2x p-2"></i>
                          </span>
                            <div>
                                <h5>Incident / Accident</h5>
                                <p class="text-muted">
                                    Created by Admin. Accident occured on <?= $date ?> __<?= $time?>
                                </p>
                            </div>
                        </div>
                        <span>
                          <i id="btnGroupDrop1" class="fa fa-ellipsis-v" data-bs-toggle="dropdown" aria-expanded="false"
                             style="cursor: pointer;"></i>
                          <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <li><a class="dropdown-item" href="#">EDIT</a></li>
                            <li><a class="dropdown-item" href="#">DELETE</a></li>
                          </ul>
                        </span>
                    </div>
                    <div class="p-2">
                        <p class="text-muted"><?php ECHO $descrip?></p>

                            <div class=" d-flex align-items-center justify-content-between p-2">
                                <div class="d-flex align-items-center">
                                    <div class="border-3 border-primary" style="width:50px;">
                                        <img  src= "uploads/<?= $kid['img_url'] ?> " class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <p  class=" mb-0 text-danger pl-3"><?= $kid['fname'].' '.$kid['lname']?> </p>
                                </div>


                            <span class="bg-secondary rounded-pill px-2">
                                <?php
                                if ($type=='1') echo 'FALL';
                                else if($type=='2') echo 'TRIP';
                                else if($type=='3') echo 'BURN';
                                else if($type=='4') echo 'UNKNOWN!';


                                ?>

                        </span>
                    </div>
                        <img src= "uploads/<?= $img_url ?> " style="" class="img-fluid" alt="">                    </div>
                </div>

                <?php
                endwhile;
                endwhile;
                ?>
                <!--                  general+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php

                while ($activity = mysqli_fetch_array(
                    $all_general, MYSQLI_ASSOC)):
                    $ac_id = $activity['activity_id'];
                    $descrip = $activity['descrip'];
                    $img_url = $activity['img_url'];
                    $date = $activity['date'];


                   ?>
                    <div class="col-lg-7 my-3 border border-1 col-md-12">
                        <div class="border-1 border-bottom d-flex align-items-center justify-content-between p-2">
                            <div class="d-flex align-items-center">
                          <span class="bg-primary me-3 d-flex justify-content-center align-items-center rounded-circle"
                                style="width: 40px;height:40px;">
                            <i class="fa fa-box fa-2x p-2"></i>
                          </span>
                                <div>
                                    <h5>General</h5>
                                    <p class="text-muted">
                                        Created by Admin <?= $date?>
                                    </p>
                                </div>
                            </div>
                            <span>
                          <i id="btnGroupDrop1" class="fa fa-ellipsis-v" data-bs-toggle="dropdown" aria-expanded="false"
                             style="cursor: pointer;"></i>
                          <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <li><a class="dropdown-item" href="#">EDIT</a></li>
                            <li><a class="dropdown-item" href="#">DELETE</a></li>
                          </ul>
                        </span>

                        </div>


                            <div class="p-2">

                                <?php
                                $sql2 = "SELECT * FROM general1 ";
                                $all_general2 = mysqli_query($con, $sql2);
                                while ($kids = mysqli_fetch_array(
                                    $all_general2, MYSQLI_ASSOC)):
                                $ac_id1 = $kids['activity_id'];
                                $kidid= $kids['kidid'];
                               if($ac_id==$ac_id1){
                                $q="select * from kids where kidid='$kidid'";
                                    $all_kids = mysqli_query($con,$q);

                                    while ($kid = mysqli_fetch_array(
                                    $all_kids,MYSQLI_ASSOC)):;

                                    ?>


                                <div class=" d-flex align-items-center justify-content-between p-2">
                                    <div class="d-flex align-items-center">
                                        <div class="border-3 border-primary" style="width:50px;">
                                            <img  src= "uploads/<?= $kid['img_url'] ?> " class="img-fluid rounded-circle" alt="">
                                        </div>
                                        <p  class=" mb-0 text-primary pl-3"><?= $kid['fname'].' '.$kid['lname']?> </p>
                                    </div>
                                </div>
                                <?php
                                    endwhile;}

                                endwhile;

                                ?>

                                <p class="text-muted"><?= $descrip?></p>
                                <img src= "uploads/<?= $img_url ?> " style="" class="img-fluid" alt="">

                            </div>
                    </div>
                <?php
               endwhile;

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
    $('.feed').addClass('active')
</script>
</body>
</html>