
<?php

// Create connection
$conn = new mysqli("localhost", "root","","kinderhome");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$pass = $_POST['password'];
$id=$_POST['id'];
$sql = "SELECT id, password FROM members";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
        // echo "<br> id: ". $row["id"]. " - Name: ". $row["password"].   "<br>";
        if (($id== $row["id"] ) && ($pass== $row["password"])){

            header("Location: index.html");
            break;
        }
        else   if (($id!= $row["id"] ) || ($pass!= $row["password"]))
            header("Location: first.html");

    }
} else {
    echo "0 results";
}

$conn->close();
?>

