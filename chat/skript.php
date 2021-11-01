<?php
echo htmlspecialchars($_SERVER["PHP_SELF"]);

//Hack so the entry form stays on the same page, returns no content which is not true however, all working perfectly
http_response_code(204);

$message = $_POST['message'];

// get the user name from cookie from loginprocess.php
$user = htmlspecialchars($_COOKIE['login']);

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "lukaspe1_lukas", "hiphonei32", "lukaspe1_my_db");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create table query execution
$sql = "REPLACE chat (message, user)
VALUES ('$message', '$user')";


if (mysqli_query($link, $sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $link->error;
}

/*
if(mysqli_query($link, $sql)) {
    echo "Table created successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
*/

/*
if (mysqli_query($link, $sql)) {
  $last_id = mysqli_insert_id($link);
  echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
*/


// Close connection
mysqli_close($link);

?>