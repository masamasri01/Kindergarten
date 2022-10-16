<?php

// Connect to database
$conn = mysqli_connect("localhost","root","","kinderhome");
$sql = "SELECT * FROM mom";
$all_mom = mysqli_query($conn,$sql);

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
    <title>Staff |Kinder Home</title>
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
    <script src="staff_m.js"></script>
    <style>
        h5:hover {
            color: #99999f;
        }
    </style>
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
                <a href="staff_mm.php" class="nav-link">Staff</a>
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
                            <h2>Staff</h2>
                            <button class="p-3 btn border-0 btn-secondary text-center" data-bs-toggle="modal"
                                    data-bs-target="#addChild"><i class="fas fa-plus"
                                                                  style="width: 20px;height: 20px;"></i></button>
                        </div>
                        <?php
                     //   $conn = mysqli_connect("localhost", "root", "", "kinderhome");
                        $sql = "Select * from staff ";
                        $res = mysqli_query($conn, $sql);
                        $i = 0;
                        if (mysqli_num_rows($res)) {
                            while ($images = mysqli_fetch_assoc($res)) {

                                $name = $images['fname'] . " " . $images['lname'];
                                $id = $images['id'];
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


                    <div class="tab-content col-md-9 col-sm-8" id="v-pills-tabContent" style="position: relative; ">
                        <div class="tab-pane fade show active" id="v-pills-room1" role="tabpanel"
                             aria-labelledby="v-pills-room1-tab">
                            <!-- start room  content -->
                            <div class="d-flex justify-content-between align-items-center py-2  border-bottom">
                                <h5 class="modal-title">Edit Staff <span id="s1">-select from left menu- </span> Info</h5>

                            </div>
                            <div class="modal-body">
                                <form action="edit_staff.php" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="fname" class="form-label">First Name *</label>
                                        <input name="firstname" type="text" class="form-control" id="fname"
                                               placeholder="Enter First Name ...">
                                    </div>
                                    <div class="mb-3">
                                        <label for="lname" class="form-label">Last Name *</label>
                                        <input name="lastname" type="text" class="form-control" id="lname"
                                               placeholder="Enter Last Name ...">
                                    </div>
                                    <input type="hidden" id="theId" name="theId">
                                    <select name="room_name" class="form-select mb-3" aria-label="Default select example">
                                        <option value="1">ABC</option>
                                        <option value="2">Discovery Education</option>
                                        <option value="3">First Steps</option>
                                        <option value="4">Mama's home</option>
                                        <option value="5">Science Scholars</option>
                                        <option value="6">Sports</option>
                                    </select>
                                    <div class="input-group mb-3">
                                        <input type="file" name="img" class="form-control" id="inputGroupFile022" required
                                               accept="image/*">

                                        <label class="input-group-text" for="inputGroupFile022">Upload Profile Picture</label>
                                    </div>
                                    <div class="border p-2">
                                        <p>Permissions</p>
                                        <div class="form-check form-switch">
                                            <label class="form-check-label" for="flexSwitchCheckDefault1"> Admin </label>
                                            <input class="form-check-input position-relative float-end" type="checkbox"
                                                   role="switch" id="flexSwitchCheckDefault1">
                                        </div>
                                        <div class="form-check form-switch">
                                            <label class="form-check-label" for="flexSwitchCheckChecked11">Can reply to
                                                messages</label>
                                            <input class="form-check-input position-relative float-end" type="checkbox"
                                                   role="switch" id="flexSwitchCheckChecked11" checked>
                                        </div>
                                        <div class="form-check form-switch">
                                            <label class="form-check-label" for="flexSwitchCheckChecked22">Requires feed
                                                approval</label>
                                            <input class="form-check-input position-relative float-end" type="checkbox"
                                                   role="switch" id="flexSwitchCheckChecked22" checked>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button name="submit" type="submit" class="btn  float-end "
                                                style="background-color: #f7cac9">Edit Staff Info
                                        </button>
                                    </div>
                                    <div class="mt-2">
                                        <button name="delete" type="submit" class="btn  float-end "
                                                style="background-color: #f7cac9; margin:0 7px;">Delete Staff:<span id="s">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->


<!-- Modal new activity ++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- Modal new activity -->
<div class="modal newActivity fade" id="addChild" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">New Staff Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="staff.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="formGroupExampleInput1" class="form-label">First Name *</label>
                        <input name="firstname" type="text" class="form-control" id="formGroupExampleInput1"
                               placeholder="Enter First Name ...">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Last Name *</label>
                        <input name="lastname" type="text" class="form-control" id="formGroupExampleInput2"
                               placeholder="Enter Last Name ...">
                    </div>
                    <select name="room_name" class="form-select mb-3" aria-label="Default select example">
                        <option value="1">ABC</option>
                        <option value="2">Discovery Education</option>
                        <option value="3">First Steps</option>
                        <option value="4">Mama's home</option>
                        <option value="5">Science Scholars</option>
                        <option value="6">Sports</option>
                    </select>
                    <label > Staff photo</label>
                    <div class="input-group mb-3">

                        <input type="file" name="img" class="form-control" id="inputGroupFile02" accept="image/*">

                        <label class="input-group-text" for="inputGroupFile02">Upload Profile Picture</label>
                    </div>
                    <div class="border p-2">
                        <p>Permissions</p>
                        <div class="form-check form-switch">
                            <label class="form-check-label" for="flexSwitchCheckDefault"> Admin </label>
                            <input class="form-check-input position-relative float-end" type="checkbox"
                                   role="switch" id="flexSwitchCheckDefault">
                        </div>
                        <div class="form-check form-switch">
                            <label class="form-check-label" for="flexSwitchCheckChecked1">Can reply to
                                messages</label>
                            <input class="form-check-input position-relative float-end" type="checkbox"
                                   role="switch" id="flexSwitchCheckChecked1" checked>
                        </div>
                        <div class="form-check form-switch">
                            <label class="form-check-label" for="flexSwitchCheckChecked2">Requires feed
                                approval</label>
                            <input class="form-check-input position-relative float-end" type="checkbox"
                                   role="switch" id="flexSwitchCheckChecked2" checked>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button name="submit" type="submit" class="btn btn-primary float-end">Append Staff</button>
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
    $(function(){
        $('#children').multiSelect();
    });
</script>
<script>
    $('.navbar .nav-link').removeClass('active')
    $('.staff').addClass('active')
</script>

</body>
</html>