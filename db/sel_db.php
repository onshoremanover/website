<?php
/* Login stuff, don't change, highly specific to mysqli & mariadb*/
$link = mysqli_connect("localhost", "lukaspe1_lukas", "hiphonei32", "lukaspe1_my_db");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// SQL Statements, there is where the magic lies
$sql = "SELECT id, crq_nr, timer, comment, review FROM change_tbl";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. 
          " - crq_nr: " . $row["crq_nr"]. 
          "- timer" . $row["timer"]. 
          " - comment: " . $row["comment"].
          " - review: " . $row["review"].
          "<br>";
        }
} else {
  echo "0 results";
}
// Close connection
mysqli_close($link);



/*
$sql = "INSERT INTO change_tbl (crq_nr, timer, comment, review)
VALUES ('CRQ11111', '15', 'War gar nicht so einfach', 'good')";


if (mysqli_query($link, $sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
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
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
 
// Close connection
mysqli_close($link);*/
?>
