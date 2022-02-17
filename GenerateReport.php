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
$idList=$_COOKIE['ListID'];
$sql = "SELECT * FROM `appointments` where AppointmentID='".$idList."'";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$PetID = $row['PetID'];
			$ClinicID = $row['ClinicID'];
			$OwnerID = $row['OwnerID'];
			$AppointmentCase = $row['AppoinmentCase'];
			$AppointmentCase = strtolower($AppointmentCase);
		}
	}
if (isset($_GET['addDeworm'])) {
    InsertDeworm();
	}
	function InsertDeworm(){
		date_default_timezone_set("Asia/Manila");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petvaccination";
$conn = mysqli_connect($servername, $username, $password, $dbname);
		$PetID = $_COOKIE['PetID'];
		$OwnerID = $_COOKIE['OwnerID'];
		$ClinicID = $_COOKIE['ClinicID'];
		$MedUsed = $_COOKIE['MedUsed'];
		$DateGiven = $_COOKIE['DateGiven'];
		$RepeatOn = $_COOKIE['RepeatOn'];
		$id = $PetID [0].$OwnerID[0].date('YmdHis');
		$sql = "INSERT INTO `dewormrecord`(`PetID`, `OwnerID`, `ClinicID`, `DateGiven`, `MedicineUsed`, `RepeatOn`, `dewormID`) 
		VALUES ('".$PetID."','".$OwnerID."','".$ClinicID."','".$DateGiven."','".addslashes($MedUsed)."','".$RepeatOn."','".$id."')";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}
		$idList=$_COOKIE['ListID'];
		$sql = "UPDATE `appointments` SET `AppoinmentStatus`='Done' WHERE AppointmentID='".$idList."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}
		
	}
