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
	
	$sun = trim($_POST["CHSu"]);
	$mon = trim($_POST["CHM"]);
	$tue = trim($_POST["CHTu"]);
	$wed = trim($_POST["CHW"]);
	$thu = trim($_POST["CHTh"]);
	$fri = trim($_POST["CHF"]);
	$sat = trim($_POST["CHSa"]);
	$clinicdays = "";
	if ($sun!=""){
		$clinicdays = $clinicdays . $sun . " ";
	}
	if ($mon!=""){
		$clinicdays = $clinicdays . $mon . " ";
	}
	if ($tue!=""){
		$clinicdays = $clinicdays . $tue . " ";
	}
	if ($wed!=""){
		$clinicdays = $clinicdays . $wed . " ";
	}
	if ($thu!=""){
		$clinicdays = $clinicdays . $thu . " ";
	}
	if ($fri!=""){
		$clinicdays = $clinicdays . $fri . " ";
	}
	if ($sat!=""){
		$clinicdays = $clinicdays . $sat . " ";
	}
	$clinicdays = substr($clinicdays,0,-1);
	$name = trim($_POST["name"]);
	$clinicname = trim($_POST["clinicname"]);
	$address = trim($_POST["address"]);
	$cho = trim($_POST["cho"]);
	$choconv = date_create($cho);
	$cho = date_format($choconv, "His");
	$chc = trim($_POST["chc"]);
	$chcconv = date_create($chc);
	$chc =date_format($chcconv, "His");
	$services = trim($_POST["services"]);
	$email = trim($_POST["email"]);
	$contact = trim($_POST["contact"]);
	$clinicID = $clinicname[0].$clinicname[1] . date("YmdHi");
	
	$sql = "INSERT INTO `clinicowner`
	(`Username`, `Password`, `owner`, `ClinicName`, `Address`, `ClinicDays`, `CH-Open`, `CH-Close`, `ServicesOffered`, `ContactDetails`, `Email`, `ClinicID`)
	VALUES('".$username."','".$password."','".$name."','".$clinicname."','".$address."','".$clinicdays."',".$cho.",".$chc.",'".$services."','".$contact."','".$email."','".$clinicID."')";

	if ($conn->query($sql) === TRUE) {
		echo "<script>alert('Account Created')</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

$conn->close(); 
	//echo '<script>alert("'.$clinicID.'")</script>';
	
}
?>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="SIGN UP">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>CLINIC SIGN UP</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="CLINIC-SIGN-UP.css" media="screen">
  <!--  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>  -->
    <meta name="generator" content="Nicepage 4.2.6, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="CLINIC SIGN UP">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">
    <section class="u-clearfix u-gradient u-section-1" id="sec-e5a6">
      <div class="u-clearfix u-sheet u-sheet-1">
        <a href="SIGN-IN.php" data-page-id="60618415" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-none u-text-palette-1-base u-btn-1"><span class="u-file-icon u-icon u-icon-1"><img src="images/4833552.png" alt=""></span>&nbsp;<span class="u-text-body-color" style="font-weight: 700; font-size: 1.125rem;">BACK</span>
        </a>
        <div class="u-border-7 u-border-grey-75 u-container-style u-group u-radius-50 u-shape-round u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h1 class="u-custom-font u-font-georgia u-text u-text-body-alt-color u-text-default u-text-1">CLINIC SIGN UP</h1>
            <div class="u-form u-form-1">
              <form action="#" method="POST" class="u-clearfix u-form-spacing-9 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 9px;">
                <div class="u-form-group u-form-name">
                  <label for="name-d6da" class="u-form-control-hidden u-label"></label>
                  <input type="text" placeholder="Username" id="username" name="username" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                </div>
				<div class="u-form-group u-form-name">
                  <label for="name-d6da" class="u-form-control-hidden u-label"></label>
                  <input type="text" placeholder="Password" id="password" name="password" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                <label>*Will be used for your Login</label>
				</div>
				<div class="u-form-group u-form-name">
                  <label for="name-d6da" class="u-form-control-hidden u-label"></label>
                  <input type="text" placeholder="Your Name(Owner)" id="username" name="name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                </div>
				<div class="u-form-group u-form-name">
				<label for="name-d6da" class=" u-label">Clinic Days</label><br><center>
                  <input type="hidden" placeholder="Clinic Name" id="name-d6da" name="CHSu" class="" value="">
				  <input type="checkbox" placeholder="Clinic Name" id="name-d6da" name="CHSu" class="" value="Sunday"><label for="name-d6da" class="" style="margin-right:10px"> Sun </label>
                  
				  <input type="hidden" placeholder="Clinic Name" id="name-d6da" name="CHM" class="" value="">
				  <input type="checkbox" placeholder="Clinic Name" id="name-d6da" name="CHM" class="" value="Monday"><label for="name-d6da" class="" style="margin-right:10px"> Mon </label>
                  
				  <input type="hidden" placeholder="Clinic Name" id="name-d6da" name="CHTu" class="" value="">
				  <input type="checkbox" placeholder="Clinic Name" id="name-d6da" name="CHTu" class="" value="Tuesday"><label for="name-d6da" class="" style="margin-right:10px"> Tue </label>
                  
				  <input type="hidden" placeholder="Clinic Name" id="name-d6da" name="CHW" class="" value="">
				  <input type="checkbox" placeholder="Clinic Name" id="name-d6da" name="CHW" class="" value="Wednesday"><label for="name-d6da" class="" style="margin-right:10px"> Wed </label>
                  
				  <input type="hidden" placeholder="Clinic Name" id="name-d6da" name="CHTh" class="" value="">
				  <input type="checkbox" placeholder="Clinic Name" id="name-d6da" name="CHTh" class="" value="Thursday"><label for="name-d6da" class="" style="margin-right:10px"> Thu </label>
                  
				  <input type="hidden" placeholder="Clinic Name" id="name-d6da" name="CHF" class="" value="">
				  <input type="checkbox" placeholder="Clinic Name" id="name-d6da" name="CHF" class="" value="Friday"><label for="name-d6da" class="" style="margin-right:10px"> Fri </label>
                  
				  <input type="hidden" placeholder="Clinic Name" id="name-d6da" name="CHSa" class="" value="">
				  <input type="checkbox" placeholder="Clinic Name" id="name-d6da" name="CHSa" class="" value="Saturday"><label for="name-d6da" class="" style="margin-right:10px"	> Sat </label>
				</center>
				</div>
				<div class="u-form-group u-form-name">
                  <label for="name-d6da" class="u-form-control-hidden u-label"></label>
                  <input type="text" placeholder="Clinic Name" id="name-d6da" name="clinicname" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                </div>
                <div class="u-form-address u-form-group u-form-group-2">
                  <label for="address-ab64" class="u-form-control-hidden u-label"></label>
                  <input type="text" placeholder="Enter your clinic address" id="address-ab64" name="address" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                </div>
                <div class="u-form-group u-form-partition-factor-2">
                  <label for="email-d6da" class=" u-label">Clinic Hour: Open:</label>
                  <input type="time" placeholder="Clinic Hour: Open:" id="email-d6da" name="cho" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="required">
                </div>
                <div class="u-form-group u-form-partition-factor-2 u-form-group-5">
                  <label for="text-e163" class="u-label">Clinic Hour: Close:</label>
                  <input type="time" placeholder="" id="text-e163" name="chc" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
                </div>
                
                <div class="u-form-group u-form-textarea u-form-group-7">
                  <label for="textarea-2d7c" class="u-form-control-hidden u-label"></label>
                  <textarea rows="4" cols="50" id="textarea-2d7c" name="services" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="" placeholder="Services Offered:"></textarea>
                </div>
				<div class="u-form-group u-form-group-8">
                  <label for="text-9a2b" class="u-form-control-hidden u-label"></label>
                  <input type="email" placeholder="Email:" id="text-9a2b" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
                </div>
                <div class="u-form-group u-form-group-8">
                  <label for="text-9a2b" class="u-form-control-hidden u-label"></label>
                  <input type="text" placeholder="Contact Details:" id="text-9a2b" name="contact" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
                </div>
                <div class="u-align-center u-form-group u-form-submit">
                  <input type="submit" value="submit" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-2-light-1 u-radius-50 u-btn-2">
                </div>
              </form>
            </div>
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