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
<link rel="stylesheet" href="style/loginPage.css" type="text/css">
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script>
function showUser(str) {
		var x = document.getElementsByClassName("clientNameDiv");
		var i;
		for (i = 0; i < x.length; i++) {
    	x[i].style.backgroundColor = "transparent";
		}
		document.getElementById(str).style.backgroundColor="aliceblue";

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

	
function showEditButton(str) {
  document.getElementById("editClientButton").setAttribute("onClick", "editClient(\'"+str+"\')");
 document.getElementById("editClientButton").disabled = false;
}
	
function deleteClient(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
if(confirm("Are you sure you want to delete the client?")){
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
  xmlhttp.open("GET","delete_user.php?e="+str,true);
  xmlhttp.send();
$(document).ready(function () {
    // Handler for .ready() called.
    window.setTimeout(function () {
        location.href = "index.php";
    }, 2000);
});
}
}
	
function editClient(str) {
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
  xmlhttp.open("GET","edit_user.php?e="+str,true);
  xmlhttp.send();
}
	

	
$(document).ready(function(){
			$("#newClientButton").click(function(){
				$("#newClientFormDiv").fadeIn("slow");
				$("#txtHint").hide();
				document.getElementById("editClientButton").disabled = true;
				var x = document.getElementsByClassName("clientNameDiv");
		var i;
		for (i = 0; i < x.length; i++) {
    	x[i].style.backgroundColor = "transparent";
		}
			});
		
	
	$(".clientNameDiv").click(function(){
				$("#newClientFormDiv").hide();
				$("#txtHint").fadeIn("fast");
			});
		});
	
$(document).ready(function(){
   $(".clientEmail").keyup(function(){

      var uname = $(".clientEmail").val().trim();

      if(uname != ''){

         $(".uname_response").show();

         $.ajax({
            url: 'check_client_email.php',
            type: 'post',
            data: {uname:uname},
            success: function(response){

                if(response > 0){
                    $(".uname_response").html("<span style='color:red; font-weight:bold;'>*Email Already in use.</span>");
					document.getElementById("registerNewClientButton").disabled = true;	 			document.getElementById("registerNewClientButton").style="opacity:0.5;";
					
                }else{
                    $(".uname_response").html("<span style='color:green; font-weight:bold;'>Available</span>");
					document.getElementById("registerNewClientButton").disabled = false;	 			document.getElementById("registerNewClientButton").style="opacity:1;";
                }

             }
          });
      }else{
         $(".uname_response").hide();
      }

    });

 });

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
			<div id="clientListDiv" style="float: left;  overflow-y: scroll; height: 90%; width: 300px; position: fixed; background-color:#D7D7D7; padding-top: 20px; z-index: 1">
				<center><input id="search_text" style="width: 85%; border-radius: 3px; border: 0.5px solid #858585; padding: 7px;" type="text" placeholder="Search clients"></center>
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
			<div style="margin-left: 300px; height: 40px; padding:15px;">
				<button id="newClientButton" class="clientButtons">New Client+</button>
				<button id="editClientButton" class="clientButtons" onClick="editClient()" disabled>Edit Client</button>
				<button class="clientButtons">Appointment</button>
				
			</div>
			<div id="newClientFormDiv" style="margin-left: 300px;  padding:15px; padding-top: 0px; display: none;">
				<h1>New Client</h1>
				<form action="client_registration_server.php" method="post">
					<table>
						<td>
							<tr>
								<input class="newClientInputs" type="text" placeholder="Firstname" name="clientFirstname" required><span> </span>
								<input class="newClientInputs" type="text" placeholder="Lastname" name="clientLastname" required><span> </span>
								<input class="newClientInputs clientEmail" type="email" placeholder="Email address" name="clientEmail" required><span class="uname_response"></span></input>
								<span> </span>
								<input class="newClientInputs" type="tel" placeholder="Phone Number" name="clientPhone" required>
							</tr>
						</td>
						
					</table>
					<input id="registerNewClientButton" class="loginInputsButton" type="submit" value="Submit">
				</form>
				
				
				
			</div>
			<div id="txtHint" style="margin-left: 300px; padding: 20px; padding-top: 0px;">
				<center><img style="opacity: 0.3; width: 350px;" src="style/images/im_logo.png"></center>
				
				<!--<img id="profilePictureOfSelectedClient" src="">
				<span id="nameOfSelectedClient">George Sofroniou</span><br><br><br><br><br>
				<p id="infoOfSelectedClient">Email:<span>george.sofroniou15@gmail.com</span></p>-->
			</div>
		
	</div>
	
	<br><br><br>
</body>
</html>