if (isset($_GET['addReport'])) {
    InsertReport();
	}
	function InsertReport(){
		date_default_timezone_set("Asia/Manila");
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "petvaccination";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$PetID = $_COOKIE['PetID'];
		$OwnerID = $_COOKIE['OwnerID'];
		$ClinicID = $_COOKIE['ClinicID'];
		$DateVaccination = $_COOKIE['DateVaccination'];
		$Weight = $_COOKIE['Weight'];
		$Expiry = $_COOKIE['Expiry'];
		$Against = $_COOKIE['Against'];
		$Type = $_COOKIE['Type'];
		$Manufacturer = $_COOKIE['Manufacturer'];
		$LotNo = $_COOKIE['LotNo'];
		$Vet = $_COOKIE['Vet'];
		$id= $PetID[0].$OwnerID[0].date("YmdHis");
		$sql = "INSERT INTO `vaccinereport`(`PetID`, `OwnerID`, `ClinicID`, `DateofTreatment`, `Weight`, `Expiration`, `Against`, `Type`, `Manufacturer`, `LotNo`, `Vet`, `ReportID`) VALUES 
		('".$PetID."','".$OwnerID."','".$ClinicID."','".$DateVaccination."','".$Weight."','".$Expiry."','".$Against."','".$Type."','".$Manufacturer."','".$LotNo."','".$Vet."','".$id."')";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}
		$idList=$_COOKIE['ListID'];
		$sql = "UPDATE `appointments` SET `AppoinmentStatus`='Done' WHERE AppointmentID='".$idList."'";
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
    <meta name="keywords" content="Report chart or eme&nbsp; eme">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="CLINICDASHBOARD.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.4.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="DASHBOARD">
    <meta property="og:type" content="website">
  </head>
  <body data-home-page="DASHBOARD.html" data-home-page-title="DASHBOARD" class="u-body u-xl-mode"><header class="u-clearfix u-header u-palette-1-base u-header" id="sec-c7a2"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="letter-spacing: 0px; font-size: 1.25rem; font-weight: 700;">
            <a class="u-button-style u-custom-active-color u-custom-left-right-menu-spacing u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-nav-link" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-0173"></use></svg>
              <svg class="u-svg-content" version="1.1" id="svg-0173" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>

        </nav>
      </div></header>
	  
    <section class="u-clearfix u-section-1" id="sec-df13">
	 <a href="CLINICAPPOINTMENTS.php" style='float:right;' data-page-id="325928827" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-none u-text-palette-1-base u-btn-1"><span class="u-file-icon u-icon u-icon-1"><img src="images/4833552.png" alt=""></span>&nbsp;<span class="u-text-body-color" style="font-weight: 700; font-size: 1.125rem;">BACK</span>
        </a><br><br>
      <div class="u-clearfix u-sheet u-sheet-1">
	  <?php
		$sql = "SELECT * FROM `pet` where PetID='".$PetID."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$PetName = $row['PetName'];
				$Breed = $row['Breed'];
				$image = $row['image'];
				$DateofBirth = $row['DateofBirth'];
				$DateofBirth = date_create($DateofBirth);
				$Color = $row['Color'];
				$Sex = $row['Sex'];
				$Species = $row['Species'];
			}
		}

	  ?>
	  <div>
	  <div style="width:250px;border:1px solid gray;padding:10px;float:left">
	  <text><center><b><i>Pet Info</i></b></text><br>
	  <img src="<?php echo $image ?>" width="200px" height="200px"></center><br>
	  <label><i>Pet Name:</i></label><br>
	  <input type="Text" value="<?php echo $PetName ?>" disabled>
	  <label><i>Date of Birth:</i></label><br>
	  <input type="Text" value="<?php echo date_format($DateofBirth,"F d, Y") ?>" disabled>
	  <label><i>Color:</i></label>
	  <input type="Text" value="<?php echo $Color; ?>" disabled>
	  <label><i>Sex:</i></label>
	  <input type="Text" value="<?php echo $Sex ?>" disabled>
	  <label><i>Breed:</i></label>
	  <input type="Text" value="<?php echo $Breed ?>" disabled>
		<label><i>Species:</i></label>
	  <input type="Text" value="<?php echo $Species ?>" disabled>
	  </div>
	  <div style="width:750px;border:1px solid gray;padding:10px;float:left;" id="Treatment">
	  <text><center><b><i>Vaccination Information</i></b></center></text><br>
	  <?php
	  $dateToday = date('F d, Y');
	  ?>
	  <input type="hidden" value="<?php echo $PetID ?>">
	  <input type="hidden" value="<?php echo $OwnerID ?>">
	  <input type="hidden" value="<?php echo $ClinicID ?>">
	  <label><i>Date of Vaccination:</i></label><br>
	  <input type="text" value="<?php echo date('F d, Y') ?>" disabled>
	  <input type="hidden" value="<?php echo date('Y-m-d') ?>" name='DateVaccination' id='DateVaccination'><br><br>
	  <label><i>Weight(kg):</i></label><br>
	  <input type="number" placeholder="kilograms"name="weight" id='weight' required><br><br>
	  <label><i>Expiration:</i></label>
	  <input type="date" required name="Expiry" id="Expiry"><br><br>
	   <label><i>Against:</i></label>
	  <input type="text" required name="against" id='against'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <label><i>Type:</i></label>
	  <input type="text" required name='Type' id='Type'><br><br>
	  <label><i>Manufacturer:</i></label><br>
	  <textarea type="text" cols="40" id='Manufacturer' name='Manufacturer' required></textarea><br><br>
	  <label><i>Lot No:</i></label>
	  <input type="text" required name='LotNo' id='LotNo'><br><br>
	  <label><i>Veterinarian:</i></label>
	  <input type="text" required style="width:300px" placeholder="Full name (Lis. No)"name="vet" id='vet'>
	  <br><br>
	 <center> <button onclick="SubmitReport()"><i class="bi bi-check2-circle"></i> Submit</button></center>
	  
	  </div>
	  <div style="width:750px;border:1px solid gray;padding:10px;float:left;" id="Deworm">
	  <text><center><b><i>Deworming Schedule</i></b></center></text><br>
	  <?php
	  $dateToday = date('F d, Y');
	  ?>
	  
	  <input type="hidden" value="<?php echo $PetID ?>">
	  <input type="hidden" value="<?php echo $OwnerID ?>">
	  <input type="hidden" value="<?php echo $ClinicID ?>">
	  <input type="hidden" value="Deworm" name="type">
	  <label><i>Date Given:</i></label><br>
	  <input type="text" value="<?php echo date('F d, Y') ?>" name="" disabled>
	  <input type="hidden" value="<?php echo date('Y-m-d') ?>" id="DateGiven" name="DateGiven"><br><br>
