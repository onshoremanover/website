
<!DOCTYPE HTML>  
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podcast</title>
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
      <a class="active" href="/cornerblog/">Cornerblog</a>
      <a href="/html/mili.html">Mili</a>
      <a href="/me/index.html">Me</a>
  </div>


<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $change = test_input($_POST["change"]);
  $time = test_input($_POST["time"]);
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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Change: <input type="text" name="change">
  <br><br>
  Time: <input type="text" name="time">
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Review:
  <input type="radio" name="review" value="good">good
  <input type="radio" name="review" value="neutral">neutral
  <input type="radio" name="review" value="bad">bad
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $change;
echo "<br>";
echo $time;
echo "<br>";
echo $comment;
echo "<br>";
echo $review;
?>

</body>
</html>
