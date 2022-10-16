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
    <title>Activity | Kinder Home</title>
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
                <a href="staff_activity.php" class="nav-link">Activity</a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- start Main Sidebar Container -->
    <?php
    include('./staff_navbar.php');
    $i= $_GET['id'];
    ?>
    <!-- end  Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-white">

        <!-- Main content -->
        <section class="content">
            <!-- start profile  -->
            <div class="container">
                <div class="row align-items-start">
                    <div class="nav flex-column nav-pills col-md-3 col-sm-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <!-- start title  -->
                        <div class="d-flex justify-content-between align-items-center  border-bottom">
                            <h2 class="fs-4">Activity</h2>
                            <button class="p-3 btn border-0 btn-secondary text-center"  data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-plus" style="width: 20px;height: 20px;"></i></button>
                        </div>
                        <!-- end title  -->
                        <!-- start room item  -->
                        <div class="activity-item border p-2 my-2  nav-link active " id="v-pills-room1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-room1" type="button" role="tab" aria-controls="v-pills-room1" aria-selected="true">
                            <div class="item-title  d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-around align-items-center">
                        <span  class="bg-warning d-inline-block d-flex align-items-center justify-content-center rounded-circle  text-center" style="width: 40px;height: 40px;">
                            <i class="fas text-white fa-hourglass-end"></i>
                        </span>
                                    <div class="mx-2">
                                        <p class="text-black fs-6 fw-bold p-0 my-0">Pending Approval</p>
                                        <p class="text-muted my-0">0 Items</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end room item  -->
                        <!-- start room item  -->
                        <div class="activity-item border p-2 my-2 nav-link" id="v-pills-room2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-room2" type="button" role="tab" aria-controls="v-pills-room2" aria-selected="false">
                            <div class="item-title  d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-around align-items-center">
                      <span  class="bg-success d-inline-block d-flex align-items-center justify-content-center rounded-circle  text-center" style="width: 40px;height: 40px;">
                            <i class="fas text-white fa-check"></i>
                        </span>
                                    <div class="mx-2">
                                        <p class="text-black fs-6 fw-bold p-0 my-0">Approved</p>
                                        <p class="text-muted my-0">1 Items</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end room item  -->
                        <!-- start room item  -->
                        <div class="activity-item border p-2 my-2 nav-link"  id="v-pills-room3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-room3" type="button" role="tab" aria-controls="v-pills-room3" aria-selected="false">
                            <div class="item-title  d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-around align-items-center">
                      <span  class="bg-dark d-inline-block d-flex align-items-center justify-content-center rounded-circle  text-center" style="width: 40px;height: 40px;">
                        <i class="fas fa-pen"></i>
                        </span>
                                    <div class="mx-2">
                                        <p class="text-black fs-6 fw-bold p-0 my-0">Drafts</p>
                                        <p class="text-muted my-0">0 Items</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end room item  -->
                        <!-- start room item  -->
                        <div class="activity-item border p-2 my-2 nav-link"  id="v-pills-room4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-room4" type="button" role="tab" aria-controls="v-pills-room4" aria-selected="false">
                            <div class="item-title  d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-around align-items-center">
                      <span  class="bg-danger d-inline-block d-flex align-items-center justify-content-center rounded-circle  text-center" style="width: 40px;height: 40px;">
                            <i class="fas fa-trash"></i>
                        </span>
                                    <div class="mx-2">
                                        <p class="text-black fs-6 fw-bold p-0 my-0">Delete</p>
                                        <p class="text-muted my-0">0 Items</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end room item  -->
                    </div>
                    <div class="tab-content col-md-9 col-sm-7" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-room1" role="tabpanel" aria-labelledby="v-pills-room1-tab">
                            <!-- start room  content -->
                            <div class="d-flex justify-content-between align-items-center py-2  border-bottom">
                                <h2 class="fs-4">Pending Approval</h2>
                            </div>
                            <div class=" d-flex flex-column align-items-center justify-content-center py-5">
                                <img src="assets/img/download.png" class="img-fluid w-25" alt="">
                                <p class="text-muted">There are currently no pending observations</p>
                            </div>
                            <!-- end room  content -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-room2" role="tabpanel" aria-labelledby="v-pills-room2-tab">
                            <!-- start room  content -->
                            <div class="d-flex justify-content-between align-items-center py-2  border-bottom">
                                <h2 class="fs-4">Approved</h2>
                            </div>
                            <div class="activity-item  border-bottom p-2 my-2">
                                <div class="item-title d-flex justify-content-between  align-items-center">
                                    <div class="d-flex align-items-center">
                                        <span  class="bg-primary me-1 rounded-circle p-2 text-center"><i class="fas fa-file" style="width: 20px;height: 20px;"></i></span>
                                        <div>
                                            <p class="mb-1">New Observation Name</p>
                                            <p class="text-muted mb-0">created by UnKnow  17/04/2022 18:18</p>
                                        </div>
                                    </div>
                                    <span >
                                <i id="btnGroupDrop1" class="fa fa-ellipsis-v"  data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;"></i>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <li><a class="dropdown-item" href="#">Unapprove</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                </ul>
                            </span>
                                </div>
                            </div>
                            <!-- end room  content -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-room3" role="tabpanel" aria-labelledby="v-pills-room3-tab">
                            <!-- start room  content -->
                            <div class="d-flex justify-content-between align-items-center py-2  border-bottom">
                                <h2 class="fs-4">Drafts</h2>
                            </div>
                            <div class=" d-flex flex-column align-items-center justify-content-center py-5">
                                <img src="assets/img/download.png" class="img-fluid w-25" alt="">
                                <p class="text-muted">You currently have no draft EYFS Observations</p>

                            </div>
                            <!-- end room  content -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-room4" role="tabpanel" aria-labelledby="v-pills-room4-tab">
                            <!-- start room  content -->
                            <div class="d-flex justify-content-between align-items-center py-2  border-bottom">
                                <h2 class="fs-4">Deleted</h2>
                            </div>
                            <div class=" d-flex flex-column align-items-center justify-content-center py-5">
                                <img src="assets/img/download.png" class="img-fluid w-25" alt="">
                                <p class="text-muted">There are currently no deleted observations</p>

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







<!-- Modal new activity -->
<div class="modal newActivity fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add New Activity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-inline">
                    <li class="list-inline-item d-flex my-2">
                        <span class="bg-primary    py-3 px-4"><i class="fa fa-box"></i></span>
                        <a href="staff_activity1Form.php?id=<?=$i?>" class=" flex-grow-1 p-3 btn-secondary">Learning / Development</a>
                    </li>
                    <li class="list-inline-item d-flex my-2">
                        <span class="bg-success    py-3 px-4"><i class="fa fa-fan"></i></span>
                        <a href="staff_activity2Form.php?id=<?=$i?>" class="flex-grow-1  p-3 btn-secondary">Food / Drink</a>
                    </li>
                    <li class="list-inline-item d-flex my-2">
                        <span class="bg-info    py-3 px-4"><i class="fa fa-child"></i></span>
                        <a href="staff_activity3Form.php?id=<?=$i?>" class="flex-grow-1  p-3 btn-secondary">Nap</a>
                    </li>
                    <li class="list-inline-item d-flex my-2">
                        <span class="bg-newsecondary    py-3 px-4"><i class="fa text-white fa-car-crash"></i></span>
                        <a href="staff_activity4Form.php?id=<?=$i?>" class="flex-grow-1  p-3 btn-secondary">Accident / Incident</a>
                    </li>
                </ul>
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
    $('.activity').addClass('active')
</script>

</body>
</html>