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
	}
}
if($_SERVER["REQUEST_METHOD"] == "POST"){

	$image = $_FILES['fileToUpload']['name'];
	//img file directory 
	$target = "images/dogs/".basename($image);
	$clinicID = $_SESSION["ID"];
	$PetsName = trim($_POST["PetName"]);
	$Breed = trim($_POST["Breed"]);
	$DateofBirth = trim($_POST["DateofBirth"]);
	$Color = trim($_POST["Color"]);
	$Species = trim($_POST["Species"]);
	$Sex = trim($_POST["Sex"]);
	$petID = $PetsName[0].$PetsName[1] . date("YmdHi");
	$OwnerID = $_SESSION["ID"];
	
	//$sql = "UPDATE `clinicowner` SET `Image`='images/".$image."' WHERE ClinicID='".$clinicID."'";
	$sql = "INSERT INTO `pet`(`image`, `PetName`, `Breed`, `DateofBirth`, `Color`, `Species`, `Sex`, `PetID`, `OwnerID`) VALUES 
	('images/dogs/".$image."','".$PetsName."','".$Breed."','".$DateofBirth."','".$Color."','".$Species ."','".$Sex."','".$petID."','".$OwnerID."')";
	if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target)){
             if ($conn->query($sql) === TRUE) {
				echo '<script>window.location="PETOWNERHOME.php";</script>';
			} else {
			echo "Error updating record: " . $conn->error;
			}
	}else if($image ==''){
		if ($conn->query($sql) === TRUE) {
				echo '<script>window.location="PETOWNERHOME.php";</script>';
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
    <title>ADD PET</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="ADD-PET.css" media="screen">
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
    <meta property="og:title" content="ADD PET">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body u-xl-mode">
    <section class="u-clearfix u-gradient u-section-1" id="sec-e3df">
	<a href="PETOWNERHOME.php" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-none u-text-palette-1-base u-btn-1" style="float:right"><span class="u-file-icon u-icon u-icon-1"><img src="images/4833552.png" alt=""></span>&nbsp;<span class="u-text-body-color" style="font-weight: 700; font-size: 1.125rem;">BACK</span>
        </a><br>
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-align-left u-container-style u-group u-opacity u-opacity-15 u-radius-50 u-shape-round u-white u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h3 class="u-text u-text-default u-text-1">Add Pet</h3>
            <div class="u-form u-form-1">
              <form action="#" method="POST" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" method="post" enctype="multipart/form-data" name="form" style="padding: 10px;">
                <div class="u-form-group u-form-name">
                  <label for="name-7e8f" class="u-form-control-hidden u-label u-label-1"></label>
				  <input type='hidden' name='fileToUpload' value="">
				  <input type="file" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" accept="image/*" style="border:1px solid black;" name="fileToUpload" id="fileToUpload">
                 <text style="color:gray;"><i>Pet's Image (Optional)</i></text>
				 </div>
				
				<div class="u-form-group u-form-name">
                  <label for="name-7e8f" class="u-form-control-hidden u-label u-label-1"></label>
                  <input type="text" placeholder="Pet's Name" id="name-7e8f" name="PetName" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                </div>
                <div class="u-form-email u-form-group">
                  <label for="email-7e8f" class="u-form-control-hidden u-label u-label-2"></label>
                  <input type="text" placeholder="Breed" id="email-7e8f" name="Breed" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                </div>
                <div class="u-form-group u-form-group-3">
                  <label for="text-d939" class=" u-label u-label-3">Date of Birth</label>
                  <input type="date" placeholder="Date of BIrth" id="text-d939" name="DateofBirth" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="required">
                </div>
                <div class="u-form-group u-form-group-4">
                  <label for="text-97bf" class="u-form-control-hidden u-label u-label-4"></label>
                  <input type="text" placeholder="Color/Markings" id="text-97bf" name="Color" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="required">
                </div>
                <div class="u-form-group u-form-group-5">
                  <label for="text-bb9f" class="u-form-control-hidden u-label u-label-5"></label>
                  <input type="text" placeholder="Species" id="text-bb9f" name="Species" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="required">
                </div>
                <div class="u-form-group u-form-select u-form-group-6">
                  <label for="select-6975" class="u-label u-label-6">SEX</label>
                  <div class="u-form-select-wrapper">
                    <input type="radio" name="Sex" value="Male" required><label> Male</Label> <input type="radio" name="Sex" value="Female" style="margin-left:20px" required><label> Female</Label>
					</div>
                </div>
                <div class="u-align-center u-form-group u-form-submit">
                  <input type="submit" value="ADD" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-2-base u-radius-50 u-btn-1">
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