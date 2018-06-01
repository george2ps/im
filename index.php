<?php 
include('session.php');
include('home_page_server.php');
?>
<!doctype html>

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Insurance Manager</title>
<link rel="stylesheet" href="style/homePage.css" type="text/css">
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","get_user.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>


<body>
	
		<nav id="navBarDiv">
			<div id="logoutDiv">
			<a href="logout.php"><img style="width: 28px; height: 30px; padding: 10px;" src="style/images/logout.png"></a>
			</div>
			
			<div style="padding: 5px;" id="userLoggedInDiv">
				<img id="profilePictureOfLoggedInUser" src="<?php echo $profilePicture; ?>">
				
				<span id="nameOfUserLoggedIn"><?php echo $firstname." ".$lastname; ?></span>
			</div>
		</nav>
	<br><br><br>
	<div id="mainContainer">
			<div id="clientListDiv" style="float: left;  overflow-y: scroll; height: 100%; width: 300px; position: fixed; background-color:#D7D7D7; padding-top: 20px; z-index: 1">
				<center><input style="width: 85%; border-radius: 5px; border: 0.5px solid black; padding: 5px;" type="text" placeholder="Search clients"></center>
				<br>
			
			<?php 
				for($i=$arrayLength-1; $i>=0; $i--){
				echo($clientArray[$i]);
				}
			?>
<!--<div id="clientNameDiv" onClick="showUser('tony@gmail.com')" style="padding: 5px; border-top: 1px solid black;">
<img  src="user_profile_pictures/default.png">
<span style=" padding: 15px; float: right; margin-right: 40px;">Antonis Papayiannis</span>
</div>-->
			</div>
			<div style="margin-left: 300px; border: 1px solid green; height: 60px; padding:15px;">
				<button class="clientButtons">New Client+</button>
				<button class="clientButtons">Edit Client</button>
				<button class="clientButtons">Appointment</button>
				
			</div>
			<div id="txtHint" style="margin-left: 300px; border: 1px solid red; padding: 70px;">
				<center><img style="opacity: 0.3; width: 350px;" src="style/images/cypro_transparent_logo.png"></center>
				<!--<img id="profilePictureOfSelectedClient" src="">
				<span id="nameOfSelectedClient">George Sofroniou</span><br><br><br><br><br>
				<p id="infoOfSelectedClient">Email:<span>george.sofroniou15@gmail.com</span></p>-->
			</div>
	</div>
	
	<br><br><br>
</body>
</html>
