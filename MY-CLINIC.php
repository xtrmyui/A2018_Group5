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
		$clinicID = $_SESSION["ID"];
		$sql = "SELECT * FROM `clinicowner` WHERE  ClinicID='".$clinicID."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
  // verify
			while($row = $result->fetch_assoc()) {
				$Username = $row['Username'];
				$Password = $row['Password'];	
				 $ClinicName =$row['ClinicName'];
				 $ClinicDays =$row['ClinicDays'];
				 $COpen =$row['CH-Open'];
				 $CClose =$row['CH-Close'];
				 $Address =$row['Address'];
				 $Owner =$row['owner'];
				 $ServicesOffered =$row['ServicesOffered'];
				 $ContactDetails =$row['ContactDetails'];
				 $Facebook =$row['Facebook'];
				 $Email =$row['Email'];
				 $Instagram =$row['Instagram'];
				 $Web =$row['Web'];
				 $AcceptHS =$row['AcceptHS'];
				 $Image =$row['Image'];
				 
				 if($COpen==$CClose){
					 $ClinicOpen = "24 ";
					 $ClinicClose = "Hours";
				 }else{
					 $Open = date_create($COpen);
					$ClinicOpen = date_format($Open,"g:i A");
					$Close = date_create($CClose);
					$ClinicClose = " - ".date_format($Close,"g:i A");
				 }
				 
			}
		} else {
			echo "<script>alert('Account Does not exist.Try Again')</script>";
		}	
	}
}
//php function to change clinic name
if (isset($_GET['updateNewClinicName'])) {
    UpdateTheClinicName();
	}
	function UpdateTheClinicName(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "petvaccination";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$updateThis = $_COOKIE['updateClinicName'];
		$clinicID = $_SESSION["ID"];
		$sql = "UPDATE `clinicowner` SET `ClinicName`='".$updateThis."' WHERE ClinicID='".$clinicID."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

$conn->close();
	}
//END php function to change clinic name
// ---------------------------------------------------------------------------------------------------------
//php function to change address
if (isset($_GET['updateNewAddress'])) {
    UpdateTheAddress();
	}
	function UpdateTheAddress(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "petvaccination";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$updateThis = $_COOKIE['updateAddress'];
		$clinicID = $_SESSION["ID"];
		$sql = "UPDATE `clinicowner` SET `Address`='".$updateThis."' WHERE ClinicID='".$clinicID."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

$conn->close();
	}
//END php function to change address
// ---------------------------------------------------------------------------------------------------------
//php function to change owner
if (isset($_GET['updateNewOwner'])) {
    UpdateTheOwner();
	}
	function UpdateTheOwner(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "petvaccination";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$updateThis = $_COOKIE['updateowner'];
		$clinicID = $_SESSION["ID"];
		$sql = "UPDATE `clinicowner` SET `owner`='".$updateThis."' WHERE ClinicID='".$clinicID."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

$conn->close();
	}
//END php function to change owner
// ---------------------------------------------------------------------------------------------------------
//php function to change Services Offered
if (isset($_GET['updateServicesOffered'])) {
    UpdateTheServices();
	}
	function UpdateTheServices(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "petvaccination";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$updateThis = $_COOKIE['updateServices'];
		$clinicID = $_SESSION["ID"];
		$sql = "UPDATE `clinicowner` SET `ServicesOffered`='".$updateThis."' WHERE ClinicID='".$clinicID."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

$conn->close();
	}
//END php function to change Services Offered
// ---------------------------------------------------------------------------------------------------------
//php function to change Home Service
if (isset($_GET['updateHomeService'])) {
    UpdateHomeS();
	}
	function UpdateHomeS(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "petvaccination";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$updateThis = $_COOKIE['updateHomeServiceR'];
		$clinicID = $_SESSION["ID"];
		$sql = "UPDATE `clinicowner` SET `AcceptHS`='".$updateThis."' WHERE ClinicID='".$clinicID."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

$conn->close();
	}
// ---------------------------------------------------------------------------------------------------------
//php function to change Contact
if (isset($_GET['updateContactDetails'])) {
    UpdateContactDetails();
	}
	function UpdateContactDetails(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "petvaccination";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$updateThis = $_COOKIE['updateContact'];
		$clinicID = $_SESSION["ID"];
		$sql = "UPDATE `clinicowner` SET `ContactDetails`='".$updateThis."' WHERE ClinicID='".$clinicID."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

$conn->close();
	}
// ---------------------------------------------------------------------------------------------------------
//php function to change FB
if (isset($_GET['updateFBLink'])) {
    UpdateFB();
	}
	function UpdateFB(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "petvaccination";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$updateThis = $_COOKIE['updateFB'];
		$clinicID = $_SESSION["ID"];
		$sql = "UPDATE `clinicowner` SET `Facebook`='".$updateThis."' WHERE ClinicID='".$clinicID."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

$conn->close();
	}
// ---------------------------------------------------------------------------------------------------------
//php function to change Insta
if (isset($_GET['updateInstaLink'])) {
    UpdateInsta();
	}
	function UpdateInsta(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "petvaccination";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$updateThis = $_COOKIE['updateInsta'];
		$clinicID = $_SESSION["ID"];
		$sql = "UPDATE `clinicowner` SET `Instagram`='".$updateThis."' WHERE ClinicID='".$clinicID."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

$conn->close();
	}
