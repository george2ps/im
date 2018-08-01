<?php 
	$q = $_GET['q'];
	$servername = "localhost";
	$usernameDb = "georgeSofroniou";
	$password = "";
	$db = "im_db";

// Create connection
	$conn = new mysqli($servername, $usernameDb, $password, $db);
	
	$query = mysqli_query($conn, "SELECT * FROM client_info WHERE email='$q'");
	$row = mysqli_fetch_assoc($query);
	$result = $row['email'];
	$result2 = $row['firstname'];
	$result3 = $row['lastname'];
	$result4 = $row['client_profile_picture'];
	


	echo "<img id='profilePictureOfSelectedClient' src='".$result4."'>
				<span id='nameOfSelectedClient'>".$result2.' '. $result3."</span><br><br><br><br><br><br>
		<div style='overflow-x:auto;'>
  <table id='client_insurance_details_table'>
    <tr>
      <th>Insurance Type</th>
      <th>Insurance Details</th>
      <th>Date Created</th>
      <th>Expiry Date</th>
      <th>Price</th>
      <th>Poso Xoflisis</th>
      <th>Poso Apomeni</th>
    </tr>
    <tr>
      <td>CAR</td>
      <td>KKK123</td>
      <td>12/03/18</td>
      <td>12/03/19</td>
      <td>€120</td>
      <td>€70</td>
      <td>€50</td>
    </tr>
    <tr>
      <td>HOUSE</td>
      <td>Florinis 12</td>
      <td>06/12/18</td>
      <td>06/12/19</td>
      <td>€200</td>
      <td>€120</td>
      <td>€80</td>
    </tr>
  </table>
</div>";
?>