<label><i>Medicine Used:</i></label><br>
	  <textarea type="text" cols="40" required id="MedUsed" name="MedUsed"></textarea><br><br>
	  <label><i>Repeat on:</i></label><br>
	  <input type="date" required name="RepeatOn" id="RepeatOn"><br><br>
	  
	 <center> <button onclick="submitDeworm()">Submit</button></center>
	  
	  </div>
	  </div>
	  </div>
	  <br>
    </section>
   
    
    <!--
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
	var AType="<?php echo $AppointmentCase ?>";
	if(AType.includes('deworm')){
		document.getElementById('Treatment').style.display = 'none';
		document.getElementById('Deworm').style.display = 'block';
	}else{
		document.getElementById('Treatment').style.display = 'block';
		document.getElementById('Deworm').style.display = 'none';
	}
	function submitDeworm(){
		var PetID="<?php echo $PetID ?>";
		var OwnerID="<?php echo $OwnerID ?>";
		var ClinicID="<?php echo $ClinicID ?>";
		var MedUsed = document.getElementById('MedUsed').value;
		MedUsed = MedUsed.replace(/\n/g,"<br>");
		var DateGiven  = document.getElementById('DateGiven').value;
		var RepeatOn  = document.getElementById('RepeatOn').value;
		document.cookie = "PetID=" + PetID;
		document.cookie = "OwnerID=" + OwnerID;
		document.cookie = "ClinicID=" + ClinicID;
		document.cookie = "MedUsed=" + MedUsed;
		document.cookie = "DateGiven=" + DateGiven;
		document.cookie = "RepeatOn=" + RepeatOn;
		window.location='GenerateReport.php?addDeworm=true';
		window.location='CLINICAPPOINTMENTS.php';
	}
	function SubmitReport(){
		var PetID="<?php echo $PetID ?>";
		var OwnerID="<?php echo $OwnerID ?>";
		var ClinicID="<?php echo $ClinicID ?>";
		var DateVaccination =  document.getElementById('DateVaccination').value;
		var Weight =  document.getElementById('weight').value;
		var Expiry =  document.getElementById('Expiry').value;
		var Against =  document.getElementById('against').value;
		var Type =  document.getElementById('Type').value;
		var Manufacturer =  document.getElementById('Manufacturer').value;
		Manufacturer = Manufacturer.replace(/\n/g,"<br>");
		var LotNo =  document.getElementById('LotNo').value;
		var Vet =  document.getElementById('vet').value;
		
		document.cookie = "PetID=" + PetID;
		document.cookie = "OwnerID=" + OwnerID;
		document.cookie = "ClinicID=" + ClinicID;
		document.cookie = "DateVaccination=" + DateVaccination;
		document.cookie = "Weight=" + Weight;
		document.cookie = "Expiry=" + Expiry;
		document.cookie = "Against=" + Against;
		document.cookie = "Type=" + Type;
		document.cookie = "Manufacturer=" + Manufacturer;
		document.cookie = "LotNo=" + LotNo;
		document.cookie = "Vet=" + Vet;
		window.location='GenerateReport.php?addReport=true';
		window.location='CLINICAPPOINTMENTS.php';
	}
	</script>
  </body>
</html>