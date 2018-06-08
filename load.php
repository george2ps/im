<?php
session_start();
	
	$servername = "localhost";
	$usernameDb = "georgeSofroniou";
	$password = "";
	$db = "im_db";

// Create connection
$connect = new PDO('mysql:host=localhost;dbname=im_db', 'georgeSofroniou', '');		$username = $_SESSION['login_user'];
//load.php


$data = array();

$query = "SELECT * FROM events WHERE insurer_email='$username'";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}

echo json_encode($data);

?>