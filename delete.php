<?php

//delete.php
session_start();
	
	$servername = "localhost";
	$usernameDb = "georgeSofroniou";
	$password = "";
	$db = "im_db";

// Create connection
$connect = new PDO('mysql:host=localhost;dbname=im_db', 'georgeSofroniou', '');		$username = $_SESSION['login_user'];

if(isset($_POST["id"]))
{
$connect = new PDO('mysql:host=localhost;dbname=im_db', 'georgeSofroniou', '');	
 $query = "
 DELETE from events WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>