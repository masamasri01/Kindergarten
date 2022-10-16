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
    <title>Messages | Hinder Home</title>
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
                <a href="index.php" class="nav-link">Messages</a>
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
<?php

if (isset($_POST['submit'])){
    /* Attempt MySQL server connection. Assuming
    you are running MySQL server with default
    setting (user 'root' with no password) */
    $link = mysqli_connect("localhost",
        "root", "", "kinderhome");

// Check connection
    if($link === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

// Escape user inputs for security
    $un= mysqli_real_escape_string(
        $link, $_REQUEST['uname']);
    $m = mysqli_real_escape_string(
        $link, $_REQUEST['msg']);

    $ts=date('y-m-d h:ia');

// Attempt insert query execution
    $sql = "INSERT INTO chats (uname, msg, dt)
		VALUES ('$un', '$m', '$ts')";
    if(mysqli_query($link, $sql)){
        ;
    } else{
        echo "ERROR: Message not sent!!!";
    }
// Close connection
    mysqli_close($link);
}
?>
<html>
<head>
    <style>
        *{
            box-sizing:border-box;
        }
        body{
            background-color:#2696E9;
            font-family:Arial;
        }
        #container{
            width:500px;
            height:700px;
            background:white;
            margin:0 auto;
            font-size:0;
            border-radius:5px;
            overflow:hidden;
        }
        main{
            width:500px;
            height:700px;
            display:inline-block;
            font-size:15px;
            vertical-align:top;
        }
        main header{
            height:100px;
            padding:30px 20px 30px 40px;
            background-color:#f7cac9;
        }
        main header > *{
            display:inline-block;
            vertical-align:top;
        }
        main header img:first-child{
            width:24px;
            margin-top:8px;
        }
        main header img:last-child{
            width:24px;
            margin-top:8px;
        }
        main header div{
            margin-left:90px;
            margin-right:90px;
        }
        main header h2{
            font-size:25px;
            margin-top:5px;
            text-align:center;
            color:#FFFFFF;
        }
        main .inner_div{
            padding-left:0;
            margin:0;
            list-style-type:none;
            position:relative;
            overflow:auto;
            height:500px;
            background-color: #fafafa;
            background-position:center;
            background-repeat:no-repeat;
            background-size:cover;
            position: relative;
            border-top:2px solid #fff;
            border-bottom:2px solid #fff;

        }
        main .triangle{
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 8px 8px 8px;
            border-color: transparent transparent
            #58b666 transparent;
            margin-left:20px;
            clear:both;
        }
        main .message{
            padding:10px;
            color:#000;
            margin-left:15px;
            background-color:#58b666;
            line-height:20px;
            max-width:90%;
            display:inline-block;
            text-align:left;
            border-radius:5px;
            clear:both;
        }
        main .triangle1{
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 8px 8px 8px;
            border-color: transparent
            transparent #6fbced transparent;
            margin-right:20px;
            float:right;
            clear:both;
        }
        main .message1{
            padding:10px;
            color:#000;
            margin-right:15px;
            background-color:#6fbced;
            line-height:20px;
            max-width:90%;
            display:inline-block;
            text-align:left;
            border-radius:5px;
            float:right;
            clear:both;
        }

        main footer{
            height:150px;
            padding:20px 30px 10px 20px;
            background-color:#f7cac9;
        }
        main footer .input1{
            resize:none;
        // border:100%;
            display:block;
            width:120%;
            height:55px;
            border-radius:3px;
            padding:20px;
            font-size:13px;
            margin-bottom:13px;
        }
        main footer textarea{
            resize:none;
        //  border:100%;
            display:block;
            width:140%;
            height:55px;
            border-radius:3px;
            padding:20px;
            font-size:13px;
            margin-bottom:13px;
            margin-left:20px;
        }
        main footer .input2{
            resize:none;
        //  border:100%;
            display:block;
            width:40%;
            height:55px;
            border-radius:3px;
            padding:20px;
            font-size:13px;
            margin-bottom:13px;
            margin-left:100px;
            color:white;
            text-align:center;
            background-color:#8c68ce;
            border: 2px solid white;
        }
        }
        main footer textarea::placeholder{
            color:#ddd;
        }

    </style>
<body onload="show_func()">
<div id="container">
    <main>
        <header>
            <img src="https://s3-us-west-2.amazonaws.com/
			s.cdpn.io/1940306/ico_star.png" alt="">
            <div>
                <h2>CHAT Messages</h2>
            </div>
            <img src="https://s3-us-west-2.amazonaws.com/
			s.cdpn.io/1940306/ico_star.png" alt="">
        </header>

        <script>
            function show_func(){

                var element = document.getElementById("chathist");
                element.scrollTop = element.scrollHeight;

            }
        </script>

        <form id="myform" action="Group_chat.php" method="POST" >
            <div class="inner_div" id="chathist">
                <?php
                $host = "localhost";
                $user = "root";
                $pass = "";
                $db_name = "kinderhome";
                $con = new mysqli($host, $user, $pass, $db_name);

                $query = "SELECT * FROM chats";
                $run = $con->query($query);
                $i=0;

                while($row = $run->fetch_array()) :
                    if($i==0){
                        $i=5;
                        $first=$row;
                        ?>
                        <div id="triangle1" class="triangle1"></div>
                        <div id="message1" class="message1">
<span style="color:white;float:right;">
<?php echo $row['msg']; ?></span> <br/>
                            <div>
<span style="color:palegoldenrod;float:left;
font-size:15px;clear:both;">
	<?php echo $row['uname']; ?>,
		<?php echo $row['dt']; ?>
</span>
                            </div>
                        </div>
                        <br/><br/>
                        <?php
                    }
                    else
                    {
                        if($row['uname']!=$first['uname'])
                        {
                            ?>
                            <div id="triangle" class="triangle"></div>
                            <div id="message" class="message">
<span style="color:white;float:left;">
<?php echo $row['msg']; ?>
</span> <br/>
                                <div>
<span style="color:palegoldenrod;float:right;
		font-size:15px;clear:both;">
<?php echo $row['uname']; ?>,
		<?php echo $row['dt']; ?>
</span>
                                </div>
                            </div>
                            <br/><br/>
                            <?php
                        }
                        else
                        {
                            ?>
                            <div id="triangle1" class="triangle1"></div>
                            <div id="message1" class="message1">
<span style="color:white;float:right;">
<?php echo $row['msg']; ?>
</span> <br/>
                                <div>
<span style="color:palegoldenrod;float:left;
		font-size:15px;clear:both;">
<?php echo $row['uname']; ?>,
	<?php echo $row['dt']; ?>
</span>
                                </div>
                            </div>
                            <br/><br/>
                            <?php
                        }
                    }
                endwhile;
                ?>
            </div>
            <footer>
                <table>
                    <tr>
                        <th>
                            <input class="input1" type="text"
                                   id="uname" name="uname"
                                  value="Admin">
                        </th>
                        <th>
			<textarea id="msg" name="msg"
                      rows='3' cols='50'
                      placeholder="Type your message">
			</textarea></th>
                        <th>
                            <input class="input2" type="submit"
                                   id="submit" name="submit" value="send">
                        </th>
                    </tr>
                </table>
            </footer>
        </form>
    </main>
</div>

</body>
</html>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->







<!-- model add children -->


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
    $('.chat').addClass('active')
</script>
<script>
    $(function() {
        $('.select2').select2()
    });
</script>

</body>
</html>