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
	$address=$_POST['clientAddress'];
	$addressTwo=$_POST['clientAddressTwo'];
	$city=$_POST['clientCity'];
	$postCode=$_POST['clientPostCode'];
	$dob=$_POST['clientDOB'];
	$htmlElement = '<div id="'.$email.'" class="clientNameDiv" onClick="showUser('.$email1.'), showEditButton('.$email1.')" style="padding: 5px; border-top: 1px solid black;">
	<img class="clientProfilePictureDiv" src="user_profile_pictures/default.png">
	<span style="float:right; padding:15px; position:absolute;   margin-right: 40px;">'.$firstname.' '. $lastname.'</span>
	</div>';

	$query5 = mysqli_query($conn, "INSERT INTO client_info (insurer_email, firstname, lastname, email, phone, address_1, address_2, city, post_code, dob, html_element) VALUES ('$username', '$firstname',  '$lastname', '$email','$phoneNumber','$address','$addressTwo','$city','$postCode','$dob', '$htmlElement')");
	
		
	}else{
		header("location: login.php");
	}
?>