// ---------------------------------------------------------------------------------------------------------
//php function to change Web
if (isset($_GET['updateWebLink'])) {
    UpdateWeb();
	}
	function UpdateWeb(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "petvaccination";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$updateThis = $_COOKIE['updateWeb'];
		$clinicID = $_SESSION["ID"];
		$sql = "UPDATE `clinicowner` SET `Web`='".$updateThis."' WHERE ClinicID='".$clinicID."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

$conn->close();
	}
// ---------------------------------------------------------------------------------------------------------
//php function to change cliinic days
if (isset($_GET['updateDays'])) {
    UpdateClinicDays();
	}
	function UpdateClinicDays(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "petvaccination";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$updateThis = $_COOKIE['updateClinicDays'];
		$clinicID = $_SESSION["ID"];
		$sql = "UPDATE `clinicowner` SET `ClinicDays`='".$updateThis."' WHERE ClinicID='".$clinicID."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

$conn->close();
	}
// ---------------------------------------------------------------------------------------------------------
//php function to change cliinic hours
if (isset($_GET['updateHours'])) {
    UpdateClinicHours();
	}
	function UpdateClinicHours(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "petvaccination";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$updateThis = $_COOKIE['updateClinicOpenning'];
		$andThis = $_COOKIE['updateClinicClosing'];
		$updateThis = date_create($updateThis);
		$updateThis = date_format($updateThis,"His");
		$andThis = date_create($andThis);
		$andThis = date_format($andThis,"His");
		
		$clinicID = $_SESSION["ID"];
		$sql = "UPDATE `clinicowner` SET `CH-Open`='".$updateThis."',`CH-Close`='".$andThis."' WHERE ClinicID='".$clinicID."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

$conn->close();
	}
// ---------------------------------------------------------------------------------------------------------
//php function to change Email
if (isset($_GET['updateEmailLink'])) {
    UpdateEmail();
	}
	function UpdateEmail(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "petvaccination";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$updateThis = $_COOKIE['updateEmail'];
		$clinicID = $_SESSION["ID"];
		$sql = "UPDATE `clinicowner` SET `Email`='".$updateThis."' WHERE ClinicID='".$clinicID."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

$conn->close();
	}
// ---------------------------------------------------------------------------------------------------------
//php function to change Login Credentials
if (isset($_GET['updateLoginCredentials'])) {
    UpdateLogin();
	}
	function UpdateLogin(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "petvaccination";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$updateThis = $_COOKIE['updateUsername'];
		$andThis = $_COOKIE['updatePassword'];
		$clinicID = $_SESSION["ID"];
		$sql = "UPDATE `clinicowner` SET `Username`='".$updateThis."',`Password`='".$andThis."' WHERE ClinicID='".$clinicID."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

$conn->close();
	}
// ---------------------------------------------------------------------------------------------------------
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "petvaccination";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	//get image name
	$image = $_FILES['fileToUpload']['name'];
	//img file directory 
	$target = "images/".basename($image);
	$clinicID = $_SESSION["ID"];
	$sql = "UPDATE `clinicowner` SET `Image`='images/".$image."' WHERE ClinicID='".$clinicID."'";
	if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target)){
             if ($conn->query($sql) === TRUE) {
				echo '<script>window.location="MY-CLINIC.php";</script>';
			} else {
			echo "Error updating record: " . $conn->error;
			}
	}
                    
		

$conn->close();
	
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
    <title>MY CLINIC</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="MY-CLINIC.css" media="screen">
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
table{
	  border-collapse: collapse;	
}
td{
	padding:5px;
}
	</style>
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="MY CLINIC">
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
</li><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="MY-CLINIC.php" style="padding: 10px 14px;"><i class="bi bi-clipboard-heart"></i> MY CLINIC and REPORTS</a>
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
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="MY-CLINIC.php" style="padding: 10px 14px;"><i class="bi bi-clipboard-heart"></i> MY CLINIC and REPORTS</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="LOGOUT.php"  style="padding: 10px 14px;">LOGOUT</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
	  
			   <div class="card" id="inputform" style="background-color:white;position:fixed;width:400px;z-index:10;top:50%;left:50%;transform:translate(-50%,-50%)">
			   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
			   <i class="bi bi-x-lg" style="float:right;margin:10px;cursor:pointer;" onclick="hideform()"></i><br>	<br>
			   <label>Upload a snapshot of your clinic</label><br><br>
			   <input type="file" accept="image/*" style="border:1px solid black;" name="fileToUpload" id="fileToUpload"><br><br>
			   <button type="reset" style="margin:5px;"><i class="bi bi-arrow-clockwise"></i> Reset</button><button type="submit" style="margin:5px;"><i class="bi bi-upload"></i> Submit</button>
			   <br><br>
			   </form>
			   </div>
			   
			   <div class="card" id="changeUname" style="background-color:white;position:fixed;width:400px;z-index:10;top:50%;left:50%;transform:translate(-50%,-50%)">
			   <i class="bi bi-x-lg" style="float:right;margin:10px;cursor:pointer;" onclick="hideThis()"></i><br>	<br>
			   <label><i class="bi bi-gear-fill" style="color:blue;cursor:pointer"></i> Edit Your Login Credentials</label><br><br>
			   <div id="beforepassword"><label><i class="bi bi-exclamation-triangle" style="color:yellow"></i> Enter your password first</label><br>
				<input type="password" placeholder="Password" id="oldpass"><button onclick="verifyPassword()">Submit</button></div>
				<div id="afterPassword">
				<br>
				<label>Username</label>
				<input type="text" value="<?php echo $Username ?>" id="NewUsername"><br>
				<label>Password</label>
				<input type="text" placeholder="New Password" id="NewPassword"><br>
				<button style="margin:10px;" onclick="SaveNewCredentials()"><i class="bi bi-check2-circle"></i> Save</button>
				</div>
			   <br><br>
			   </form>
			   </div>
			   
    <section class="u-clearfix u-white u-section-1" id="sec-0879">
      <div class="u-clearfix u-sheet u-sheet-1" >
        <div class="u-clearfix u-expanded-width u-gutter-8 u-layout-wrap u-layout-wrap-1">
          <div class="">
            <div class="u-layout-row">
              <div class="u-size-30 u-size-60-md">
                <div class="u-layout-row">
                  <div id="imgcontainer"class="u-align-left u-container-style u-image u-image-round u-layout-cell u-left-cell u-radius-50 u-size-60 u-image-1" src="" data-image-width="1080" data-image-height="1080" style="cursor:pointer;" onmouseover="showoption()" onmouseleave="hideoption()">
                    
					<div class="u-container-layout u-valign-middle u-container-layout-1" src=""><div style="width:100%;heigth:100%;opacity:50%" id="showthis" onclick="showform()"><center><svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
  <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
  <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
