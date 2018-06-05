<?php
session_start();
	$servername = "localhost";
	$usernameDb = "georgeSofroniou";
	$password = "";
	$db = "im_db";

// Create connection
	$conn = new mysqli($servername, $usernameDb, $password, $db);
	
	$username = $_SESSION['login_user'];
	if($username){
	
	$email=$_POST['clientEmail'];
	$email1 = "\'".$email."\'";
	$firstname=$_POST['clientFirstname'];
	$lastname=$_POST['clientLastname'];
	$phoneNumber=$_POST['clientPhone'];
	$htmlElement = '<div class="clientNameDiv" onClick="showUser('.$email1.'), showEditButton('.$email1.')" style="padding: 5px; border-top: 1px solid black;">
	<img src="user_profile_pictures/default.png">
	<span style="float:right; padding:15px;   margin-right: 40px;">'.$firstname.' '. $lastname.'</span>
	</div>';

	$query5 = mysqli_query($conn, "INSERT INTO client_info (insurer_email, firstname, lastname, email, html_element) VALUES ('$username', '$firstname',  '$lastname', '$email', '$htmlElement')");
	
	header("location: registrationSuccess.html");
	}else{
		header("location: login.php");
	}
?>