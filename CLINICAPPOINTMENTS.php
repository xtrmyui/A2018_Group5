<?php
 session_start();
 date_default_timezone_set("Asia/Manila");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petvaccination";
$conn = mysqli_connect($servername, $username, $password, $dbname);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}else{
	if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
		
		header("Location: SIGN-IN.php?loginfirst");
		exit();
	}else{
		if($_SESSION["Acc"]!="ClinicOwner"){
			header("Location: SIGN-IN.php?loginfirst");
		exit();
		}
	}
}
if (isset($_GET['AcceptAppointment'])) {
    UpdateAppointmentAccept();
	}
	function UpdateAppointmentAccept(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "petvaccination";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$id = $_COOKIE['AppointmentID'];
		$sql = "UPDATE `appointments` SET `RequestStatus`='".$message."'  WHERE AppointmentID='".$id."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

$conn->close();
	}
if (isset($_GET['DeclineAppointment'])) {
    UpdateAppointmentDecline();
	}
	function UpdateAppointmentDecline(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "petvaccination";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$id = $_COOKIE['AppointmentID'];
		$to = $_COOKIE['ToName'];
		$toID = $_COOKIE['ReceiverID'];
		$message = addslashes($_COOKIE['RejectMessage']);
		$sql = "UPDATE `appointments` SET
		`RequestStatus`='Cancelled', `RejectResponse`='".$message."' WHERE AppointmentID='".$id."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}
		$Sender = $_SESSION["NAME"];
		$SenderID = $_SESSION["ID"];
		$message = addslashes($_COOKIE['RejectMessage']);
		$toName = $_COOKIE['ToName'];
		$toID = $_COOKIE['ReceiverID'];
		$Date = date("Ymd");
		$Time = date("His");
		$DateTimeSort= $Date ." ".$Time;
		$MID = $Sender[0]. date("Ymd").$toName[0]. date('His');
		$sql = "INSERT INTO `messages`(`FromName`, `SenderID`, `ToName`, `ReceiverID`, `Message`, `Date`, `Time`,`DateTimeSort`, `MessageID`, `Seen`) VALUES 
		('".$Sender."','".$SenderID."','".$toName."','".$toID."','".$message."','".$Date."','".$Time."','".$DateTimeSort."','".$MID."','Unseen')";
				
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

$conn->close();
	}
	if (isset($_GET['MarkasDone'])) {
    UpdateAppointment();
	}
	function UpdateAppointment(){
		$ID = $_COOKIE['ID'];
		$sql = "UPDATE `appointments` SET `AppoinmentStatus`='Done' WHERE AppointmentID='".$ID."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}
	}
?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Vaccine Report</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="CLINICAPPOINTMENTS.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.4.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
	
	.card {
  width: 250px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;
}
	</style>
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="APPOINTMENTS">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body u-xl-mode"><header class="u-clearfix u-header u-palette-1-base u-header" id="sec-c7a2"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="letter-spacing: 0px; font-size: 1.25rem; font-weight: 700;">
            <a class="u-button-style u-custom-active-color u-custom-left-right-menu-spacing u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-nav-link" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-0173"></use></svg>
              <svg class="u-svg-content" version="1.1" id="svg-0173" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="CLINICDASHBOARD.php" style="padding: 10px 14px;">DASHBOARD</a>
