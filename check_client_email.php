<?php

$servername = "localhost";
	$usernameDb = "georgeSofroniou";
	$password = "";
	$db = "im_db";

// Create connection
	$conn = new mysqli($servername, $usernameDb, $password, $db);

/* Get username */
$uname = $_POST['uname'];

/* Query */
$query = "select count(*) as cntUser from client_info where email='".$uname."'";

$result = mysqli_query($conn,$query);

$row = mysqli_fetch_array($result);

$count = $row['cntUser'];

echo $count;
?>