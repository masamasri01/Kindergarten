<?php

// Connect to database
$conn = mysqli_connect("localhost", "root", "", "kinderhome");
$sql = "SELECT * FROM mom";
$all_mom = mysqli_query($conn, $sql);

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
    <title>Chidren | Kinder Home</title>
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
    <script src="room.js"></script>
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
                <a href="room.php" class="nav-link">Rooms</a>
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
                            <h2>Rooms</h2>
                        </div>
                        <!-- start children item  -->


                        <?php
                        $sql = "Select * from room ";
                        $res = mysqli_query($conn, $sql);
                        $i = 0;
                        if (mysqli_num_rows($res)) {
                            while ($images = mysqli_fetch_assoc($res)) {

                                $name = $images['roomname'];
                                $id = $images['roomid'];
                                $i = $i + 1;
                                $s = $images['img_url']; ?>


                                <div id="<?= $i ?>" onclick="f1(this)"
                                     class=" activity-item border p-2 my-2  nav-link active "
                                     data-bs-toggle="pill" data-bs-target="#v-pills-room1" type="button" role="tab"
                                     aria-controls="v-pills-room1" aria-selected="true"
                                     style="background-color: #fafafa">
                                    <div class="item-title  d-flex justify-content-between align-items-center">
                                        <div class="d-flex justify-content-around align-items-center">
                                  <span class="rounded-circle  text-center">
                                        <img src="uploads/<?= $s ?> " alt=""
                                             style="width: 50px;height: 50px;object-fit:cover; border-radius: 100%;">
                                  </span>
                                            <div class="mx-2">
                                                <p id="name1" class="text-black fs-6 fw-bold p-0 my-0"><?= $name ?></p>
                                                <p class="text-muted my-0">No rooms</p>
                                            </div>
                                        </div>
                                        <span>
                                  <i id="btnGroupDrop1" class="fa fa-ellipsis-v p-2  text-black text-black"
                                     data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;"></i>
                                   <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                     <li><a class="dropdown-item" href="#">click to See room info</a></li>
                                   </ul>
                                </span>
                                    </div>
                                </div>
                                <!-- end children item  -->
                                <?php
                            }
                        }
                        ?>

                    </div>     <!-- end children item  -->



                    <div class="tab-content col-md-9 col-sm-8" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-room1" role="tabpanel"
                             aria-labelledby="v-pills-room1-tab">
                            <!-- start room  content -->
                            <div class="d-flex justify-content-between align-items-center py-2  border-bottom">
                                <h2 class="fs-4">Select Room</h2>
                            </div>

                            <form method="post" action="room.php">
                            <ul class="nav nav-pills roomContent mb-3" id="pills-tab" role="tablist">

                                    <input type="hidden" name="theId" id="theId" value="1">
                                <li class="nav-item" role="presentation">
                                    <button name="submit" class="nav-link fw-bold active btn-danger" id="pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-home" type="submit" role="tab"
                                            aria-controls="pills-home" aria-selected="true" style="margin-right: 20px; ">Staff of this Room
                                    </button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button name="submit1"  class="nav-link fw-bold btn-success" id="pills-profile-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-profile" type="button" role="tab"
                                            aria-controls="pills-profile" aria-selected="false">Children of this Room
                                    </button>
                                </li>
                            </ul>
                            </form>

                            <div class="tab-content" id="pills-tabContent">



                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                     aria-labelledby="pills-home-tab">
                                    <div class="container">
                                        <?php
                                          if(isset($_POST['submit'])||isset($_POST['submit1'])){
                                        $sql = "Select * from staff ";
                                        $res = mysqli_query($conn, $sql);
                                        $i = 0;
                                        if (mysqli_num_rows($res)) {
                                            while ($images = mysqli_fetch_assoc($res)) {

                                                $name = $images['fname'] . ' ' . $images['lname'];
                                                $idstaff = $images['id'];
                                                $i = $i + 1;
                                                $s = $images['img_url'];
                                                $room_id = $images['roomid'];


                                                if ($room_id == $_POST['theId']) {
                                                    ?>

                                                    <div class="card" style="width: 18rem;display:inline-block;">
                                                        <img class="card-img-top" src="uploads/<?= $s ?>"
                                                             alt="Card image cap">
                                                        <div class="card-body">
                                                            <h2 class="font-weight-light">.<?= $name ?>.</h2>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        }

                                        ?>
                                    </div>
                                </div>



                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                     aria-labelledby="pills-profile-tab">
                                    <div class="container">
                                        <?php

                                        $sql = "Select * from kids ";
                                        $res = mysqli_query($conn, $sql);
                                        $i = 0;
                                        if (mysqli_num_rows($res)) {
                                            while ($images = mysqli_fetch_assoc($res)) {

                                                $name = $images['fname'] . ' ' . $images['lname'];
                                                $idstaff = $images['kidid'];
                                                $i = $i + 1;
                                                $s = $images['img_url'];
                                                $room_id = $images['roomid'];


                                                if ($room_id == $_POST['theId']) {
                                                    ?>

                                                    <div class="card" style="width: 18rem;display:inline-block;">
                                                        <img class="card-img-top" src="uploads/<?= $s ?>"
                                                             alt="Card image cap">
                                                        <div class="card-body">
                                                            <h2 class="font-weight-light">.<?= $name ?>.</h2>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        }
                                                    }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- end room  content -->
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
    $('.room').addClass('active')
</script>

</body>
</html>