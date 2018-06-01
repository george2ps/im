<?php
session_start();
	$servername = "localhost";
	$usernameDb = "georgeSofroniou";
	$password = "";
	$db = "im_db";

// Create connection
	$conn = new mysqli($servername, $usernameDb, $password, $db);

	$email=$_POST['email'];
	$password=$_POST['password'];
	
	$query = mysqli_query($conn, "select * from user_info where password='$password' AND email='$email'");
	
	$rows = mysqli_fetch_array($query);
	if ($rows) {
	$_SESSION['login_user']=$email; // Initializing Session
	header("location: index.php"); // Redirecting To Other Page
	} else {
	echo "Username or Password is invalid";
	}

?>