<?php

//--------
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "lukaspe1_lukas", "hiphonei32", "lukaspe1_my_db");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//-----------
 



if(isset($_REQUEST['sub']))
{
$a = $_REQUEST['user_name'];
$b = $_REQUEST['user_pw'];


/* Look for the username in the database. */
$res = mysqli_query($link,"select* from users where user_name='$a'");
$result=mysqli_fetch_array($res);

if($result)
{
	if(password_verify($b, $result['user_pw']))
	{
		if(isset($_REQUEST["remember"]) && $_REQUEST["remember"]==1)
		setcookie("login","1",time()+60);// second on page time 

		else
			setcookie("login","1");
			header("location:index.php");
	}
	else
		header("location:login.php?err=1");	
}
else
{
	header("location:login.php?err=1");
	
}
}





/*
$res = mysqli_query($link,"select* from users where user_name='$a'and user_pw='b'");
$result=mysqli_fetch_array($res);
if($result)
{
	if(isset($_REQUEST["remember"]) && $_REQUEST["remember"]==1)
	setcookie("login","1",time()+60);// second on page time 
else
	setcookie("login","1");
	header("location:db.php");
	
	
}
else
{
	header("location:login.php?err=1");
	
}
}*/
?>