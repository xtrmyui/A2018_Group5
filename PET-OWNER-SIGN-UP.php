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
	$name = trim($_POST["name"]);
	$address = trim($_POST["address"]);
	$email = trim($_POST["email"]);
	$contact = trim($_POST["contact"]);
	$petownerID = $username[0].$username[1] . date("YmdHi");

	$sql = "INSERT INTO `petowner`(`Username`, `Password`, `FullName`, `Address`, `Email`, `ContactNumber`, `PetOwnerID`) VALUES
	('".$username."','".$password."','".$name."','".$address."','".$email."','".$contact."','".$petownerID."')";

	if ($conn->query($sql) === TRUE) {
		echo "<script>alert('Account Created')</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

$conn->close();  
	//echo '<script>alert("'.$clinicID.'")</script>';
	
}
?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="SIGN UP">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>PET OWNER SIGN UP</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="PET-OWNER-SIGN-UP.css" media="screen">
 <!--   <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
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
    <meta property="og:title" content="PET OWNER SIGN UP">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body"> 
    <section class="u-clearfix u-gradient u-section-1" id="sec-0ef8">
      <div class="u-clearfix u-sheet u-sheet-1">
        <a href="SIGN-IN.php" data-page-id="325928827" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-none u-text-palette-1-base u-btn-1"><span class="u-file-icon u-icon u-icon-1"><img src="images/4833552.png" alt=""></span>&nbsp;<span class="u-text-body-color" style="font-weight: 700; font-size: 1.125rem;">BACK</span>
        </a>
        <div class="u-border-7 u-border-grey-75 u-container-style u-group u-radius-50 u-shape-round u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h1 class="u-custom-font u-font-georgia u-text u-text-body-alt-color u-text-default u-text-1">PET OWNER SIGN UP</h1>
            <div class="u-form u-form-1">
              <form action="#" method="POST" class="u-clearfix u-form-spacing-9 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 9px;">
                <div class="u-form-group u-form-name">
                  <label for="name-d6da" class="u-form-control-hidden u-label"></label>
                  <input type="text" placeholder="Username" id="name-d6da" name="username" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                </div>
                <div class="u-form-address u-form-group u-form-group-2">
                  <label for="address-ab64" class="u-form-control-hidden u-label"></label>
                  <input type="text" placeholder="Password" id="address-ab64" name="password" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                </div>
                <div class="u-form-group u-form-group-3">
                  <label for="text-9a2b" class="u-form-control-hidden u-label"></label>
                  <input type="text" placeholder="Owners Name" id="text-9a2b" name="name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
                </div>
                <div class="u-form-group u-form-group-4">
                  <label for="text-51d7" class="u-form-control-hidden u-label"></label>
                  <input type="text" placeholder="Address" id="text-51d7" name="address" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
                </div>
                <div class="u-form-group u-form-group-5">
                  <label for="text-1a42" class="u-form-control-hidden u-label"></label>
                  <input type="text" placeholder="Email" id="text-1a42" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
                </div>
                <div class="u-form-group u-form-group-6">
                  <label for="text-511b" class="u-form-control-hidden u-label"></label>
                  <input type="text" placeholder="Contact Number" id="text-511b" name="contact" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
                </div>
                <div class="u-align-center u-form-group u-form-submit">
                  <input type="submit" value="SIGN-UP" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-2-light-1 u-radius-50 u-btn-2">
                </div>
                
              </form>
            </div>
            <a href="CLINIC-SIGN-UP.php" data-page-id="452601159" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-none u-text-body-alt-color u-btn-3">Register your Clinic?</a>
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