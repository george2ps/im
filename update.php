<?php

//update.php

session_start();
	
	$servername = "localhost";
	$usernameDb = "georgeSofroniou";
	$password = "";
	$db = "im_db";

// Create connection
$connect = new PDO('mysql:host=localhost;dbname=im_db', 'georgeSofroniou', '');		$username = $_SESSION['login_user'];

if(isset($_POST["id"]))
{
 $query = "
 UPDATE events 
 SET title=:title, start_event=:start_event, end_event=:end_event 
 WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':id'   => $_POST['id']
  )
 );
}

?>