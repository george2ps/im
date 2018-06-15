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
<link rel="stylesheet" href="style/homePage.css" type="text/css" version="3">
<link rel="stylesheet" href="style/loginPage.css" type="text/css" version="3">
<link rel="stylesheet" href="style/fullcalendar.css" type="text/css" version="3">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/vex-js/4.1.0/css/vex.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/vex-js/4.1.0/css/vex-theme-os.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/vex-js/4.1.0/js/vex.combined.min.js"></script>
<script>vex.defaultOptions.className = 'vex-theme-os'</script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
	
<script>

$(document).ready(function() {
	var title
   	var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    events: 'load.php',
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {
	  var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");	
	vex.dialog.prompt({
    message: 'Enter event name',
    placeholder: 'Event name',
    callback: function (value) {
        title = value;
		if(title){
		 	$.ajax({
       		url:"insert.php",
       		type:"POST",
       		data:{title:title, start:start, end:end},
       		success:function()
       			{
        		calendar.fullCalendar('refetchEvents');
       	
       			}
      		})
		}
    }
})
     
    },
    editable:true,
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       
      }
     })
    },

    eventDrop:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
      }
     });
    },

    eventClick:function(event)
    {
		vex.dialog.confirm({
    message: 'Are you sure you want to delete this event?',
    callback: function (value) {
        var x = value;
		if(x)
     {
      var id = event.id;
      $.ajax({
       url:"delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        
       }
      })
     }
    }
})
     
    },

   });
  });	
