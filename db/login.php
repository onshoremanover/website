<!DOCTYPE HTML>  
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
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
      <a class="active" href="/db/ins_db.php">Login</a>
  </div>







<fieldset> 
<legend>Login </legend>
<form action="loginprocess.php" method="POST"><br><br>
Username:<input type="text" required="" name="user_name"><br><br>
Password:<input type="password" required="" name="user_pw"><br><br>
<input type="checkbox" value="1" name="remember">keep me login:
<input type="submit" value="Login" name="sub">
<br>
<?php 
if(isset($_REQUEST["err"]))
	$msg="Invalid username or Password";
?>
<p style="color:red;">
<?php if(isset($msg))
{
	
echo $msg;
}
?>
</p>

<!--
<p>
    No account? <a href="/db/create_user.php">Create User</a>
</p>
-->

</form>

</fieldset>
</center>

</body>
</html>