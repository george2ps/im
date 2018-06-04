<?php 
session_start();
	$e = $_GET['e'];
	$servername = "localhost";
	$usernameDb = "georgeSofroniou";
	$password = "";
	$db = "im_db";

// Create connection
	$conn = new mysqli($servername, $usernameDb, $password, $db);
	$username = $_SESSION['login_user'];
	
$query = mysqli_query($conn, "SELECT * FROM client_info WHERE email='$e' AND insurer_email='$username' ");
	$row = mysqli_fetch_assoc($query);
	$clientEmail = $row['email'];
	$_SESSION['clientCurrentEmail'] = $clientEmail;
	$email1 = $clientEmail;
	$clientFirstname = $row['firstname'];
	$clientLastname = $row['lastname'];

echo '<h1>Edit Client</h1>
				<form action="edit_user_server.php" method="post">
					<table>
						<td>
							<tr>
								<input class="newClientInputs" type="text" placeholder="Firstname" name="clientFirstname" value="'.$clientFirstname.'"><span> </span>
								<input class="newClientInputs" type="text" placeholder="Lastname" name="clientLastname" value="'.$clientLastname.'"><span> </span>
								<input class="newClientInputs" type="email" placeholder="Email address" name="clientEmail" value="'.$clientEmail.'"><span> </span>
							</tr>
						</td>
						
					</table>
					<input class="loginInputsButton" type="submit" value="Save">
				</form>
				<br>
					<button class="clientButtons" style=" color:red; width:210px; font-weight:bold;" onClick="deleteClient(\''.$email1.'\')">Delete Client</button>
	';
	?>