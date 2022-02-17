<?php
echo htmlspecialchars($_SERVER["PHP_SELF"]);

//Hack so the entry form stays on the same page
http_response_code(204);

$user_name = $_POST['user_name'];
$user_pw = $_POST['user_pw'];

echo "<h2>Your Input:</h2>";
echo $user_name;
echo "<br>";
echo $user_pw;

//Password hashing
$hashed_password=password_hash($user_pw, PASSWORD_BCRYPT);







/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "lukaspe1_lukas", "hiphonei32", "lukaspe1_my_db");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create table query execution
$sql = "INSERT IGNORE INTO users (user_name, user_pw)
VALUES ('$user_name', '$hashed_password')";


if (mysqli_query($link, $sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $link->error;
}


if(mysqli_query($link, $sql)) {
    echo "Table created successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

if (mysqli_query($link, $sql)) {
  $last_id = mysqli_insert_id($link);
  echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

?>