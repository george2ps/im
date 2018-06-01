<?php 
	$q = $_GET['q'];
	$servername = "localhost";
	$usernameDb = "georgeSofroniou";
	$password = "";
	$db = "im_db";

// Create connection
	$conn = new mysqli($servername, $usernameDb, $password, $db);
	
	$query = mysqli_query($conn, "SELECT * FROM client_info WHERE email='$q'");
	$row = mysqli_fetch_assoc($query);
	$result = $row['email'];
	$result2 = $row['firstname'];
	$result3 = $row['lastname'];
	$result4 = $row['client_profile_picture'];
	


	echo "<img id='profilePictureOfSelectedClient' src='".$result4."'>
				<span id='nameOfSelectedClient'>".$result2.' '. $result3."</span><br><br><br><br><br>
				<p id='infoOfSelectedClient'>Email: <span>".$result."</span></p>";
?>