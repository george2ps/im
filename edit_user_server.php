<?php 
session_start();
	$servername = "localhost";
	$usernameDb = "georgeSofroniou";
	$password = "";
	$db = "im_db";

// Create connection
	$conn = new mysqli($servername, $usernameDb, $password, $db);
	
	$username = $_SESSION['login_user'];

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
	$currentClientEmail = $_SESSION['clientCurrentEmail'];
	$htmlElement = '<div id="'.$email.'" class="clientNameDiv" onClick="showUser('.$email1.'), showEditButton('.$email1.')" style="padding: 5px; border-top: 1px solid black;">
	<img class="clientProfilePictureDiv" src="user_profile_pictures/default.png">
	<span style="float:right; padding:15px; position:absolute;  margin-right: 40px;">'.$firstname.' '. $lastname.'</span>
	</div>';

	$query5 = mysqli_query($conn, "UPDATE client_info SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phoneNumber', address_1='$address', address_2='$addressTwo', city='$city', post_code='$postCode', dob='$dob', html_element='$htmlElement' WHERE insurer_email='$username' AND email='$currentClientEmail'");

	header("location: index.php");
?>