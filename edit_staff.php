<?php
$conn =mysqli_connect("localhost","root","","kinderhome");

    $id = $_POST['theId'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $roomid = $_POST['room_name'];



$img_name =$_FILES ['img']['name'];
$img_size =$_FILES ['img']['size'];
$tmp_name =$_FILES ['img']['tmp_name'];
$error =$_FILES ['img']['error'];

    $img_ex =pathinfo($img_name,PATHINFO_EXTENSION);
    $img_ex_lc =strtolower ($img_ex);

    $allowed_exs = array("jpg","jpeg","png");

if (isset($_POST['submit'])) {
    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
    $img_upload_path = 'uploads/' . $new_img_name;
    move_uploaded_file($tmp_name, $img_upload_path);

  $sql = "UPDATE staff SET fname ='$fname' , lname = '$lname',roomid='$roomid ',img_url='$new_img_name'  WHERE id = '$id'";
    ($conn->query($sql));

}
if (isset($_POST['delete'])) {
    $sql = "DELETE FROM staff WHERE id='$id'";
    ($conn->query($sql));
}
header( 'Location: staff_mm.php' ) ;





?>