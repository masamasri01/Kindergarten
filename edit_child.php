<?php
$conn =mysqli_connect("localhost","root","","kinderhome");

$id = $_POST['theId'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$roomid = $_POST['room_name'];
$gender=$_POST['gender'];
$bd=$_POST['date'];
$allergies=$_POST['Allergies'];
$Medication=$_POST['Medication'];
$Dietary=$_POST['Dietary'];
$safe_passphrase=$_POST['safe_passphrase'];
$contact=$_POST['contact'];
$mom_id=$_POST['mom'];



echo $id;

$img_name =$_FILES ['img']['name'];
$img_size =$_FILES ['img']['size'];
$tmp_name =$_FILES ['img']['tmp_name'];
$error =$_FILES ['img']['error'];

$img_ex =pathinfo($img_name,PATHINFO_EXTENSION);
$img_ex_lc =strtolower ($img_ex);

$allowed_exs = array("jpg","jpeg","png");
$new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
$img_upload_path = 'uploads/' . $new_img_name;
move_uploaded_file($tmp_name, $img_upload_path);


if (isset($_POST['submit'])&&isset($_POST['firstname'])) {
  $sql = "UPDATE kids SET fname ='$fname' WHERE kidid = '$id' ";
    ($conn->query($sql));
}
if (isset($_POST['submit'])&&isset($_POST['lastname'])) {
 $sql = "UPDATE kids SET lname ='$lname' WHERE kidid = '$id' ";
    ($conn->query($sql));
}

if (isset($_POST['submit']) &&isset($_FILES['img'])) {
  $sql = "UPDATE kids SET img_url ='$new_img_name' WHERE kidid = '$id'";
    ($conn->query($sql));
}
if (isset($_POST['submit'])&&isset($_POST['gender'])) {
    $sql = "UPDATE kids SET gender ='$gender' WHERE kidid = '$id' ";
    ($conn->query($sql));
}

if (isset($_POST['submit'])&&isset($_POST['date'])) {
    $sql = "UPDATE kids SET bdate ='$bd' WHERE kidid = '$id' ";
    ($conn->query($sql));
}

if (isset($_POST['submit'])&&isset($_POST['allergies'])) {
    $sql = "UPDATE kids SET allergies ='$allergies' WHERE kidid = '$id' ";
    ($conn->query($sql));
}

if (isset($_POST['submit'])&&isset($_POST['Medication'])) {
    $sql = "UPDATE kids SET medication ='$Medication' WHERE kidid = '$id' ";
    ($conn->query($sql));
}

if (isset($_POST['submit'])&&isset($_POST['Dietary'])) {
    $sql = "UPDATE kids SET dietary ='$Dietary' WHERE kidid = '$id' ";
    ($conn->query($sql));
}
if (isset($_POST['submit'])&&isset($_POST['safe_passphrase'])) {
    $sql = "UPDATE kids SET safepassphrase ='$safe_passphrase' WHERE kidid = '$id' ";
    ($conn->query($sql));
}
if (isset($_POST['submit'])&&isset($_POST['contact'])) {
    $sql = "UPDATE kids SET contact ='$contact' WHERE kidid = '$id' ";
    ($conn->query($sql));
}
if (isset($_POST['submit'])&&isset($_POST['mom'])) {
    $sql = "UPDATE kids SET momid ='$mom_id' WHERE kidid = '$id' ";
    ($conn->query($sql));
}




if (isset($_POST['delete'])) {
    $sql = "DELETE FROM kids WHERE kidid='$id'";
    ($conn->query($sql));
}
header( 'Location: children_m.php' ) ;




?>