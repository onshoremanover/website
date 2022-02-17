<!DOCTYPE HTML>  
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script type="text/javascript" src="audio.js"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link rel="manifest" href="../site.webmanifest">
<style>
  tr:nth-child(even){background-color: #f2f2f2;}
  
  tr:hover {background-color: #ddd;}
</style>



</head>
<body>  
    <div class="topnav">
      <a class="active" href="/db/ins_db.php">Insert</a>
  </div>

<?php

 
//Cookie Login
if(!isset($_COOKIE["login"]))// $_COOKIE is a variable and login is a cookie name 

  header("location:login.php"); 




// define variables and set to empty values
$change = $timer = $comment = $review = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $change = test_input($_POST["change"]);
  $timer = test_input($_POST["timer"]);
  $comment = test_input($_POST["comment"]);
  $review = test_input($_POST["review"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Change Review</h2>
<form method="post" action="user_skript.php">  
  Change: <input type="text" name="change">
  <br><br>
  Time: <input type="text" name="timer">
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Review:
  <input type="radio" name="review" value="good">good
  <input type="radio" name="review" value="neutral">neutral
  <input type="radio" name="review" value="bad">bad
  <br><br>

  <input class="button" type="submit" name="submit" value="Submit"  onClick="window.setTimeout(function(){location.reload()},3000)">  
</form>

<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "lukaspe1_lukas", "hiphonei32", "lukaspe1_my_db");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$sql = "SELECT crq_nr, timer, comment, review FROM change_tbl";
$result = mysqli_query($link, $sql);

echo "<h2>Your Input:</h2>";

if (mysqli_num_rows($result) > 0) {
  echo "<table>
          <thead>
            <tr>
              <th>crq_nr</th>
              <th>timer</th>
              <th>comment</th>
              <th>review</th>
            </tr>
          </thead>
        <tbody>

            ";
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["crq_nr"]. 
    " </td><td>" . $row["timer"].
    " </td><td>" . $row["comment"]. 
    " </td><td>" . $row["review"]. 
    "</td></tr>";
  }
  echo "</tbody>
        </table>";
} else {
  echo "0 results";
}
 
// Close connection
mysqli_close($link);

?>

</body>
</html>





