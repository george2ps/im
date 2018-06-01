<?php
session_start(); 
	$servername = "localhost";
	$usernameDb = "georgeSofroniou";
	$password = "";
	$db = "im_db";

	$conn = new mysqli($servername, $usernameDb, $password, $db);

	$email=$_POST['email'];
	$password=$_POST['password'];
	$passwordConf=$_POST['passwordConf'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$phoneNumber=$_POST['phone'];	

	$query = mysqli_query($conn, "INSERT INTO user_info (firstname, lastname, email, password, password_confirmation, phone) VALUES ('$firstname', '$lastname', '$email', '$password', '$passwordConf', '$phoneNumber')");

	header("location: registrationSuccess.php");


?>