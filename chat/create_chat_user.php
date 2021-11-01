<!DOCTYPE HTML>  
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create user</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script type="text/javascript" src="audio.js"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link rel="manifest" href="../site.webmanifest">

</head>
<body>  
    <div class="topnav">
      <a href="/">Home</a>
      <a href="/podcast/">Podcast</a>
      <a href="/podcast/feed.xml">Feed</a>
      <a href="/cornerblog/">Cornerblog</a>
      <a href="/html/mili.html">Mili</a>
      <a href="/me/index.html">Me</a>
      <a class="active" href="/db/ins_db.php">Create Chat User</a>
  </div>

<?php
// define variables and set to empty values
$user_name = $user_pw = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_name = test_input($_POST["user_name"]);
  $user_pw = test_input($_POST["user_pw"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Create user</h2>
<form method="post" action="user_skript.php">  
  user_name: <input type="text" name="user_name">
  <br><br>
  user_pw: <input type="text" name="user_pw">
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
 

$sql = "SELECT user_name, user_pw FROM chat_users";
$result = mysqli_query($link, $sql);

echo "<h2>Your Users:</h2>";

if (mysqli_num_rows($result) > 0) {
  echo "<table>
          <tr>
            <th>user_name</th>
            <th>user_pw</th>
          </tr>
            ";
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["user_name"]. 
    " </td><td>" . $row["user_pw"].
    "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
 
// Close connection
mysqli_close($link);

?>

</body>
</html>





