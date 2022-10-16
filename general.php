<?php
$date=$_POST['date'];
$childid=$_POST['children'];
$desc=$_POST['desc'];





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
            $sql ="INSERT INTO general (date, img_url, descrip)
VALUES ('$date', '$new_img_name','$desc')";
            ($conn->query($sql));
           $sql1="select * from general where date='$date' and img_url='$new_img_name' and  descrip='$desc'";
            ($conn->query($sql1));
            $activities= mysqli_query($conn,$sql1);
            while ($activity = mysqli_fetch_array(
                $activities ,MYSQLI_ASSOC)):
                $ac_id=$activity['activity_id'];
                endwhile;


            $checkbox1 = $_POST['children'] ;

                for ($i=0; $i<sizeof ($checkbox1);$i++) {
                    $query="INSERT INTO general1 (kidid,activity_id) VALUES ('$checkbox1[$i]','$ac_id')";

                    ($conn->query($query));

                }

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

