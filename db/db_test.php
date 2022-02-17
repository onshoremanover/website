<?php
$conn = new mysqli("localhost", "lukaspe1_lukas", "hiphonei32", "lukaspe1_my_db");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>