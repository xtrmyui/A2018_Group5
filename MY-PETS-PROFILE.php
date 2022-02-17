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

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "petvaccination";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	//get image name
	$image = $_FILES['fileToUpload']['name'];
	//img file directory 
	$target = "images/dogs/".basename($image);

	$IDpic = trim($_POST["ID"]);
		$sql = "UPDATE `pet` SET `image`='images/dogs/".$image."' WHERE PetID='".$IDpic."'";
	
	if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target)){
             if ($conn->query($sql) === TRUE) {
				 
				echo '<script>window.location="MY-PETS-PROFILE.php";</script>';
			} else {
			echo "Error updating record: " . $conn->error;
			}
	} 
	
	
                    
		

$conn->close(); 
}
//---------------------------------------------------------------------------------------------------------
//php function to change 
if (isset($_GET['updateChange'])) {
    UpdateChanges();
	}
	function UpdateChanges(){
			
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "petvaccination";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$update1 = $_COOKIE['updateName'];
		$update2 = $_COOKIE['updateBreed'];
		$update3 = $_COOKIE['updateBday'];
		$update3 = date_create($update3);
		$update3 = date_format($update3,"Ymd");
		$update4 = $_COOKIE['updateSpecies'];
		$update5 = $_COOKIE['updateColor'];
		$petID = $_COOKIE['updateID'];
		$sql = "UPDATE `pet` SET `PetName`='".$update1."',`Breed`='".$update2."',`DateofBirth`='".$update3."',`Species`='".$update4."',`Color`='".$update5."' WHERE PetID='".$petID."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

$conn->close();
	}
