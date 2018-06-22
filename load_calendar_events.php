<?php
	session_start();
	$servername = "localhost";
	$usernameDb = "georgeSofroniou";
	$password = "";
	$db = "im_db";

// Create connection
	$conn = new mysqli($servername, $usernameDb, $password, $db);
	
	$username = $_SESSION['login_user'];
	$currentDate = date('Y-m-d H:i:s');
	$query = mysqli_query($conn, "SELECT * FROM events WHERE insurer_email = '$username' AND start_event >= '$currentDate'");
	
	$eventsArrayTitle = array();
	$eventsArrayStart = array();
	
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
		$eventsArrayTitle[] = $row['title'];
		$eventsArrayStart[] = $row['start_event'];
		
	}
	$arrayLength = count($eventsArrayTitle);
	sort($eventsArrayStart);
	for($i=0; $i<$arrayLength; $i++){
				echo($eventsArrayTitle[$i]);
				$d = $eventsArrayStart[$i];
				$date = date_create($d);
				echo "<br>";
				echo date_format($date,"d M H:i a");
				echo "<br><br>";
				}

?>