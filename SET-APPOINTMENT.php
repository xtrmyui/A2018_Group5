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
		if($_SESSION["Acc"]!="PetOwner"){
			header("Location: SIGN-IN.php?loginfirst");
		exit();
		}
		$PETID = $_COOKIE['petID'];
		$sql = "SELECT * FROM `pet` WHERE  PetID='".$PETID."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$PetID = $row['PetID'];
				$OwnerID = $row['OwnerID'];
				$PetName = $row['PetName'];
			}
		}
		//--------------------------------------------------
		$dateToday= date('Y-m-d');
		$CLINICID = $_COOKIE['clinicID'];
		$sql = "SELECT * FROM `clinicowner` WHERE  ClinicID='".$CLINICID."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$ClinicName = $row['ClinicName'];
				$ClinicDays = $row['ClinicDays'];
				$CHOpen = $row['CH-Open'];
				
				$CHClose = $row['CH-Close'];
				
				$ServicesOffered = $row['ServicesOffered'];
				$AcceptHS = $row['AcceptHS'];
				if($CHOpen==$CHClose){
					 $displayOpen = "24 ";
					 $displayClose = "Hours";
				 }else{
					 $displayOpen = date_create($CHOpen);
					$displayOpen = date_format($displayOpen,"g:i A");
					$displayClose = date_create($CHClose);
					$displayClose = " - ". date_format($displayClose,"g:i A");
				 }
			}
		}
		//----------------------------------------------------
		
	}
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$ClinicID = $_COOKIE['clinicID'];
	$ClinicName2 = $ClinicName;
	$AppointmentDate = trim($_POST["AppointmentDate"]);
	$AppointmentTime = trim($_POST["AppointmentTime"]);
	$AppointmentTime = date_create($AppointmentTime);
	$AppointmentTime = date_format($AppointmentTime, "His");
	$AppointmentCase = trim($_POST["AppointmentCase"]);
	$ServiceType = trim($_POST["ServiceType"]);
	$RequestStatus = "Pending";
	$AppoinmentID = $PetName[0] . $OwnerID[0]. date("YmdHi");
	$CheckOpenHour = date_create($CHOpen);
	$CheckOpenHour = date_format($CheckOpenHour,"His");
	$CheckCloseHour = date_create($CHClose);
	$CheckCloseHour = date_format($CheckCloseHour,"His");
	$CheckAppoinmentTime = date_create($AppointmentTime);
	$CheckAppoinmentTime = date_format($CheckAppoinmentTime,"His");
	$early = intval($CheckAppoinmentTime) > intval($CheckOpenHour);
	if($CheckOpenHour!=$CheckCloseHour){
		if(((intval($CheckAppoinmentTime) >= intval($CheckOpenHour)))and(intval($CheckAppoinmentTime)< intval($CheckCloseHour))){
		$sql  = "INSERT INTO `appointments`(`PetID`, `ClinicID`, `OwnerID`, `Date`, `Time`, `AppoinmentCase`, `ServiceType`, `AppointmentID`, `RequestStatus`) VALUES 
	('".$PetID."','".$ClinicID."','".$OwnerID."','".$AppointmentDate."','".$AppointmentTime."','".$AppointmentCase."','".$ServiceType."','".$AppoinmentID."','".$RequestStatus."')";
	if ($conn->query($sql) === TRUE) {
		echo '<script>window.location="PETOWNERHOME.php","_self";</script>';
		
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	}else{
		echo '<script>alert("Oops, you set an appoinment that is out of clinic hours. Please follow the schedule.")</script>';
	}
	}else{
		$sql  = "INSERT INTO `appointments`(`PetID`, `ClinicID`, `OwnerID`, `Date`, `Time`, `AppoinmentCase`, `ServiceType`, `AppointmentID`, `RequestStatus`) VALUES 
	('".$PetID."','".$ClinicID."','".$OwnerID."','".$AppointmentDate."','".$AppointmentTime."','".$AppointmentCase."','".$ServiceType."','".$AppoinmentID."','".$RequestStatus."')";
	if ($conn->query($sql) === TRUE) {
		echo '<script>window.location="PETOWNERHOME.php","_self";</script>';
		
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
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
    <title>SET APPOINTMENT</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="SET-APPOINTMENT.css" media="screen">
 <!--   <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script> -->
    <meta name="generator" content="Nicepage 4.4.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="SET APPOINTMENT">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body u-xl-mode"> 
    <section class="u-clearfix u-gradient u-section-1" id="sec-e62f">
	<a href="CHOOSE-CLINIC.php" class=" u-border-hover-palette-1-base u-btn u-button-style u-none u-text-palette-1-base u-btn-1" style="float:right"><span class="u-file-icon u-icon u-icon-1"><img src="images/4833552.png" alt=""></span>&nbsp;<span class="u-text-body-color" style="font-weight: 500; font-size: 1.125rem;">BACK</span>
        </a><br>
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-align-left u-container-style u-group u-opacity u-opacity-15 u-radius-50 u-shape-round u-white u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h3 class="u-text u-text-default u-text-1">Set Appointment</h3>
            <h6 class="u-text u-text-default u-text-2">Name: <?php echo $PetName ?></h6>
			
            <div class="u-form u-form-1">
              <form action="" method="POST" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" style="padding: 10px;">
               <input type="hidden" value="<?php echo $PetID?>" name="PID"><br>
			<input type="hidden" value="<?php echo $OwnerID?>" name="OID"><br>
				<div class="u-form-group u-form-select u-form-group-1">
                  <label for="select-6975" class="u-label u-label-1">CLINIC</label>
                  <div class="u-form-select-wrapper">
                    <input type="text" disabled placeholder="Clinic Name" id="text-d939" name="ClinicName" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required value="<?php echo $ClinicName ?>">
                 </div>
                </div>
                <div class="u-form-group u-form-select u-form-group-4">
                  <label for="email-7e8f" class="u-form-control-hidden u-label u-label-2"></label>
                  <input type="date" placeholder="Date" id="AppointmentDate" name="AppointmentDate" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                <label for="AppointmentDate"><i>*<?php echo $ClinicDays ?></i></label>
				</div>
                <div class="u-form-group u-form-select u-form-group-4">
                  <label for="text-d939" class="u-form-control-hidden u-label u-label-3"></label>
                  <input type="time" placeholder="Time" id="AppointmentTime" name="AppointmentTime" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="required">
					<label for="AppointmentTime"><i>*<?php echo $displayOpen.$displayClose ?></i></label>
				</div>
                <div class="u-form-group u-form-select u-form-group-4">
                  <label for="select-57cd" class="u-label u-label-4">Case</label>
                  <div class="u-form-select-wrapper">
                    <select id="AppointmentCase" name="AppointmentCase" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required>
                      <?php
					  if(strpos($ServicesOffered,", ")){
						  $Services = explode(", ",$ServicesOffered);
					  }else{
						  $Services = explode("\n",$ServicesOffered);
					  }
					  
					  
					  for($c=0;$c<count($Services);$c++){
						  echo '<option value="'.$Services[$c].'">'.$Services[$c].'</option>';
					  }
					  echo '<option value="Check up">Check up</option>';
					  echo '<option value="Other">Other</option>';
					  ?>
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                  </div>
				  
                </div>
                <div class="u-form-group u-form-select u-form-group-5">
                  <label for="select-6ec7" class="u-label u-label-5">Service Type</label>
                  <div class="u-form-select-wrapper">
                    <select id="ServiceType" name="ServiceType" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
					<?php
					
					if($AcceptHS=='Yes'){
						echo '<option value="Home Service">Home Service</option>';
					}
					  echo '<option value="Clinic Visit">Clinic Visit</option>';
					?>
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                  </div>
                </div>
                <div class="u-align-center u-form-group u-form-submit">
                  <input type="submit" value="SET APPOINMENT" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-2-base u-radius-50 u-btn-1">
                </div>
              </form>
			 
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <script>
	var datenow = "<?php echo $dateToday ?>";
	document.getElementById('AppointmentDate').min = datenow;

	</script>
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
  </body>
</html>