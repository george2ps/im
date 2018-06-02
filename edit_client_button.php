<?php
$e = $_GET['e'];
$email = "\'".$e."\'";
	echo '<button id="editClientButton" class="clientButtons" onClick="showUser('.$email.')>Edit Client</button>';

	

?>