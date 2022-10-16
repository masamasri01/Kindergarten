<?php

// Connect to database
$con = mysqli_connect("localhost","root","","kinderhome");
$sql = "SELECT * FROM mom";
$all_mom = mysqli_query($con,$sql);

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
                <a href="children.html" class="nav-link">Children</a>
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
                            <h2>Children</h2>
                            <button class="p-3 btn border-0 btn-secondary text-center" data-bs-toggle="modal"
                                    data-bs-target="#addChild"><i class="fas fa-plus"
                                                                  style="width: 20px;height: 20px;"></i></button>
                        </div>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "kinderhome");
                        $sql = "Select * from kids ";
                        $res = mysqli_query($conn, $sql);
                        $i = 0;
                        if (mysqli_num_rows($res)) {
                            while ($images = mysqli_fetch_assoc($res)) {

                                $name = $images['fname'] . " " . $images['lname'];
                                $id = $images['kidid'];
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








                    <!-- Modal add child +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++== -->
                    <div class="modal addChildren fade" id="addChild" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                         aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h5 class="modal-title" id="staticBackdropLabel">Register a child</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="addchild.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">First Name *</label>
                                            <input name="firstname" type="text" class="form-control" id="formGroupExampleInput"
                                                   placeholder="Enter First Name ...">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Last Name *</label>
                                            <input  name="lastname" type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Enter Last Name ...">
                                        </div>
                                        <div class="mb-3">
                                            <label for="roomzz">Assign to Room</label>
                                            <select name="room_name" class="form-select mb-3" id="roomzz"
                                                    aria-label="Default select example">
                                                <option value="1">ABC</option>
                                                <option value="2">Discovery Education</option>
                                                <option value="3">First Steps</option>
                                                <option value="4">Mama's home</option>
                                                <option value="5">Science Scholars</option>
                                                <option value="6">Sports</option>
                                            </select>
                                        </div>



                                        <div class="mb-3">
                                            <label for="children"> Assign Mom </label>
                                            <select class="form-select mb-3" id="children11" name="mom" >
                                                <?php
                                                // use a while loop to fetch data
                                                // from the $all_categories variable
                                                // and individually display as an option
                                                while ($mom = mysqli_fetch_array(
                                                    $all_mom,MYSQLI_ASSOC)):;
                                                    ?>
                                                    <option value="<?php echo $mom["momid"];
                                                    // The value we usually set is the primary key
                                                    ?>">
                                                        <?php echo $mom["fname"]." ".$mom["lname"];
                                                        // To show the category name to the user
                                                        ?>
                                                    </option>
                                                <?php
                                                endwhile;
                                                // While loop must be terminated
                                                ?>
                                            </select>
                                        </div>
                                        <label for="inputGroupFile02">Photo</label>
                                        <div class="input-group mb-3">
                                            <input name ="img" type="file" class="form-control" id="inputGroupFile02">
                                            <label class="input-group-text" for="inputGroupFile02">Upload Profile Picture</label>
                                        </div>
                                        <div class="mt-2">
                                            <button name="submit" type="submit" class="btn btn-primary float-end">Register Child</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>







                    <div class="tab-content col-md-9 col-sm-8" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-room1" role="tabpanel"
                             aria-labelledby="v-pills-room1-tab">
                            <!-- start room  content -->
                            <div class="d-flex justify-content-between align-items-center py-2  border-bottom">
                                <h5 class="modal-title">Edit child <span id="s1">-select from left menu- </span> Info</h5>

                            </div>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                     aria-labelledby="pills-home-tab">
                                    <form action="edit_child.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden"  id="theId" name="theId" >
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
                                        <div class="mb-3">
                                            <label for="roomz">Assign to Room</label>
                                            <select name="room_name" class="form-select mb-3" id="roomz"
                                                    aria-label="Default select example">
                                                <option value="1">ABC</option>
                                                <option value="2">Discovery Education</option>
                                                <option value="3">First Steps</option>
                                                <option value="4">Mama's home</option>
                                                <option value="5">Science Scholars</option>
                                                <option value="6">Sports</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="children111"> Assign Mom </label>
                                            <select class="form-select mb-3" id="children111" name="mom" >
                                                <?php
                                                $con = mysqli_connect("localhost","root","","kinderhome");
                                                $sql = "SELECT * FROM mom";
                                                $all_mom = mysqli_query($con,$sql);

                                                // use a while loop to fetch data
                                                // from the $all_categories variable
                                                // and individually display as an option
                                                while ($mom = mysqli_fetch_array(
                                                    $all_mom,MYSQLI_ASSOC)):;
                                                    ?>
                                                    <option value="<?php echo $mom["momid"];
                                                    ?>">
                                                        <?php echo $mom["fname"]." ".$mom["lname"];
                                                        ?>
                                                    </option>
                                                <?php
                                                endwhile;
                                                ?>
                                            </select>
                                        </div>
                                        <label >Upload Profile Picture</label>
                                        <div class="input-group mb-3">


                                            <input  type="file" name="img" class="form-control" id="inputGroupFile02" accept="image/*">

                                            <label class="input-group-text" for="inputGroupFile02">Upload Profile Picture</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="gender">Gender</label>
                                            <div class="form-check">
                                                <input checked value="1" class="form-check-input" type="radio" name="gender"
                                                       id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input value="2" class="form-check-input" type="radio" name="gender"
                                                       id="flexRadioDefault2" >
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Female
                                                </label>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="date-picker-example">Date of birth</label>
                                            <div id="date-picker-example"
                                                 class="md-form md-outline input-with-post-icon datepicker"
                                                 inline="true">
                                                <input type="date" id="start" name="date"
                                                       value="2018-07-22"
                                                       min="2016-01-01" max="2022-12-12">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label  for="formGroupExampleInput" class="form-label">Allergies</label>
                                            <input name="Allergies" type="text" class="form-control" id="formGroupExampleInput"
                                                   placeholder=" Insert Allergies ...">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Medication</label>
                                            <input name="Medication" type="text" class="form-control" id="formGroupExampleInput"
                                                   placeholder="Insert kids Medication, medicines...">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Dietary</label>
                                            <input name="Dietary" type="text" class="form-control" id="formGroupExampleInput"
                                                   placeholder="Kids not allowable food ...">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Safe
                                                passphrase</label>
                                            <input name="safe_passphrase" type="text" class="form-control" id="formGroupExampleInput"
                                                   placeholder="Enter a secret phrase for safety ...">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Parents
                                                contact</label>
                                            <input name="contact" type="text" class="form-control" id="formGroupExampleInput"
                                                   placeholder=" mobile or email ...">
                                        </div>


                                        <div class="mt-2">
                                            <button name="submit" type="submit" class="btn btn-primary float-end">Edit child Info
                                            </button>
                                        </div>
                                        <div class="mt-2">
                                            <button name="delete" type="submit" class="btn  float-end "
                                                    style="background-color: #f7cac9; margin:0 7px;">Delete child:<span id="s">
                                            </button>
                                        </div>

                                    </form>
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
    $('.children').addClass('active')
</script>

</body>
</html>