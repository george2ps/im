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
	echo '<span style="font-size:16pt; font-weight:bold;">Deleting Client </span><span><img src="style/images/loader.gif" alt="loader" style="width: 20px;"></span>';
	
?>