//Shows client info when you click on client
function showUser(str) {
		document.getElementById("clientButtonDiv").style.display="inherit";
		var x = document.getElementsByClassName("clientNameDiv");
		var i;
		for (i = 0; i < x.length; i++) {
    	x[i].style.backgroundColor = "transparent";
		}
		document.getElementById(str).style.backgroundColor="aliceblue";
		document.getElementById("txtHint").style.display="inherit";
	
		var x = screen.width;
		if(x<600){
		document.getElementById("clientListDiv").style.display="none";
		}

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

//changes edit button to edit the selected client	
function showEditButton(str) {
  document.getElementById("editClientButton").setAttribute("onClick", "editClient(\'"+str+"\')");
 document.getElementById("editClientButton").disabled = false;
}
//delete client button function	
function deleteClient(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
	vex.dialog.confirm({
    message: 'Are you sure you want to delete the client?',
    callback: function (value) {
        var booleanConfirm = value;
		if(booleanConfirm){
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
	}})

}

//gets the info of the selected client to put the values into the text boxes of edit client	
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
				$("#clientButtonDiv").hide();
				$("#newClientFormDiv").fadeIn("slow");
				$("#calendarEventDiv").hide();
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
				$("#calendarEventDiv").hide();
				$("#txtHint").fadeIn("fast");
			});
		
	$("#calendarButton").click(function(){
				$("#newClientFormDiv").hide();
				$("#clientButtonDiv").hide();
				$("#txtHint").hide();
				$("#calendarEventDiv").fadeIn("fast");
				var x = document.getElementsByClassName("clientNameDiv");
				var i;
				for (i = 0; i < x.length; i++) {
    			x[i].style.backgroundColor = "transparent";
				}
		
			});
		
	$("#menuIconResponsiveDiv").click(function(){
				$("#navBarMobile").fadeIn("fast");
				
			});
	$("#newClientButtonMobile").click(function(){
				$("#navBarMobile").hide();
				$("#txtHint").hide();
				$("#calendarEventDiv").hide();
				$("#clientListDiv").hide();
				$("#clientButtonDiv").hide();
				$("#newClientFormDiv").fadeIn("fast");
				
				
			});
	
	$("#clientListButton").click(function(){
				$("#navBarMobile").hide();
				$("#txtHint").hide();
				$("#newClientFormDiv").hide();
				$("#clientButtonDiv").hide();
				$("#calendarEventDiv").hide();
				$("#clientListDiv").fadeIn("fast");
				
			});
	
	$("#calendarListButton").click(function(){
				$("#navBarMobile").hide();
				$("#newClientFormDiv").hide("fast");
				$("#clientButtonDiv").hide();
				$("#clientListDiv").hide();
				$("#txtHint").hide();
				$("#calendarEventDiv").fadeIn("fast");
				
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
			<a href="logout.php"><img style="width: 23px; height: 25px; padding: 15px;" src="style/images/logout.png"></a>
		</div>
		<div id="menuIconResponsiveDiv">
			<img id="menuIconResponsive" class="profilePictureOfLoggedInUser" src="style/images/menu-icon.png">
		</div>
		<div style="padding: 5px;" id="userLoggedInDiv">
			<img class="profilePictureOfLoggedInUser" src="<?php echo $profilePicture; ?>">
			<span id="nameOfUserLoggedIn"><?php echo $firstname." ".$lastname; ?>&emsp;&emsp;&emsp;</span>
			<div style="padding: 5px;">
				<button id="calendarButton"  style="font-weight: bold; width: 50px; background-color: transparent; border: 0; cursor: pointer;"><img src="style/images/calendarButton.png" style="width: 30px;"></button>
			</div>
		</div>
	</nav>
	
	<div id="navBarMobile">
		<br>
		<center><img style="width: 100px;" src="<?php echo $profilePicture; ?>"></center>
		<span id="nameOfUserLoggedIn" style="padding-left: 50px;"><?php echo $firstname." ".$lastname; ?></span><br><br>
		<ul style="color: white; margin: 0; padding: 0;">
			<li id="clientListButton" style="border-top: 1px solid #282828; border-bottom: 1px solid #282828; background-color: black;list-style-type: none;  padding: 10px; margin: 0;">Clients</li>
			<li id="calendarListButton" style="border-top: 1px solid #282828; border-bottom: 1px solid #282828; background-color: black;list-style-type: none;  padding: 10px; margin: 0;">Calendar</li>
		</ul>
	</div>
	<br><br><br>
	<div id="mainContainer">
		<div id="clientListDiv">
			<center>
				<button id="newClientButtonMobile" class="clientButtons clientButtonsMobile">New Client</button>
				<button id="billsSortButton" class="clientButtons clientButtonsMobile">Bills</button>
				<button id="insuranceSortButton" class="clientButtons clientButtonsMobile">Types</button>
				<button id="renewalsSortButton" class="clientButtons clientButtonsMobile">Renewals</button>
			<table>
				<td>
					<tr>
						<button id="newClientButton" class="clientButtons clientButtonsNotResponsive">New Client+</button>
				&emsp;
						<button id="billsSortButton" class="clientButtons clientButtonsNotResponsive">Bills</button><br><br>
					</tr>
				</td>
				<td>
					<tr>
			<button id="insuranceSortButton" class="clientButtons clientButtonsNotResponsive">Types</button>
				&emsp;
			<button id="renewalsSortButton" class="clientButtons clientButtonsNotResponsive">Renewals</button>
						</tr>
				</td>
			</table>	
			</center><br>
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
		<div id="clientButtonDiv">
			<button class="clientButtons">New Insurance</button>
			<button class="clientButtons">Payments</button>
			<button class="clientButtons">Balance</button>
			<button id="editClientButton" class="clientButtons" onClick="editClient()">Edit Client</button>

				
		</div>
			<div id="newClientFormDiv">
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
			<div id="txtHint">
				
				
				<!--<img id="profilePictureOfSelectedClient" src="">
				<span id="nameOfSelectedClient">George Sofroniou</span><br><br><br><br><br>
				<p id="infoOfSelectedClient">Email:<span>george.sofroniou15@gmail.com</span></p>-->
			</div>
			<center>
				<div id="calendarEventDiv" style=" padding-top: 15px;">
					<div id="calendarDiv">
						<div id="calendar"></div>
					</div>
					<div id="eventListDiv">
						<h3>Next Apointment</h3>
					</div>
				</div></center>
	</div>
	
	<br><br><br>
</body>
</html>
