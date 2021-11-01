<!DOCTYPE HTML>  
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
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
      <a href="/">Home</a>
      <a href="/podcast/">Podcast</a>
      <a href="/podcast/feed.xml">Feed</a>
      <a href="/cornerblog/">Cornerblog</a>
      <a href="/html/mili.html">Mili</a>
      <a href="/me/index.html">Me</a>
      <a class="active" href="/db/ins_db.php">Insert</a>
  </div>

<?php

 echo "<h2>Chat</h2>";

//Cookie Login
if(!isset($_COOKIE["login"]))// $_COOKIE is a variable and login is a cookie name 

  header("location:login.php"); 

// get the user name from cookie from loginprocess.php
$user = htmlspecialchars($_COOKIE['login']);

// define variables and set to empty values
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $message = test_input($_POST["message"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "lukaspe1_lukas", "hiphonei32", "lukaspe1_my_db");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$sql = "SELECT message_id, message, user FROM chat ORDER BY message_id DESC";
$result = mysqli_query($link, $sql);


if (mysqli_num_rows($result) > 0) {
  echo "<div style='height:400px;overflow:auto;'>
          <table>
            <thead>
             <tr>
               <th>message</th>
               <th>user</th>
             </tr>
            </thead>
          <tbody>

            ";
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    if ($row["user"]=$user) {
      //Self made messages
      echo "<tr><td>" . $row["message"].
        " </td><td>" . $row["user"].
        "</td></tr>";
      // code...
    }
    else{
      
    }

  }
  echo "</tbody>
        </table>
        </div>";
} else {
  echo "0 results";
}


// Close connection
mysqli_close($link);

?>

<form method="post" action="skript.php" onsubmit="this.submit(); this.reset(); return false;>  
  <label for="message">You: </label>
  <input name="message" type="text" onfocus="this.value=''">
  <br><br>

  <!--<input class="button" type="submit" name="submit" value="Submit"  onClick="window.setTimeout(function(){location.reload()},3000)"> 
  --> 
</form>


</body>
</html>