</svg></div></center></div>
					
                  </div>
                </div>
              </div>
			  
			   
			   
			  
              <div class="u-size-30 u-size-60-md">
                <div class="u-layout-col">
                  <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-60 u-white u-layout-cell-2" src="">
                    <div class="u-container-layout u-container-layout-2">
                      <h5 class="u-text u-text-default u-text-1" id="clinicname"><?php echo $ClinicName ?></h3>
					  <text style="color:blue;"><i class="bi bi-clipboard-heart"> CLINIC NAME</i>  <i class="bi bi-pencil-square" style="color:blue;cursor:pointer" onclick="changeClinicName()"></i></text><br>
						<div id="inputClinicName"><input type="text" style="width:300px" id="newClinicName" value="<?php echo $ClinicName ?>"><button onclick="SaveChangesInClinicName()"><i class="bi bi-check2-circle"></i> Save</button><button><i class="bi bi-x-lg" onclick="closeChangeClinicName()"></i></button><br><br></div>
						
						<text><i class="bi bi-geo-alt-fill" style="color:red"></i><i> <?php echo $Address ?></i> <i class="bi bi-pencil-square" style="color:blue;cursor:pointer" onclick="changeAddress()"></i></text><br>
                      <div id="AddressBar"><textarea id="addressField" style="width:300px;" rows='3'><?php echo $Address ?></textarea><button onclick="SaveChangesInAddress()"><i class="bi bi-check2-circle"></i> Save</button><button><i class="bi bi-x-lg" onclick="closeAddressBar()"></i></button><br><br></div>
					  <text><i class="bi bi-calendar-week" style="color:blue;"></i> <?php echo $ClinicDays ?> <i class="bi bi-pencil-square" style="color:blue;cursor:pointer" onclick="changeClinicDays()"></i><br>
					  <div id="inputClinicDays"><input type="text" style="width:300px" id="newDays" value="<?php echo $ClinicDays ?>"><button onclick="SaveChangesClinicDays()"><i class="bi bi-check2-circle"></i> Save</button><button><i class="bi bi-x-lg" onclick="closeChangeClinicDays()"></i></button><br><br></div>
					<i class="bi bi-clock-history" style="color:blue;"></i> <?php echo $ClinicOpen ?><?php echo $ClinicClose ?> <i class="bi bi-pencil-square" style="color:blue;cursor:pointer" onclick="changeClinicHours()"></i></text><br>
					  <div id="inputClinicHours"><input type="time" id="openning"> - <input type="time" id="closing"><button onclick="SaveChangesClinicHours()"><i class="bi bi-check2-circle"></i> Save</button><button><i class="bi bi-x-lg" onclick="closeChangeClinicHours()"></i></button><br></div><br>
					  <text>OWNER <i class="bi bi-pencil-square" style="color:blue;cursor:pointer" onclick="changeOwnerName()"></i></text><br>
					  <text style="color:blue;"><i class="bi bi-person-heart"> Owned By: <?php echo $Owner ?></i></text><br>
					  <div id="OwnerBar"><input type="text" id="OwnerField" style="width:300px;" value="<?php echo $Owner ?>"><button onclick="SaveChangesInOwnerName()"><i class="bi bi-check2-circle"></i> Save</button><button><i class="bi bi-x-lg" onclick="closeOwnerBar()"></i></button><br></div><br>
                      
					  
					  
					  <i class="bi bi-hospital"  style="color:blue;"></i> Services Offered: <i class="bi bi-pencil-square" style="color:blue;cursor:pointer" onclick="changeServicesOffered()"></i><br><text style="white-space: pre-wrap;"> <?php echo $ServicesOffered ?></text><br>
					  <div id="ServicesOfferedBar"><textarea id="ServicesOfferedField" style="width:300px;" rows='3'><?php echo $ServicesOffered ?></textarea><button onclick="SaveChangesInServicesOffered()"><i class="bi bi-check2-circle"></i> Save</button><button><i class="bi bi-x-lg" onclick="closeServicesOfferedBar()"></i></button><br></div><br>
					  <text>Do you accept Home Service?</text><br>
					  <input type="radio" name="HS" value="Yes" id="yes"  onclick="YesHS()" required><label style="margin-right:20px"> Yes</label><input type="radio" name="HS" value="No" id="no"onclick="NoHS()" required><label style="margin-right:20px"> No</label><br><br>
					  
					  <text><i class="bi bi-telephone-fill"  style="color:blue;"></i> Contact Details <i class="bi bi-pencil-square" style="color:blue;cursor:pointer" onclick="changeContact()"></i><br></text><text style="white-space: pre-wrap;"><?php echo $ContactDetails ?></text><br>
					  <div id="inputContact"><input type="text" style="width:300px" id="newContact" value="<?php echo $ContactDetails ?>"><button onclick="SaveChangesInContact()"><i class="bi bi-check2-circle"></i> Save</button><button><i class="bi bi-x-lg" onclick="closeChangeContact()"></i></button><br></div><br>
						
					<text><i class="bi bi-envelope"  style="color:blue;"></i> <?php echo $Email ?> <i class="bi bi-pencil-square" style="color:blue;cursor:pointer" onclick="changeEmail()"></i></text><br>
					  <div id="EmailField"><input type="text" style="width:300px" id="inputEmail" value="<?php echo $Email ?>"><button onclick="SaveChangesInEmail()"><i class="bi bi-check2-circle"></i> Save</button><button><i class="bi bi-x-lg" onclick="closeChangeEmail()"></i></button><br><br></div>
						
					  <text><i class="bi bi-facebook"  style="color:blue;"></i> <?php echo $Facebook ?> <i class="bi bi-pencil-square" style="color:blue;cursor:pointer" onclick="changeFB()"></i></text><br>
					  <div id="FBField"><input type="text" style="width:300px" id="inputFB" value="<?php echo $Facebook ?>"><button onclick="SaveChangesInFB()"><i class="bi bi-check2-circle"></i> Save</button><button><i class="bi bi-x-lg" onclick="closeChangeFB()"></i></button><br><br></div>
						
					  <text><i class="bi bi-instagram"  style="color:blue;"></i> <?php echo $Instagram ?> <i class="bi bi-pencil-square" style="color:blue;cursor:pointer" onclick="changeInstagram()"></i></text><br>
					   <div id="InstaField"><input type="text" style="width:300px" id="inputInsta" value="<?php echo $Instagram ?>"><button onclick="SaveChangesInInsta()"><i class="bi bi-check2-circle"></i> Save</button><button><i class="bi bi-x-lg" onclick="closeChangeInsta()"></i></button><br><br></div>
					
					  <text><i class="bi bi-link"  style="color:blue;"></i> <?php echo $Web ?> <i class="bi bi-pencil-square" style="color:blue;cursor:pointer" onclick="changeWeb()"></i></text><br>
					  <div id="WebField"><input type="text" style="width:300px" id="inputWeb" value="<?php echo $Web ?>"><button onclick="SaveChangesInWeb()"><i class="bi bi-check2-circle"></i> Save</button><button><i class="bi bi-x-lg" onclick="closeChangeWeb()"></i></button><br></div><br>
					
					  <text><i class="bi bi-person-circle" style="color:blue"></i> Username: <?php echo $Username ?> <i class="bi bi-gear-fill" style="color:blue;cursor:pointer" onclick="showChangeUname()"></i></text>
					  
                    </div>
                  </div>
                </div>
              </div>
			  
            </div>
			
          </div>
		  <div>
		  <br>
			  <table class="u-table-entity u-table-entity-1" id="Vaccine Report">
			  <colgroup>
              <col width="12.5%">
              <col width="14.5%">
              <col width="14.5">
              <col width="8.5%">
              <col width="12.5%">
              <col width="12.5%">
              <col width="12.5%">
              <col width="12.5%">
            </colgroup>
			<thead class="u-align-center u-palette-4-base u-table-header u-table-header-1">
              <tr style="height: 32px;">
                <th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white" colspan="8">Vaccine Report</th>
                
				
              </tr>
			  <tr style="height: 32px;">
                <th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white"></th>
                <th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white">Client</th>
                <th class="u-border-1 u-border-palette-4-base u-table-cell" colspan="2" style="border:1px solid white">Pet Info</th>
                <th class="u-border-1 u-border-palette-4-base u-table-cell" colspan="3" style="border:1px solid white">Vaccine Info</th>
                <th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white"></th>
				
              </tr>
			  <tr style="height: 32px;">
				<th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white">Date</th>
				<th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white">Client Name</th>
				<th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white">Pet Name</th>
				<th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white">Weight</th>
				<th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white">Type</th>
				<th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white">Manufacturer</th>
				<th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white">Lot No</th>
				<th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white">Vet</th>
			  </tr>
            </thead>
			<tbody class="u-table-body">
			<?php
				
				$ID = $_SESSION["ID"];
				$sql = "SELECT * FROM `vaccinereport` where ClinicID='".$ID."' order by DateofTreatment ASC";
				
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$Date = date_create($row['DateofTreatment']);
						$Date = date_format($Date,"M d, Y");
						$OwnerID = $row['OwnerID'];
						$sql3 = "SELECT * FROM `petowner` where PetOwnerID='".$OwnerID."'";
							$result3 = $conn->query($sql3);
							if ($result3->num_rows > 0) {
								while($row3 = $result3->fetch_assoc()) {
									$Name= $row3['FullName'];
								}
							}
						$PetID = $row['PetID'];
							$sql2 = "SELECT * FROM `pet` where PetID='".$PetID."'";
							$result2 = $conn->query($sql2);
							if ($result2->num_rows > 0) {
								while($row2 = $result2->fetch_assoc()) {
									$PetName= $row2['PetName'];
								}
							}
						$Weight = $row['Weight'];
						$Type = $row['Type'];
						$Manufacturer= $row['Manufacturer'];
						$LotNo= $row['LotNo'];
						$Vet= $row['Vet'];
						$ReportID= $row['ReportID'];
						
						echo '<tr style="height: 75px;">
						<td class="u-border-1 u-border-grey-30 u-table-cell">'.$Date.'</td>
						<td class="u-border-1 u-border-grey-30 u-table-cell">'.$Name.'</td>
						<td class="u-border-1 u-border-grey-30 u-table-cell">'.$PetName.'</td>
						<td class="u-border-1 u-border-grey-30 u-table-cell">'.$Weight.'</td>
						<td class="u-border-1 u-border-grey-30 u-table-cell">'.$Type.'</td>
						<td class="u-border-1 u-border-grey-30 u-table-cell">'.$Manufacturer.'</td>
						<td class="u-border-1 u-border-grey-30 u-table-cell">'.$LotNo.'</td>
						<td class="u-border-1 u-border-grey-30 u-table-cell">'.$Vet.'</td>
						</tr>';
					}
				}else{
					echo '<tr style="height: 75px;">
						<td class="u-border-1 u-border-grey-30 u-table-cell" colspan="8"><center>No records yet</center></td>
						</tr>';
				}
			?>
			</tbody>
			
			  </table>
			  </div>
        </div>
		
      </div>
	  
	 
    </section>
    
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
	var imgLink = '<?php echo $Image; ?>';
	var HS = '<?php echo $AcceptHS; ?>';
	if(imgLink==""){
		imgLink = "data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJkZWZhdWx0LWltYWdlLXNvbGlkIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNDAwIDI2NSIgc3R5bGU9IndpZHRoOiA0MDBweDsgaGVpZ2h0OiAyNjVweDsiPg0KPHJlY3QgZmlsbD0iI0M2RDhFMSIgd2lkdGg9IjQwMCIgaGVpZ2h0PSIyNjUiLz4NCjxwYXRoIGZpbGw9IiNEOUUzRTgiIGQ9Ik0zOTUuMyw5Ni4yYy01LTAuOC02LjEsMS4xLTguNSwyLjljLTEtMi4zLTIuNi02LjItNy43LTVjMS41LTUuMy0yLjYtOC40LTcuNy04LjRjLTAuNiwwLTEuMiwwLjEtMS44LDAuMg0KCWMtMS44LTQuMS02LTYuOS0xMC43LTYuOWMtNi41LDAtMTEuOCw1LjMtMTEuOCwxMS44YzAsMC40LDAsMC45LDAuMSwxLjNjLTEuMi0wLjgtMi41LTEuMy0zLjktMS4zYy00LjMsMC03LjksNC4yLTcuOSw5LjQNCgljMCwxLjIsMC4yLDIuNCwwLjYsMy41Yy0wLjUtMC4xLTEtMC4xLTEuNi0wLjFjLTYuOSwwLTEyLjUsNS41LTEyLjcsMTIuNGMtMC45LTAuMi0xLjktMC40LTIuOS0wLjRjLTYuNCwwLTExLjcsNS4yLTEyLjUsMTEuOA0KCWMtMS4yLTAuNC0yLjUtMC42LTMuOS0wLjZjLTUuOSwwLTEwLjgsMy44LTEyLjEsOC45Yy0yLjQtMi01LjUtMy4yLTguOS0zLjJjLTYsMC0xMS4xLDMuNy0xMi44LDguOGMtMS41LTEuNC0zLjgtMi4zLTYuMy0yLjMNCgljLTIuMSwwLTQuMSwwLjYtNS41LDEuN2gtMC4xYy0xLjMtNS41LTYuMi05LjUtMTIuMS05LjVjLTIuNCwwLTQuNywwLjctNi42LDEuOWMtMS40LTAuNy0zLTEuMi00LjgtMS4yYy0wLjMsMC0wLjUsMC0wLjgsMA0KCWMtMS41LTQuMS01LjItNy05LjUtN2MtMy4xLDAtNS45LDEuNS03LjgsMy45Yy0yLjItNC44LTYuOC04LjItMTIuMi04LjJjLTUuNiwwLTEwLjUsMy43LTEyLjUsOC44Yy0yLjEtMC45LTQuNC0xLjUtNi45LTEuNQ0KCWMtNi44LDAtMTIuNSwzLjktMTQuNSw5LjNjLTAuMiwwLTAuNSwwLTAuNywwYy01LjIsMC05LjYsMy4yLTExLjQsNy44Yy0yLjctMi44LTctNC41LTExLjgtNC41Yy0zLjMsMC02LjQsMC45LTguOSwyLjMNCgljLTIuMS02LjUtOC0xMi4yLTE4LjEtOS45Yy0yLjctMi4zLTYuMy0zLjctMTAuMS0zLjdjLTIuNSwwLTQuOCwwLjYtNi45LDEuNmMtMi4yLTUuOS03LjktMTAuMS0xNC42LTEwLjFjLTguNiwwLTE1LjYsNy0xNS42LDE1LjYNCgljMCwwLjksMC4xLDEuNywwLjIsMi41Yy0yLjYtNS03LjgtOC40LTEzLjgtOC40Yy04LjMsMC0xNS4xLDYuNS0xNS42LDE0LjZjLTIuOS0zLjItNy01LjMtMTEuNy01LjNjLTcuNCwwLTEzLjUsNS4xLTE1LjIsMTINCgljLTIuOS0zLjUtOS44LTYtMTQuNy02djExOS4yaDQwMFYxMDJDNDAwLDEwMiw0MDAsOTcsMzk1LjMsOTYuMnoiLz4NCjxwYXRoIGZpbGw9IiM4RUE4QkIiIGQ9Ik00MDAsMjA2LjJjMCwwLTI1LjMtMTkuMi0zMy42LTI1LjdjLTEzLjQtMTAuNi0yMy4xLTEyLjktMzEuNy03cy0yMy45LDE5LjctMjMuOSwxOS43cy01OC45LTYzLjktNjEuNS02Ni40DQoJYy0xLjUtMS40LTMuNi0xLjctNS41LTAuOWMtNS4yLDIuNC0xNy42LDkuNy0yNC41LDEyLjdjLTYuOSwyLjktNDEtNTAuNy00OS42LTUzcy04NC4zLDgzLjMtMTAxLjQsNzUuMXMtMjYuOS0yLjMtMzUuNCwzLjUNCgljLTguNiw1LjktMTEsNS45LTE1LjksOC4ycy0xNy4xLTUuOS0xNy4xLTUuOVYyNjVjMCwwLDQwMCwwLjIsNDAwLDB2LTU4LjhINDAweiIvPg0KPHBhdGggZmlsbD0iIzdFOTZBNiIgZD0iTTMzMy40LDE3OWMtMTMuMS05LjMtNDAsNC42LTU1LjEsMTAuN2MtMjMuNiw5LjYtOTQtNTQuNC0xMDcuMi01OS43YzAsMC00LjIsMy43LTkuNiw3LjYNCgljLTMuNS0wLjQtOC40LTUuNy05LjktNC43Yy00LjYsMy4xLTE3LjgsMTUuNC0yOC4zLDI2LjZjLTEwLjUsMTEuMy0xMS43LDAtMTUuOC0wLjZjLTIuNS0wLjQtNTQuMSw0Mi41LTU4LjcsNDMuMQ0KCUMyMi4zLDIwNS4zLDAsMTk3LjUsMCwxOTcuNVYyNjVsNDAwLTAuMXYtNTMuM0M0MDAsMjExLjYsMzQ0LjgsMTg3LjEsMzMzLjQsMTc5eiIvPg0KPHBhdGggZmlsbD0iIzc4OEY5RSIgZD0iTTAsMjY0Ljl2LTU4LjZjMCwwLDguMiwxLjgsMTEuMyw1LjNjMy4xLDMuNiwyNi4xLTQuMiwyNi4xLDQuN3MwLjUsNC4yLDAuNSwxNC44YzAsMTAuNywyMy00LjIsMzguMS0xOC40DQoJczM0LjktNDkuMiwzNi0zNWMxLDE0LjItMTUuMSwzOS4yLTI0LDU2LjRDNzkuMSwyNTEuNCw1MS43LDI2NSw1MS43LDI2NUwwLDI2NC45eiIvPg0KPHBhdGggZmlsbD0iIzc4OEY5RSIgZD0iTTEwMCwyNjVjMCwwLDY2LjctMTI1LjEsNjguMy0xMTYuOHMtNi44LDI5LjcsMi4xLDI2LjFjOC45LTMuNiwxNC42LTE2LDE4LjgtOS41czE2LjIsMzguNiwyMS45LDMzLjgNCgljNS43LTQuNywyMS40LTEzLjEsMjIuNC02LjVjMSw2LjUtMSw1LjMtNS43LDIwLjJDMjIzLjEsMjI3LjEsMjAwLDI2NSwyMDAsMjY1aC0xMGMwLDAsNi0yNC44LDguNi0zNC45YzIuNi0xMC4xLTMuNy0xOS0xMi04LjMNCglzLTIzLDIyLTI0LDE3LjhzLTUuNy0zMC4zLTE4LjgtMTQuMmMtMTMsMTYtMzMuOCwzOS43LTMzLjgsMzkuN2gtMTBWMjY1eiIvPg0KPHBhdGggZmlsbD0iIzc4OEY5RSIgZD0iTTI0NSwyNjVjMCwwLDE5LjgtNTQuNywzMy40LTY0LjJzNTMuNy0yNy45LDQ2LjktMTMuNmMtNi44LDE0LjItMTEsMzQuNC0yMC4zLDQ5LjgNCgljLTkuNCwxNS40LTE4LjgsMjYuMS0xNC4xLDEzLjZjNC43LTEyLjUsNi40LTIzLjMsMy43LTIzLjFDMjcxLjMsMjI5LjEsMjYwLDI2NSwyNjAsMjY1SDI0NXoiLz4NCjwvc3ZnPg0K";
	}
	if(HS=="Yes"){
		document.getElementById("yes").checked=true;
		document.getElementById("no").checked=false;
	}else if(HS=="No"){
		document.getElementById("yes").checked=false;
		document.getElementById("no").checked=true;
	}
	document.getElementById("showthis").style.display="none";
	document.getElementById("inputform").style.display="none";
	
	document.getElementById('imgcontainer').style.backgroundImage = "url('"+imgLink+"')";
	document.getElementById('inputClinicName').style.display="none";
	document.getElementById('AddressBar').style.display="none";
	document.getElementById('OwnerBar').style.display="none";
	document.getElementById('ServicesOfferedBar').style.display="none";
	document.getElementById('inputContact').style.display="none";
	document.getElementById('FBField').style.display="none";
	document.getElementById('InstaField').style.display="none";
	document.getElementById('WebField').style.display="none";
	document.getElementById('inputClinicDays').style.display="none";
	document.getElementById('inputClinicHours').style.display="none";
	document.getElementById('EmailField').style.display="none";
	document.getElementById('afterPassword').style.display="none";
	document.getElementById("changeUname").style.display = "none";
	function showoption(){
		document.getElementById("showthis").style.display="block";
	}
	function hideoption(){
		document.getElementById("showthis").style.display="none";
	}
	function showform(){
		document.getElementById("inputform").style.display="block";
	}
	function hideform(){
		document.getElementById("inputform").style.display="none";
	}
	
	//Part to change the Clinic Name
	function changeClinicName(){
			document.getElementById('inputClinicName').style.display="block";
	}
		//function to close or hide the input field for changing the clinic name
		function closeChangeClinicName(){
			document.getElementById('inputClinicName').style.display="none";
		}
		
		//function to save the changes in clinic name
		function SaveChangesInClinicName(){
			var newClinicName = document.getElementById('newClinicName').value;
			document.cookie = "updateClinicName=" + newClinicName;
			window.location='MY-CLINIC.php?updateNewClinicName=true';
			window.location='MY-CLINIC.php';
		}
	//end (change the Clinic Name)
	// ---------------------------------------------------------------------------------------------------------
	//Part to change Address
	function changeAddress(){
		document.getElementById('AddressBar').style.display="block";
	}
		//function to hide the address bar
		function closeAddressBar(){
			document.getElementById('AddressBar').style.display="none";
		}
		function SaveChangesInAddress(){
			var newAddress = document.getElementById('addressField').value;
			document.cookie = "updateAddress=" + newAddress;
			window.location='MY-CLINIC.php?updateNewAddress=true';
			window.location='MY-CLINIC.php';
		}
	//end(change Address)
	// ---------------------------------------------------------------------------------------------------------
	//function to change Owner Name
	function changeOwnerName(){
		document.getElementById('OwnerBar').style.display="block";
	}
		//function to hide Owner Bar
		function closeOwnerBar(){
			document.getElementById('OwnerBar').style.display="none";
		}
		function SaveChangesInOwnerName(){
			var newOwnerName = document.getElementById('OwnerField').value;
			document.cookie = "updateowner=" + newOwnerName;
			window.location='MY-CLINIC.php?updateNewOwner=true';
			window.location='MY-CLINIC.php';
		}
	//end(change Owner Name)
	// ---------------------------------------------------------------------------------------------------------
	//function to change Services offered
	function changeServicesOffered(){
		document.getElementById('ServicesOfferedBar').style.display="block";
	}
		//function to hide Owner Bar
		function closeServicesOfferedBar(){
			document.getElementById('ServicesOfferedBar').style.display="none";
		}
		function SaveChangesInServicesOffered(){
			var newServicesOffered = document.getElementById('ServicesOfferedField').value;
			newServicesOffered = newServicesOffered.replace(/\n/g,", ");
			document.cookie = "updateHomeServices=" + newServicesOffered;
			window.location='MY-CLINIC.php?updateServicesOffered=true';
			window.location='MY-CLINIC.php';
		}
	//end(change Owner Name)
	// ---------------------------------------------------------------------------------------------------------
	//function to Change HomeService
	function YesHS(){
		document.cookie = "updateHomeServiceR=Yes";
		window.location='MY-CLINIC.php?updateHomeService=true';
		window.location='MY-CLINIC.php';
	}
	function NoHS(){
		document.cookie = "updateHomeServiceR=No";
		window.location='MY-CLINIC.php?updateHomeService=true';
		window.location='MY-CLINIC.php';
	}
	//end(change HomeService)
	// ---------------------------------------------------------------------------------------------------------
	//function to change Contact
	function changeContact(){
		document.getElementById('inputContact').style.display="block";
	}
		//function to hide Owner Bar
		function closeChangeContact(){
			document.getElementById('inputContact').style.display="none";
		}
		function SaveChangesInContact(){
			var newServicesOffered = document.getElementById('newContact').value;
			document.cookie = "updateContact=" + newServicesOffered;
			window.location='MY-CLINIC.php?updateContactDetails=true';
			window.location='MY-CLINIC.php';
		}
	//end(change Owner Name)
	// ---------------------------------------------------------------------------------------------------------
	//function to change FB Link
	function changeFB(){
		document.getElementById('FBField').style.display="block";
	}
		//function to hide Owner Bar
		function closeChangeFB(){
			document.getElementById('FBField').style.display="none";
		}
		function SaveChangesInFB(){
			var newServicesOffered = document.getElementById('inputFB').value;
			document.cookie = "updateFB=" + newServicesOffered;
			window.location='MY-CLINIC.php?updateFBLink=true';
			window.location='MY-CLINIC.php';
		}
	//end(change FB Link)
	// ---------------------------------------------------------------------------------------------------------
	//function to change Insta Link
	function changeInstagram(){
		document.getElementById('InstaField').style.display="block";
	}
		//function to hide Owner Bar
		function closeChangeInsta(){
			document.getElementById('InstaField').style.display="none";
		}
		function SaveChangesInInsta(){
			var newServicesOffered = document.getElementById('inputInsta').value;
			document.cookie = "updateInsta=" + newServicesOffered;
			window.location='MY-CLINIC.php?updateInstaLink=true';
			window.location='MY-CLINIC.php';
		}
	//end(change Insta Link)
	// ---------------------------------------------------------------------------------------------------------
	//function to change Web Link
	function changeWeb(){
		document.getElementById('WebField').style.display="block";
	}
		//function to hide Owner Bar
		function closeChangeWeb(){
			document.getElementById('WebField').style.display="none";
		}
		function SaveChangesInWeb(){
			var newServicesOffered = document.getElementById('inputWeb').value;
			document.cookie = "updateWeb=" + newServicesOffered;
			window.location='MY-CLINIC.php?updateWebLink=true';
			window.location='MY-CLINIC.php';
		}
	//end(change Insta Link)
	// ---------------------------------------------------------------------------------------------------------
	//function to change Clinic Days
	function changeClinicDays(){
		document.getElementById('inputClinicDays').style.display="block";
	}
		//function to hide Owner Bar
		function closeChangeClinicDays(){
			document.getElementById('inputClinicDays').style.display="none";
		}
		function SaveChangesClinicDays(){
			var newServicesOffered = document.getElementById('newDays').value;
			document.cookie = "updateClinicDays=" + newServicesOffered;
			window.location='MY-CLINIC.php?updateDays=true';
			window.location='MY-CLINIC.php';
		}
	//end(change Clinic Days)
	// ---------------------------------------------------------------------------------------------------------
	//function to change Clinic Hours
	function changeClinicHours(){
		document.getElementById('inputClinicHours').style.display="block";
	}
		//function to hide Owner Bar
		function closeChangeClinicHours(){
			document.getElementById('inputClinicHours').style.display="none";
		}
		function SaveChangesClinicHours(){
			var newOpenning = document.getElementById('openning').value;
			var newClosing = document.getElementById('closing').value;
			document.cookie = "updateClinicOpenning=" + newOpenning;
			document.cookie = "updateClinicClosing=" + newClosing;
			window.location='MY-CLINIC.php?updateHours=true';
			window.location='MY-CLINIC.php';
		}
	//end(change Hours
	// ---------------------------------------------------------------------------------------------------------
	//function to change Email Link
	function changeEmail(){
		document.getElementById('EmailField').style.display="block";
	}
		//function to hide Owner Bar
		function closeChangeEmail(){
			document.getElementById('EmailField').style.display="none";
		}
		function SaveChangesInEmail(){
			var newServicesOffered = document.getElementById('inputEmail').value;
			document.cookie = "updateEmail=" + newServicesOffered;
			window.location='MY-CLINIC.php?updateEmailLink=true';
			window.location='MY-CLINIC.php';
		}
	//end(change Email Link)
	// ---------------------------------------------------------------------------------------------------------
	//function to change login Credentials
	function verifyPassword(){
		var pass = "<?php echo $Password ?>";
		if(document.getElementById('oldpass').value == pass){
			document.getElementById('afterPassword').style.display="block";
			document.getElementById('beforepassword').style.display="none";
		}else{
			alert("Oops, you entered your password wrong. Try again.");
		}
	}
	//// ---------------------------------------------------------------------------------------------------------
	function SaveNewCredentials(){
		var OldUsername = "<?php echo $Username ?>";
		var OldPassword = "<?php echo $Password ?>";
		var NewU = document.getElementById('NewUsername').value;
		var NewP = document.getElementById('NewPassword').value;
		if((OldUsername==NewU)&&(OldPassword==NewP)){
			//nothingchanged
			document.getElementById("changeUname").style.display = "none";
		}else{
			if(confirm("Are you sure you want this changes?")){
				document.cookie = "updateUsername=" + NewU;
				document.cookie = "updatePassword=" + NewP;
				window.location='MY-CLINIC.php?updateLoginCredentials=true';
				window.location='MY-CLINIC.php';
			}
			
		}
	}
	//---------------------------------------------------------------------------------------------------------------
	function hideThis(){
		document.getElementById("changeUname").style.display = "none";
	}
	//---------------------------------------------------------------------------------------------------------------
	function showChangeUname(){
		document.getElementById("changeUname").style.display = "block";
	}
	//-------------------------------------------------------------------------------------------------------
	</script>
  </body>
</html>