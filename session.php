<?php 
	
	session_start();// Starting Session
	
	if(isset($_SESSION['login_user'])){

	}
	else{
		header("location: login.php");
	}

?>