</li><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="CLINICAPPOINTMENTS.php" style="padding: 10px 14px;">APPOINTMENTS</a>
</li><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="CLINICMESSAGES.php" style="padding: 10px 14px;">MESSAGES</a>
</li><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="MY-CLINIC.php" style="padding: 10px 14px;">MY CLINIC and REPORTS</a>
</li><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="LOGOUT.php"  style="padding: 10px 14px;">LOGOUT</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="CLINICDASHBOARD.php" style="padding: 10px 14px;">DASHBOARD</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="CLINICAPPOINTMENTS.php" style="padding: 10px 14px;">APPOINTMENTS</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="CLINICMESSAGES.php" style="padding: 10px 14px;">MESSAGES</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="MY-CLINIC.php" style="padding: 10px 14px;">MY CLINIC and REPORTS</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="LOGOUT.php" style="padding: 10px 14px;">LOGOUT</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-align-center u-clearfix u-section-1" id="sec-129c">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-expanded-width u-table u-table-responsive u-table-1">
          <table class="u-table-entity u-table-entity-1">
            <colgroup>
              <col width="18.28%">
              <col width="13.28%">
              <col width="10.28">
              <col width="12.28%">
              <col width="14.28%">
              <col width="14.28%">
              <col width="14.28%">
              <col width="17.28%">
            </colgroup>
            <thead class="u-align-center u-palette-4-base u-table-header u-table-header-1">
              <tr style="height: 32px;">
                <th class="u-border-1 u-border-palette-4-base u-table-cell">OWNER NAME</th>
                <th class="u-border-1 u-border-palette-4-base u-table-cell">DATE</th>
                <th class="u-border-1 u-border-palette-4-base u-table-cell">TIME</th>
                <th class="u-border-1 u-border-palette-4-base u-table-cell">PET NAME</th>
                <th class="u-border-1 u-border-palette-4-base u-table-cell">CASE</th>
                <th class="u-border-1 u-border-palette-4-base u-table-cell">SERVICE TYPE</th>
                <th class="u-border-1 u-border-palette-4-base u-table-cell">RESPOND</th>
                <th class="u-border-1 u-border-palette-4-base u-table-cell">ACTION</th>
              </tr>
            </thead>
            <tbody class="u-table-body">
			<?php
				$ID = $_SESSION["ID"];
				$sql = "SELECT * FROM `appointments` where ClinicID='".$ID."' order by Date ASC";
				$result = $conn->query($sql);
				$dateToday = date('Y-m-d');
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						if ($row['Date']>$dateToday ){
							$ADate = date_create($row['Date']);
							$ADate = date_format($ADate, "F d,Y");
							$ATime = date_create($row['Time']);
							$ATime = date_format($ATime, "g:i A");
							$response = ($row['RejectResponse']);
							$PetID = $row['PetID'];
							$sql2 = "SELECT * FROM `pet` where PetID='".$PetID."'";
							$result2 = $conn->query($sql2);
							if ($result2->num_rows > 0) {
								while($row2 = $result2->fetch_assoc()) {
									$PetName = $row2['PetName'];
								}
							}
							$OwnerID = $row['OwnerID'];
							$sql3 = "SELECT * FROM `petowner` where PetOwnerID='".$OwnerID."'";
							$result3 = $conn->query($sql3);
							if ($result3->num_rows > 0) {
								while($row3 = $result3->fetch_assoc()) {
									$OwnerName = $row3['FullName'];
									$OwnerAddress = $row3['Address'];
									$OwnerNumber = $row3['ContactNumber'];
								}
							}
							
							if($row['RequestStatus']=='Pending'){
								echo '<tr style="height: 75px; color:gray;">
								<td class="u-border-1 u-border-grey-30 u-first-column u-grey-5 u-table-cell u-table-cell-7"><text id="'.$row['AppointmentID'].'From">'.$OwnerName.'</text><br>
								<text style="font-size:12px"><i class="bi bi-geo-alt-fill"></i> '.$OwnerAddress.'</text><br>
								<text style="font-size:12px"><i class="bi bi-telephone-fill"></i> '.$OwnerNumber.'</text>
								</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$ADate.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$ATime.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$PetName.'<br>
								<text style="color:transparent"  id="'.$row['AppointmentID'].'OwnerID">'.$OwnerID.'</text>
								</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$row['AppoinmentCase'].'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$row['ServiceType'].'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">
								<button style="background-color:lightgreen;border:none;border-radius:5px;color:white;" id="'.$row['AppointmentID'].'" onclick="Accept(this.id)">Accept</button>
								<button style="background-color:red;border:none;border-radius:5px;color:white;" id="'.$row['AppointmentID'].'" onclick="Decline(this.id)">Decline</button>
								</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell"></td>
								</tr>';
							}else if($row['RequestStatus']=='Cancelled'){
								echo '<tr style="height: 75px; color:red;">
								<td class="u-border-1 u-border-grey-30 u-first-column u-grey-5 u-table-cell u-table-cell-7">'.$OwnerName.'<br>
								<text style="font-size:12px"><i class="bi bi-geo-alt-fill"></i> '.$OwnerAddress.'</text><br>
								<text style="font-size:12px"><i class="bi bi-telephone-fill"></i> '.$OwnerNumber.'</text>
								</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">
								<i style="font-size:12px;">	Cancelled<br></i>
								'.$ADate.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$ATime.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$PetName.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$row['AppoinmentCase'].'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$row['ServiceType'].'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">	
								<i style="font-size:12px;">Cancelled</i><br>'.htmlspecialchars_decode($response).'
								</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell"></td>
								</tr>';
							}else{
								echo '<tr style="height: 75px;">
								<td class="u-border-1 u-border-grey-30 u-first-column u-grey-5 u-table-cell u-table-cell-7">'.$OwnerName.'<br>
								<text style="font-size:12px"><i class="bi bi-geo-alt-fill"></i> '.$OwnerAddress.'</text><br>
								<text style="font-size:12px"><i class="bi bi-telephone-fill"></i> '.$OwnerNumber.'</text>
								</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">
								'.$ADate.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$ATime.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$PetName.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$row['AppoinmentCase'].'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$row['ServiceType'].'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">
								Accepted
								</td>
								
								<td class="u-border-1 u-border-grey-30 u-table-cell">
								';
								if($row['AppoinmentStatus']=='Done'){
									echo 'Done</td>
								</tr>';
								}else{
									echo '<button style="background-color:lightblue;margin:2px;border:none;border-radius:5px;cursor:pointer;" id="'.$row['AppointmentID'].'" onclick="MarkasDone(this.id)">Mark as Done </button><br>
								<button style="background-color:lightgreen;margin:2px;border:none;border-radius:5px;cursor:pointer;" id="'.$row['AppointmentID'].'" onclick="CreateVaccine(this.id)">Create Vaccination Report</button>
								</td>
								</tr>';
								}
							}
						}
						
					}
				}else{
					echo '<tr style="height: 75px;">
					<td class="u-border-1 u-border-grey-30 u-table-cell" colspan="8"><center>No Appointments here</center></td>
					</tr>';
				}
			?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <div class="card" id="inputform" style="background-color:white;position:fixed;width:400px;z-index:10;top:50%;left:50%;transform:translate(-50%,-50%)">
			   
			   <i class="bi bi-x-lg" style="float:right;margin:10px;cursor:pointer;" onclick="hideform()"></i><br>	<br>
			   <label>Please tell us the reason of cancellation</label><br><br>
			   <input type="hidden" id="idHere">
			   <input type="hidden" id="toName">
			   <input type="hidden" id="toID">
			   <textarea type="text" style="border:1px solid black;width:250px" name="message" id="Message"></textarea><br><br>
				<button type="submit" style="margin:5px;" onclick="Decline2()"><i class="bi bi-upload"></i> Submit</button>
			   <br><br>
			   </div>
    <!--
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-ad50"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
      </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
      <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
        <span>Website Templates</span>
      </a>
      <p class="u-text">
        <span>created with</span>
      </p>
      <a class="u-link" href="" target="_blank">
        <span>Website Builder Software</span>
      </a>. 
    </section> -->
	<script>
	document.getElementById('inputform').style.display="none";
	function Accept(id){
		document.cookie = "AppointmentID=" + id;
		window.location='CLINICAPPOINTMENTS.php?AcceptAppointment=true';
		window.location='CLINICAPPOINTMENTS.php';
	}
	function Decline(id){
		document.getElementById('idHere').value=id;
		document.getElementById('inputform').style.display="block";
		document.getElementById('toName').value = document.getElementById(id+'From').innerHTML;
		document.getElementById('toID').value = document.getElementById(id+'OwnerID').innerHTML;
		
	}
	function hideform(){
		document.getElementById('inputform').style.display="none";
	}
	function Decline2(){
		document.cookie = "AppointmentID=" + document.getElementById('idHere').value;
		var changeThis = document.getElementById('Message').value;
		changeThis =changeThis.replace(/\n/g,"<br>");
		document.cookie = "RejectMessage=" + changeThis;
		document.cookie = "ToName=" + document.getElementById('toName').value;
		document.cookie = "ReceiverID=" + document.getElementById('toID').value;
		window.location='CLINICAPPOINTMENTS.php?DeclineAppointment=true';
		window.location='CLINICAPPOINTMENTS.php';
	}
	function MarkasDone(id){
		document.cookie = "ID=" + id;
		window.open("CLINICAPPOINTMENTS.php?MarkasDone=true");
		window.open("CLINICAPPOINTMENTS.php");
	}
	function CreateVaccine(id){
		document.cookie = "ListID=" + id + ";'';path=/";
		window.location='GenerateReport.php';
	}
	</script>
  </body>
</html>