<?php 

	$servername = "localhost";
	$usernameDb = "georgeSofroniou";
	$password = "";
	$db = "im_db";

// Create connection
	$conn = new mysqli($servername, $usernameDb, $password, $db);
	
	$username = $_SESSION['login_user'];
	
	$query = mysqli_query($conn, "select firstname, lastname, profile_picture from user_info where email='$username'");

	
	
	$row = mysqli_fetch_assoc($query);
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$profilePicture = $row['profile_picture'];
	$clientFirstnameArray = array();
	$query2 = mysqli_query($conn, "select firstname from client_info where insurer_email='$username'");

	while($row3 = mysqli_fetch_array($query2, MYSQLI_ASSOC)){
		$clientFirstnameArray[] = $row3['firstname'];
	}
	rsort($clientFirstnameArray);
	$arrayL= count($clientFirstnameArray);
	$clientArray =array();
	for($i=0; $i<$arrayL; $i++){
		$query3 = mysqli_query($conn, "select html_element from client_info where insurer_email='$username' AND firstname='$clientFirstnameArray[$i]'");
		$row2 = mysqli_fetch_array($query3, MYSQLI_ASSOC);
		$clientArray[] = $row2['html_element'];
	}
	$arrayLength = count($clientArray);
?>