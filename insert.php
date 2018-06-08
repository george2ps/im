<?php
session_start();

	$servername = "localhost";
	$usernameDb = "georgeSofroniou";
	$password = "";
	$db = "im_db";

// Create connection
$connect = new PDO('mysql:host=localhost;dbname=im_db', 'georgeSofroniou', '');	$username = $_SESSION['login_user'];
//insert.php


if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO events 
 (insurer_email,title, start_event, end_event) 
 VALUES ('$username',:title, :start_event, :end_event)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
}


?>