<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Insurance Manager</title>
	<link type="text/css" href="style/loginPage.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
</head>

	<script>
		$(document).ready(function(){
			$("button").click(function(){
				$("#signUpFormDiv").fadeIn("fast");
				$("#signInFormDiv").hide();
				$("#signUpButton").hide();
			});
		});
		
		
	</script>
<body>
	
	<center><br>
	<h1 style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, 'sans-serif'">Insurance Manager</h1>
	<div id="mainContainer" style="padding-top: 100px;">
	<div id="signInFormDiv">
		<form action="login_server.php" method="post">
			<input class="loginInputs" type="text" placeholder="Email" name="email" required><br>
			<input class="loginInputs" type="password" placeholder="Password" name="password" required><br>
			<input class="loginInputsButton" type="submit" value="Login"><br><br>
			<button style="border: 0; cursor: pointer; text-decoration: underline; color: blue;" id="signUpButton" type="button">Sign up</button>
		</form>
	</div>
	
	
	
	<div id="signUpFormDiv" style="display: none;">
		<form action="signup_server.php" method="post">
			<input class="loginInputs" name="firstname" type="text" placeholder="Firstname" required><br>
			<input class="loginInputs" name="lastname" type="text" placeholder="Lastname" required><br>
			<input class="loginInputs" name="email" type="email" placeholder="Email address" required><br>
			<input class="loginInputs" name="password" type="password" placeholder="Password" required><br>
			<input class="loginInputs" name="passwordConf" type="password" placeholder="Confirm Password" required><br>
			<input class="loginInputs" name="phone" type="tel" placeholder="Phone Number"><br>
			<input class="loginInputsButton" type="submit" value="Sign Up">
		</form>
	</div>
	</div>
	</center>
	
	
	
	
</body>
	<div>
	<center>
		<footer style=" margin-bottom: 5px; display: block; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, 'sans-serif'">
			Copyright © 2018 <img style="width: 15px;" src="style/images/cypro_transparent_logo.png"> Cypro
		</footer>
	</center>
	</div>
</html>