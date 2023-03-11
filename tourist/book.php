<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guide";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM booking";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$ID = $row["id"];
}
}

$ID += 1;

$date = date("Y/m/d");

$sql = "INSERT INTO `booking`(`id`,`user`, `guide`, `status` , `start`) VALUES ('".$ID."','".$_SESSION["id"]."','".$_POST["id"]."', '0', '".$date."' )";

if ($conn->query($sql) === TRUE) {
    $_SESSION["guide"] = $_POST["id"];
    $_SESSION["book_id"] = $ID;

    header("Location: experience.php");
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>