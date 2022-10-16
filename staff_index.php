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
    <title>Home |Kinder Home</title>
    <!-- import font awesome icon -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- import bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- import select  -->
    <link rel="stylesheet" href="assets/css/adminlte.min.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">
    <!-- import style  -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- import style responsive -->
    <link rel="stylesheet" href="assets/css/style_responsive.css">
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
                <a href="staff_index.php" class="nav-link">Home</a>
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

    <?php
    $con = mysqli_connect("localhost","root","","kinderhome");
    $sql = "SELECT * FROM staff";
    $all_mom = mysqli_query($con,$sql);
    $sql2 = "SELECT * FROM room";
    $all_room = mysqli_query($con,$sql2);

    while ($mom = mysqli_fetch_array(
        $all_mom,MYSQLI_ASSOC)):;
        if ($mom['id']==$_GET['id']) {
            $momname = $mom['fname'] . ' ' . $mom['lname'];
            $IMG = $mom['img_url'];
            $rid = $mom['roomid'];

            while ($room = mysqli_fetch_array(
                $all_room, MYSQLI_ASSOC)):;
                if ($room['roomid'] == $rid) {
                    $roomname = $room['roomname'];


                    break;

                }
                endwhile;
            break;
        }

    endwhile;
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-white">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"></h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <!-- start profile  -->
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-1">
                        <img class="" src="uploads/<?= $IMG ?>" alt="default image"  style="border-radius:100%;width: 150px;height: 150px;margin-left: 50px">
                    </div>
                    <div >




                        <strong  style="margin-left: 65px">  <?php echo $momname?></strong>
                        <p style="margin-left: 65px">  works in room <?php echo $roomname?></p>
                    </div>
                </div>

                <nav class="home-tabs d-flex  justify-content-between align-content-center border-bottom">

                    <div class="col" style="margin-left: 400px">
                        <a href="staff_feed.php?id=<?=$i?>"> <button type="button" class="btn m-1 btn-secondary ">move to Feed</button></a>
                        <button  type="button" class="btn m-1  btn-primary"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" >New Activity</button>


                        <a href="staff_messages.php?id=<?=$i?>"> <button type="button" class="btn m-1 btn-secondary ">Contact with Moms</button></a>

                    </div>
                </nav>
                <div class="tab-content mt-3 " id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class=" d-flex flex-column align-items-center justify-content-center">
                            <div class="card">
                                <div class="card-header">
                                    Welcome Staff <?=$momname?>
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p>This is Your profile, You can post your activities with your kids so as their mums can be unconcerned, You can also message them, Take care!</p>
                                        <footer class="blockquote-footer"><cite title="Source Title">Kinder Home Administration</cite></footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">..2.</div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">.3..</div>
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
<!-- import select  -->
<script src="assets/js/select2.full.min.js"></script>
<!-- import main js -->
<script src="assets/js/main.js"></script>
<script>
    $('.navbar .nav-link').removeClass('active')
    $('.home').addClass('active')
</script>
<script>
    $(function() {
        $('.select2').select2()
    });
</script>

</body>
</html>