<?php

if (isset($_FILES['img']) &&isset($_POST['submit'])&&isset($_POST['firstname'])
    &&isset($_POST['lastname'])&&isset($_POST['room_name'])){

    $fname= $_POST['firstname'];
    $lname= $_POST['lastname'];
    $roomname= $_POST['room_name'];
$momid=$_POST['mom'];

    $img_name =$_FILES ['img']['name'];
    $img_size =$_FILES ['img']['size'];
    $tmp_name =$_FILES ['img']['tmp_name'];
    $error =$_FILES ['img']['error'];
    if($error===0){
        $img_ex =pathinfo($img_name,PATHINFO_EXTENSION);
        $img_ex_lc =strtolower ($img_ex);

        $allowed_exs = array("jpg","jpeg","png");
        if(in_array($img_ex_lc , $allowed_exs)){
            $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
            $img_upload_path = 'uploads/'.$new_img_name;
            move_uploaded_file($tmp_name,$img_upload_path);
            //insert into database
            $conn =mysqli_connect("localhost","root","","kinderhome");

            if (!$conn){
                echo "Connection failed";
                exit();
            }
            else{
                $sql ="INSERT INTO kids (fname, lname, roomid,momid,img_url)
VALUES ('$fname', '$lname','$roomname','$momid','$new_img_name')";
                ($conn->query($sql));
                header("location:children_m.php");




                //header("location: messages.php");
                //echo $new_img_name;
            }}
        else {
            $em="You can't upload files of this type!";
            header("location : children_m?error=$em");
        }
    }
    else {
        $em= "unknown error occurred";
        header("location:children_m?error=$em");
    }

}
