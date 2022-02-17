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
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$password = trim($_POST["password"]);
	$username = trim($_POST["username"]);
	$sql = "SELECT * FROM `clinicowner` where Username='".$username."' and Password='".$password."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
	  // Account belongs to a clinic owner 
	  $_SESSION["loggedin"] = true;
	  $_SESSION["ID"] = $row['ClinicID'];
	  $_SESSION["NAME"] = $row['ClinicName'];
	  $_SESSION['Acc'] ='ClinicOwner';
	  // Redirect User to clinic dashboard
     header("location: CLINICDASHBOARD.php");
  }
} else {
	$sql = "SELECT * FROM `petowner` where Username='".$username."' and Password='".$password."'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
  // verify
		while($row = $result->fetch_assoc()) {
			//Account belongs to a pet owner
			 $_SESSION["loggedin"] = true;
			 $_SESSION["ID"] = $row['PetOwnerID'];
			 $_SESSION["NAME"] = $row['FullName'];
			 $_SESSION['Acc'] ='PetOwner';
			//redirect user to home
			header("location: PETOWNERHOME.php");
		}
	} else {
		$sql = "SELECT * FROM `adminacc` where Username='".$username."' and Password='".$password."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
  // verify
			while($row = $result->fetch_assoc()) {
				 $_SESSION["id"] = $AccID;
                 $_SESSION["name"] = $FullName;
                            // Redirect user to welcome page
                     header("location: DASHBOARD.php");
			}
		} else {
			echo "<script>alert('Account Does not exist.Try Again')</script>";
		}
	}
}
$conn->close();
	//echo '<script>alert("Trying to sign in")</script>';
}
?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="LOGIN">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>SIGN IN</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="SIGN-IN.css" media="screen">
   <!-- <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script> -->
    <meta name="generator" content="Nicepage 4.2.6, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="SIGN IN">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">
    <section class="u-clearfix u-gradient u-section-1" id="sec-cd73">
      <div class="u-clearfix u-sheet u-sheet-1">
        <a href="index.php" data-page-id="325928827" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-none u-text-palette-1-base u-btn-1"><span class="u-file-icon u-icon u-icon-1"><img src="images/4833552.png" alt=""></span>&nbsp;<span class="u-text-body-color" style="font-weight: 700; font-size: 1.125rem;">BACK</span>
        </a>
        <div class="u-border-7 u-border-grey-75 u-container-style u-group u-radius-50 u-shape-round u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h2 class="u-custom-font u-font-georgia u-text u-text-default u-text-white u-text-1">LOGIN</h2>
            <div class="u-form u-form-1">
              <form action="#" method="POST" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 10px;">
                <div class="u-form-group u-form-name">
                  <label for="name-7ea5" class="u-form-control-hidden u-label"></label>
                  <input type="text" placeholder="Enter your username" id="name-7ea5" name="username" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                </div>
                <div class="u-form-email u-form-group">
                  <label for="email-7ea5" class="u-form-control-hidden u-label"></label>
                  <input type="password" placeholder="Enter your password" id="email-7ea5" name="password" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                </div>
                <div class="u-align-center u-form-group u-form-submit">
                  <input type="submit" value="Login" class="u-border-none u-btn u-btn-submit u-button-style u-palette-2-light-1 u-btn-2">
                 
                </div>
            
              </form>
            </div>
            <a href="CLINIC-SIGN-UP.php" class="u-border-1 u-border-active-palette-2-base u-border-hover-black u-btn u-button-style u-none u-text-body-color u-btn-3">No Account Yet? Sign up as Clinic Owner</a>
			<a href="PET-OWNER-SIGN-UP.php" class="u-border-1 u-border-active-palette-2-base u-border-hover-black u-btn u-button-style u-none u-text-body-color u-btn-3">or Pet Owner</a>
          
          </div>
        </div>
      </div>
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
  </body>
</html>