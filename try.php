
<?php

// Create connection
$conn = new mysqli("localhost", "root","","kinderhome");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$pass = $_POST['password'];
$id=$_POST['id'];
$type=$_POST['flexRadioDefault'];

if ($type=='1') {
    $sql = "SELECT id, password FROM members";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

        while ($row = $result->fetch_assoc()) {
            // echo "<br> id: ". $row["id"]. " - Name: ". $row["password"].   "<br>";
            if (($id == $row["id"]) && ($pass == $row["password"])) {

                header("Location: index.php?id=1&type=1");
                break;
            } else if ((($id == $row["id"]) && ($pass != $row["password"])) || (($id != $row["id"]) && ($pass == $row["password"]))) {
                header("Location: first.html?id=1&type=1");
            }

        }

    } else {
        echo "0 results";
    }
}
elseif ($type=='2'){
    $sql = "SELECT * FROM staff";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row

        while ($row = $result->fetch_assoc()) {
            // echo "<br> id: ". $row["id"]. " - Name: ". $row["password"].   "<br>";
            if (($id == $row["id"]) && ($pass == $row["password"])) {

                header("Location: staff_index.php?id=$id");
                break;
            } else if (($id == $row["id"]) && ($pass != $row["password"])) {
                header("Location: first.html");
            }

        }

    } else {
        echo "0 results";
    }
}
elseif ($type=='3'){
    $sql = "SELECT * FROM mom";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row

        while ($row = $result->fetch_assoc()) {
            // echo "<br> id: ". $row["id"]. " - Name: ". $row["password"].   "<br>";
            if (($id == $row["momid"]) && ($pass == $row["password"])) {

                header("Location: mom_index.php?id=$id");
                break;
            } else if (($id == $row["momid"]) && ($pass != $row["password"]))  {
                header("Location: first.html");
            }

        }

    } else {
        echo "0 results";
    }
}


$conn->close();
?>

