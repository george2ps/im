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
	$clientPhoneNumber=$row['phone'];
	$clientAddress=$row['address_1'];
	$clientAddressTwo=$row['address_2'];
	$clientCity=$row['city'];
	$clientPostCode=$row['post_code'];
	$clientdob=$row['dob'];
echo '<h1>Edit Client</h1>
				<form id="editUserForm" action="edit_user_server.php" method="post">
					<table>
						<tbody>
						<td>
							<tr>
								<input class="newClientInputs" type="text" placeholder="Firstname" name="clientFirstname" value="'.$clientFirstname.'"><span> </span>
								<input class="newClientInputs" type="text" placeholder="Lastname" name="clientLastname" value="'.$clientLastname.'"><span> </span>
								<input class="newClientInputs" type="email" placeholder="Email address" name="clientEmail" value="'.$clientEmail.'" readonly><span> </span>
								<input class="newClientInputs" type="tel" value="'.$clientPhoneNumber.'" name="clientPhone" required>
							</tr><br><br>
							<tr>
								<input class="newClientInputs" type="text" value="'.$clientAddress.'" name="clientAddress" required><span> </span>
								<input class="newClientInputs" type="text" value="'.$clientAddressTwo.'" name="clientAddressTwo" ><span> </span>
								<input class="newClientInputs" type="text" value="'.$clientCity.'" name="clientCity" required>
								<span> </span>
								<input class="newClientInputs" type="text" value="'.$clientPostCode.'" name="clientPostCode" required>
							</tr><br><br>
							<tr>
								<input class="newClientInputs" type="text" value="'.$clientdob.'" name="clientDOB" required>
							</tr>
						</td>
						</tbody>
					</table>
					<input class="loginInputsButton" type="submit" value="Save">
				</form>
				<br>
					<button class="clientButtons" style=" color:white; background-color:red; width:210px; font-weight:bold;" onClick="deleteClient(\''.$email1.'\')">Delete Client</button>
	';
	?>