<?php
echo htmlspecialchars($_SERVER["PHP_SELF"]);

//Hack so the entry form stays on the same page, returns no content which is not true however, all working perfectly
http_response_code(204);

$change = $_POST['change'];
$timer = $_POST['timer'];
$comment = $_POST['comment'];
$review = $_POST['review'];


echo "<h2>Your Input:</h2>";
echo $change;
echo "<br>";
echo $timer;
echo "<br>";
echo $comment;
echo "<br>";
echo $review;


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "lukaspe1_lukas", "hiphonei32", "lukaspe1_my_db");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create table query execution
$sql = "INSERT IGNORE INTO change_tbl (crq_nr, timer, comment, review)
VALUES ('$change', '$timer', '$comment', '$review')";


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