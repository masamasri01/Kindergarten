<?php $id= $_GET['id']
?>
<?php
$con = mysqli_connect("localhost","root","","kinderhome");
$sql = "SELECT * FROM staff";
$all_mom = mysqli_query($con,$sql);

while ($mom = mysqli_fetch_array(
    $all_mom,MYSQLI_ASSOC)):;
    if ($mom['id']==$_GET['id']){
        $momname=$mom['fname'].' '.$mom['lname'];
        $IMG=$mom['img_url'];
        break;
    }
endwhile;
?>
<!-- start side bar  -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #2d3238 ;position: fixed">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="assets/img/logo.png" class="brand-image  elevation-3" alt="logo ">
        <span class="brand-text font-weight-light text-capitalize">Kinder Home</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                      with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="staff_index.php?id=<?=$id?>" class="nav-link home">
                        <i class="fas fa-th   me-2" style="width:20px"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="staff_feed.php?id=<?=$id?>" class="nav-link feed">
                        <i class="fas fas fa-table   me-2" style="width:20px"></i>
                        <p>
                            Feed
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="staff_activity.php?id=<?=$id?>" class="nav-link activity">
                        <i class="fas fa-bolt   me-2" style="width:20px"></i>
                        <p>
                            Activity
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="staff_messages.php?id=<?=$id?>" class="nav-link chat">
                        <i class="fas fa-envelope   me-2" style="width:20px"></i>
                        <p>
                            Messages
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-file-alt   me-2" style="width:20px"></i>
                        <p>
                            Reports
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Monitoring</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/flot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tracking</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">

                    <a href="staff_mychildren.php?id=<?=$id?>" class="nav-link room">
                        <i class="fas fa-child   me-2" style="width:20px"></i>
                        <p>
                            My children
                        </p>
                    </a>
                </li>

                <hr class="text-white" />
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="uploads/<?= $IMG?>" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong class="text-white"><?= $momname?></strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="first.html">Sign out</a></li>
                    </ul>
                </div>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- end sidebar  -->