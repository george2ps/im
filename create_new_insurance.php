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

	echo '<h1>New Insurance</h1>
				<form id="newInsuranceForm" action="create_new_insurance_server.php" method="post">
					<table>
						<tbody>
						<td>
							<tr>
								<input class="newClientInputs" type="text" placeholder="Insurance Type" name="clientInsuranceType"><span></span>
								<input class="newClientInputs" type="text" placeholder="Insurance Details" name="clientInsuranceDetails"><span> </span>
								<input class="newClientInputs" type="date" placeholder="Start Date" name="clientInsStartDate" required><span> </span>
								<input class="newClientInputs" type="date" name="clientInsEndDate" required>
							</tr><br><br>
							<tr>
								<input class="newClientInputs" type="text" placeholder="Price" name="clientInsPrice" required><span> </span>
							</tr>
						</td>
						</tbody>
					</table>
					<input class="loginInputsButton" type="submit" value="Create Insurance">
				</form>
?>