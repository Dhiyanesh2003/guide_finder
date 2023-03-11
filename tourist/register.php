<?php
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

$ID = 0;

$sql = "SELECT * FROM tourist";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$ID = $row["id"];
}
}

$ID = $ID + 1;
$USERNAME = $_POST['NAME'];
$PASSWORD = $_POST['PASS'];
$LANG = $_POST['lang'];
$NUMBER = $_POST['NUMBER'];
$EMAIL = $_POST['EMAIL'];
$ADDRESS = $_POST['ADDRESS'];
$sql = "INSERT INTO tourist VALUES ('" . $ID . "','" . $USERNAME . "','" . $PASSWORD . "','" . $LANG . "','" . $NUMBER . "','" . $EMAIL . "','" . $ADDRESS . "')";

if ($conn->query($sql) === TRUE) {
header("Location: index.html");
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>