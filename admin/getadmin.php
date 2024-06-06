<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id,firstName, familyName, email, password FROM admins";
$result = $conn->query($sql);

$admins = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $admins[] = $row;
  }
} else {
  echo json_encode([]);
}
$conn->close();

echo json_encode($admins);
?>