// ---------------------------------------------------------------------------------------------------------
if (isset($_GET['del'])) {
    deletePet();
	}
	function deletePet(){$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "petvaccination";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$id = $_COOKIE['deletePet'];
		$sql = "UPDATE `pet` SET deleted='Yes' where PetID='".$id."'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
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
    <title>MY PETS PROFILE</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="MY-PETS-PROFILE.css" media="screen">
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
 .card2 {
  width: 250px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
  .part1, .part2{
	width:40%;
	float:left;
}
.part3{
	width:20%;
	float:left;
}
.buttonPart{
	width:100%;
	margin:10px 0 10px 0;
	border:none;
	padding:5px;
	border-radius:5px;
}
@media (max-width: 767px) {
	  .part1, .part2{
	width:100%;
	float:left;
}
.part3{
	width:100%;
	float:left;
}
.buttonPart{
	font-size:14px;
	width:95%;
	float:left;
	margin:5px;
}
}
  </style>
  
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="MY PETS PROFILE">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body u-xl-mode"><header class="u-clearfix u-header u-palette-1-base u-header" id="sec-c7a2"><div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="letter-spacing: 0px; font-size: 1.25rem; font-weight: 700;">
            <a class="u-button-style u-custom-active-color u-custom-left-right-menu-spacing u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-nav-link" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-0173"></use></svg>
              <svg class="u-svg-content" version="1.1" id="svg-0173" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="PETOWNERHOME.php" style="padding: 10px 14px;">HOME</a>
</li><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="MY-PETS-PROFILE.php" style="padding: 10px 14px;">MY PETS PROFILE</a>
</li><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="MY-APPOINTMENTS.php" style="padding: 10px 14px;">MY APPOINTMENTS</a>
</li><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="MESSAGES.php" style="padding: 10px 14px;">MESSAGES</a>
</li><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="LOGOUT.php" style="padding: 10px 14px;">LOGOUT</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="PETOWNERHOME.php" style="padding: 10px 14px;">HOME</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="MY-PETS-PROFILE.php" style="padding: 10px 14px;">MY PETS PROFILE</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="MY-APPOINTMENTS.php" style="padding: 10px 14px;">MY APPOINTMENTS</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="MESSAGES.php" style="padding: 10px 14px;">MESSAGES</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="LOGOUT.php" style="padding: 10px 14px;">LOGOUT</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
	  
			   
    <section class="u-clearfix u-section-1" id="sec-e3df">
	<div class="card" id="inputform" style="background-color:white;position:fixed;width:400px;z-index:10;top:50%;left:50%;transform:translate(-50%,-50%)">
			   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
			   <i class="bi bi-x-lg" style="float:right;margin:10px;cursor:pointer;" onclick="hideform()"></i><br>	<br>
			   <label>Upload a picture of your pet</label><br><br>
			   <input type="hidden" name="ID" id="ID">
			   <input type="hidden" name="fileToUpload" value="">
			   <input type="file" accept="image/*" style="border:1px solid black;" name="fileToUpload" id="fileToUpload"><br><br>
			   <button type="reset" style="margin:5px;"><i class="bi bi-arrow-clockwise"></i> Reset</button><button type="submit" style="margin:5px;"><i class="bi bi-upload"></i> Submit</button>
			   <br><br>
			   </form>
			   </div>
	
		
	
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-10 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
		  <!-- Start -->
			  <?php
			  $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "petvaccination";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
				$ID = $_SESSION["ID"];
				$sql = "SELECT * FROM `pet` WHERE  OwnerID='".$ID."' and deleted=''";
				$result = $conn->query($sql);
				$petInfo = array();
				$cnt = 0;
				if ($result-> num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$bday = date_create($row['DateofBirth']);
						$bday = date_format($bday, "F j, Y");
						$image = $row['image'];
						if($image==""){
							$image = "data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJkZWZhdWx0LWltYWdlLXNvbGlkIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNDAwIDI2NSIgc3R5bGU9IndpZHRoOiA0MDBweDsgaGVpZ2h0OiAyNjVweDsiPg0KPHJlY3QgZmlsbD0iI0M2RDhFMSIgd2lkdGg9IjQwMCIgaGVpZ2h0PSIyNjUiLz4NCjxwYXRoIGZpbGw9IiNEOUUzRTgiIGQ9Ik0zOTUuMyw5Ni4yYy01LTAuOC02LjEsMS4xLTguNSwyLjljLTEtMi4zLTIuNi02LjItNy43LTVjMS41LTUuMy0yLjYtOC40LTcuNy04LjRjLTAuNiwwLTEuMiwwLjEtMS44LDAuMg0KCWMtMS44LTQuMS02LTYuOS0xMC43LTYuOWMtNi41LDAtMTEuOCw1LjMtMTEuOCwxMS44YzAsMC40LDAsMC45LDAuMSwxLjNjLTEuMi0wLjgtMi41LTEuMy0zLjktMS4zYy00LjMsMC03LjksNC4yLTcuOSw5LjQNCgljMCwxLjIsMC4yLDIuNCwwLjYsMy41Yy0wLjUtMC4xLTEtMC4xLTEuNi0wLjFjLTYuOSwwLTEyLjUsNS41LTEyLjcsMTIuNGMtMC45LTAuMi0xLjktMC40LTIuOS0wLjRjLTYuNCwwLTExLjcsNS4yLTEyLjUsMTEuOA0KCWMtMS4yLTAuNC0yLjUtMC42LTMuOS0wLjZjLTUuOSwwLTEwLjgsMy44LTEyLjEsOC45Yy0yLjQtMi01LjUtMy4yLTguOS0zLjJjLTYsMC0xMS4xLDMuNy0xMi44LDguOGMtMS41LTEuNC0zLjgtMi4zLTYuMy0yLjMNCgljLTIuMSwwLTQuMSwwLjYtNS41LDEuN2gtMC4xYy0xLjMtNS41LTYuMi05LjUtMTIuMS05LjVjLTIuNCwwLTQuNywwLjctNi42LDEuOWMtMS40LTAuNy0zLTEuMi00LjgtMS4yYy0wLjMsMC0wLjUsMC0wLjgsMA0KCWMtMS41LTQuMS01LjItNy05LjUtN2MtMy4xLDAtNS45LDEuNS03LjgsMy45Yy0yLjItNC44LTYuOC04LjItMTIuMi04LjJjLTUuNiwwLTEwLjUsMy43LTEyLjUsOC44Yy0yLjEtMC45LTQuNC0xLjUtNi45LTEuNQ0KCWMtNi44LDAtMTIuNSwzLjktMTQuNSw5LjNjLTAuMiwwLTAuNSwwLTAuNywwYy01LjIsMC05LjYsMy4yLTExLjQsNy44Yy0yLjctMi44LTctNC41LTExLjgtNC41Yy0zLjMsMC02LjQsMC45LTguOSwyLjMNCgljLTIuMS02LjUtOC0xMi4yLTE4LjEtOS45Yy0yLjctMi4zLTYuMy0zLjctMTAuMS0zLjdjLTIuNSwwLTQuOCwwLjYtNi45LDEuNmMtMi4yLTUuOS03LjktMTAuMS0xNC42LTEwLjFjLTguNiwwLTE1LjYsNy0xNS42LDE1LjYNCgljMCwwLjksMC4xLDEuNywwLjIsMi41Yy0yLjYtNS03LjgtOC40LTEzLjgtOC40Yy04LjMsMC0xNS4xLDYuNS0xNS42LDE0LjZjLTIuOS0zLjItNy01LjMtMTEuNy01LjNjLTcuNCwwLTEzLjUsNS4xLTE1LjIsMTINCgljLTIuOS0zLjUtOS44LTYtMTQuNy02djExOS4yaDQwMFYxMDJDNDAwLDEwMiw0MDAsOTcsMzk1LjMsOTYuMnoiLz4NCjxwYXRoIGZpbGw9IiM4RUE4QkIiIGQ9Ik00MDAsMjA2LjJjMCwwLTI1LjMtMTkuMi0zMy42LTI1LjdjLTEzLjQtMTAuNi0yMy4xLTEyLjktMzEuNy03cy0yMy45LDE5LjctMjMuOSwxOS43cy01OC45LTYzLjktNjEuNS02Ni40DQoJYy0xLjUtMS40LTMuNi0xLjctNS41LTAuOWMtNS4yLDIuNC0xNy42LDkuNy0yNC41LDEyLjdjLTYuOSwyLjktNDEtNTAuNy00OS42LTUzcy04NC4zLDgzLjMtMTAxLjQsNzUuMXMtMjYuOS0yLjMtMzUuNCwzLjUNCgljLTguNiw1LjktMTEsNS45LTE1LjksOC4ycy0xNy4xLTUuOS0xNy4xLTUuOVYyNjVjMCwwLDQwMCwwLjIsNDAwLDB2LTU4LjhINDAweiIvPg0KPHBhdGggZmlsbD0iIzdFOTZBNiIgZD0iTTMzMy40LDE3OWMtMTMuMS05LjMtNDAsNC42LTU1LjEsMTAuN2MtMjMuNiw5LjYtOTQtNTQuNC0xMDcuMi01OS43YzAsMC00LjIsMy43LTkuNiw3LjYNCgljLTMuNS0wLjQtOC40LTUuNy05LjktNC43Yy00LjYsMy4xLTE3LjgsMTUuNC0yOC4zLDI2LjZjLTEwLjUsMTEuMy0xMS43LDAtMTUuOC0wLjZjLTIuNS0wLjQtNTQuMSw0Mi41LTU4LjcsNDMuMQ0KCUMyMi4zLDIwNS4zLDAsMTk3LjUsMCwxOTcuNVYyNjVsNDAwLTAuMXYtNTMuM0M0MDAsMjExLjYsMzQ0LjgsMTg3LjEsMzMzLjQsMTc5eiIvPg0KPHBhdGggZmlsbD0iIzc4OEY5RSIgZD0iTTAsMjY0Ljl2LTU4LjZjMCwwLDguMiwxLjgsMTEuMyw1LjNjMy4xLDMuNiwyNi4xLTQuMiwyNi4xLDQuN3MwLjUsNC4yLDAuNSwxNC44YzAsMTAuNywyMy00LjIsMzguMS0xOC40DQoJczM0LjktNDkuMiwzNi0zNWMxLDE0LjItMTUuMSwzOS4yLTI0LDU2LjRDNzkuMSwyNTEuNCw1MS43LDI2NSw1MS43LDI2NUwwLDI2NC45eiIvPg0KPHBhdGggZmlsbD0iIzc4OEY5RSIgZD0iTTEwMCwyNjVjMCwwLDY2LjctMTI1LjEsNjguMy0xMTYuOHMtNi44LDI5LjcsMi4xLDI2LjFjOC45LTMuNiwxNC42LTE2LDE4LjgtOS41czE2LjIsMzguNiwyMS45LDMzLjgNCgljNS43LTQuNywyMS40LTEzLjEsMjIuNC02LjVjMSw2LjUtMSw1LjMtNS43LDIwLjJDMjIzLjEsMjI3LjEsMjAwLDI2NSwyMDAsMjY1aC0xMGMwLDAsNi0yNC44LDguNi0zNC45YzIuNi0xMC4xLTMuNy0xOS0xMi04LjMNCglzLTIzLDIyLTI0LDE3LjhzLTUuNy0zMC4zLTE4LjgtMTQuMmMtMTMsMTYtMzMuOCwzOS43LTMzLjgsMzkuN2gtMTBWMjY1eiIvPg0KPHBhdGggZmlsbD0iIzc4OEY5RSIgZD0iTTI0NSwyNjVjMCwwLDE5LjgtNTQuNywzMy40LTY0LjJzNTMuNy0yNy45LDQ2LjktMTMuNmMtNi44LDE0LjItMTEsMzQuNC0yMC4zLDQ5LjgNCgljLTkuNCwxNS40LTE4LjgsMjYuMS0xNC4xLDEzLjZjNC43LTEyLjUsNi40LTIzLjMsMy43LTIzLjFDMjcxLjMsMjI5LjEsMjYwLDI2NSwyNjAsMjY1SDI0NXoiLz4NCjwvc3ZnPg0K";
						}
						$petInfo[$cnt]['PetID'] = $row['PetID'];
						$petInfo[$cnt]['PetName'] = $row['PetName'];
						$petInfo[$cnt]['Breed'] = $row['Breed'];
						$petInfo[$cnt]['DateofBirth'] = $row['DateofBirth'];
						$petInfo[$cnt]['Species'] = $row['Species'];
						$petInfo[$cnt]['Color'] = $row['Color'];
						$cnt++;
						
						echo ' <div class="u-layout-row">
              <div style="background-image:url('.$image.')" class="u-container-style u-image u-layout-cell u-size-14 u-image-1" data-image-width="2000" data-image-height="1333" style="border:1px solid black">
              <div style="cursor:pointer;position:absolute;z-index:20;"> <i class="bi bi-pencil-square" style="color:blue;background-color:white;padding:8px;border-radius:20px;cursor:pointer;" id="'.$row['PetID'].'" onclick="picture(this.id)"></i></div>
			   <div class="u-container-layout u-container-layout-1"></div>
              </div>
			  <div class="u-container-style u-layout-cell u-palette-1-light-3 u-size-46 u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2" style="border:1px solid black"><br>
				<div class="part1">
				<text style="font-size:20px;" id="'.$row['PetID'].'Pet">'.$row['PetName'].'</text><br>
				<text style="color:gray;font-size:14px;"><i><b>PET\'S NAME</b></i></text><BR><br>
				
				<text id="'.$row['PetID'].'Breed" >'.$row['Breed'].'</text><br>
				<text style="color:gray;font-size:14px;"><i><b>BREED</b></i></text><br><br>

				<text id="'.$row['PetID'].'DOB">'.$bday.'</text><br>
				<i><b><text style="color:gray;font-size:14px;">DATE OF BIRTH</text></b></i>
				</div>
				<div class="part2">
				<text id="'.$row['PetID'].'Species">'.$row['Species'].'</text><br>
				<text style="color:gray;font-size:14px;"><i><b>SPECIES</b></i></text><br><br>
				
				<text>'.$row['Sex'].'</text><br>
				<text style="color:gray;font-size:14px;"><i><b>SEX</b></i></text><br><br>

				<text id="'.$row['PetID'].'Color">'.$row['Color'].'</text><br>
				<text style="color:gray;font-size:14px;"><i><b>COLOR/MARKINGS</b></i></text><br><br>
				</div>
				<div class="part3">
				<center>
				<button class="buttonPart" style="background-color:transparent;cursor:pointer" id="'.$row['PetID'].'" onclick="Edit(this.id)"><i class="bi bi-pencil-square" style="color:blue;"> Edit PET\'S Info</i></button>
				<button class="buttonPart" style="background-color:#89cff0" id="'.$row['PetID'].'" onclick="SetAppoinment(this.id)">SET FOR APPOINTMENT</button>
				<button class="buttonPart" style="background-color:#68bb59" id="'.$row['PetID'].'" onclick="ViewRecord(this.id)">VIEW VACCINATION RECORD</button>
				<button class="buttonPart" style="background-color:#ff6863" id="'.$row['PetID'].'" onclick="Remove(this.id)">REMOVE THIS PET</button></center>
							</div>
                </div>
              </div>
            </div><br>';
				
					}
				}
			  ?>
			<!-- end -->
          </div>
        </div>
      </div>
    </section>
    <div class="card2" id="inputform2" style="background-color:white;position:fixed;width:400px;z-index:10;top:50%;left:50%;transform:translate(-50%,-50%);">
			 
			   <i class="bi bi-x-lg" style="float:right;margin:10px;cursor:pointer;" onclick="hideform2()"></i><br>	<br>
			  <center> <label><i class="bi bi-gear-fill" style="color:blue;"></i> Edit your Pet's Info</label></center><br><hr>
			   <input type="hidden" name="ID2" id="ID2">
			   <input type="text" id="PetName" name="PetName" placeholder="Pet's Name" style="margin-left:20px;width:350px;" ><br>
			   <label for="PetName" style="margin-left:20px;font-size:14px;color:gray;"><i><b>Pet's Name</b></i></label><br><br>
			   <input type="text" id="Breed" name="Breed" placeholder="Breed" style="margin-left:20px;width:350px;" ><br>
			   <label for="Breed" style="margin-left:20px;font-size:14px;color:gray;"><i><b>Breed</b></i></label><br><br>
			   <input type="text" id="DateofBirth" name="DateofBirth" placeholder="Date of Birth" style="margin-left:20px;width:350px;" ><br>
			   <label for="Date of Birth" style="margin-left:20px;font-size:14px;color:gray;"><i><b>Date of Birth</b></i></label><br><br>
			   <input type="text" id="Species" name="Species" placeholder="Species" style="margin-left:20px;width:350px;" ><br>
			   <label for="Species" style="margin-left:20px;font-size:14px;color:gray;"><i><b>Species</b></i></label><br><br>
			   <input type="text" id="Color" name="Color" placeholder="Color" style="margin-left:20px;width:350px;" ><br>
			   <label for="Color" style="margin-left:20px;font-size:14px;color:gray;"><i><b>Color</b></i></label><br><br>
			   <center>
			   <button type="submit" style="margin:5px;" onclick="SaveChanges()"><i class="bi bi-upload"></i> Submit</button></center>
			   
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
	document.getElementById('inputform').style.display = "none";
	document.getElementById('inputform2').style.display = "none";
	function picture(id){
		document.getElementById('inputform').style.display = "block";
		document.getElementById('ID').value= id;
		
	}
	function hideform(){
		document.getElementById('inputform').style.display = "none";
	}
	function Edit(id){
		document.getElementById('inputform2').style.display = "block";
		document.getElementById('ID2').value = id;
		document.getElementById('PetName').value = document.getElementById(id+'Pet').innerHTML;
		document.getElementById('Breed').value = document.getElementById(id+'Breed').innerHTML;
		document.getElementById('DateofBirth').value = document.getElementById(id+'DOB').innerHTML;
		document.getElementById('Species').value = document.getElementById(id+'Species').innerHTML;
		document.getElementById('Color').value = document.getElementById(id+'Color').innerHTML;
		
		
	}
	function hideform2(){
		document.getElementById('inputform2').style.display = "none";
		
	}
	function SaveChanges(){
		var OldID = document.getElementById('ID2').value;
		var OldName = document.getElementById('PetName').value;
		var OldBreed = document.getElementById('Breed').value;
		var OldBday = document.getElementById('DateofBirth').value;
		var OldSpecies = document.getElementById('Species').value;
		var OldColor = document.getElementById('Color').value;
			if(confirm("Are you sure you want this changes?")){
				document.cookie = "updateID=" + OldID;
				document.cookie = "updateName=" + OldName;
				document.cookie = "updateBreed=" + OldBreed;
				document.cookie = "updateBday=" + OldBday;
				document.cookie = "updateSpecies=" + OldSpecies;
				document.cookie = "updateColor=" + OldColor;
				window.location='MY-PETS-PROFILE.php?updateChange=true';
				window.location='MY-PETS-PROFILE.php'; 
			}
	}
	function SetAppoinment(id){
		document.cookie = "petID=" + id + ";'';path=/";
		window.open("CHOOSE-CLINIC.php","_self");
	}
	function ViewRecord(id){
		document.cookie = "petID=" + id + ";'';path=/";
		window.open("PetRecord.php","_self");
	}
	function Remove(id){
		if(confirm("Are you sure you want to remove this pet?")){
			document.cookie = "deletePet=" + id;
		window.location='MY-PETS-PROFILE.php?del=true';
		window.location='MY-PETS-PROFILE.php'; 
		}
		
	}
	</script>
  </body>
</html>