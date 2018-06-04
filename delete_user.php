<?php 
session_start();
	$e = $_GET['e'];
	$servername = "localhost";
	$usernameDb = "georgeSofroniou";
	$password = "";
	$db = "im_db";

// Create connection

	$conn = new mysqli($servername, $usernameDb, $password, $db);
	$username = $_SESSION['login_user'];
	$query = mysqli_query($conn, "DELETE FROM client_info WHERE email='$e'");
	echo "<h3>The client has been deleted</h3>";
	
?>