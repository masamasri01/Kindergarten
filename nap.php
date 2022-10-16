<?php
$date=$_POST['date'];
$childid=$_POST['children'];
$desc=$_POST['desc'];
$start=$_POST['start'];
$end=$_POST['end'];


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
            $sql ="INSERT INTO nap (starttime,endtime, img_url, descrip,kidid,date)
VALUES ('$start','$end', '$new_img_name','$desc','$childid','$date')";
            ($conn->query($sql));


            header("location: feed.php");
            //echo $new_img_name;
        }}
    else {
        $em="You can't upload files of this type!";
        header("location: feed.php");    }
}
else {
    $em= "unknown error occurred";
    header("location: feed.php");
}

