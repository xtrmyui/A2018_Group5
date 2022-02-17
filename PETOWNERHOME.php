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
		
		
	}else{
		if($_SESSION["Acc"]!="PetOwner"){
			header("Location: SIGN-IN.php?loginfirst");
		exit();
		}
		$ID = $_SESSION["ID"];
		$sql = "SELECT * FROM `petowner` WHERE  PetOwnerID='".$ID."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
  // verify
			while($row = $result->fetch_assoc()) {
				$Username = $row['Username'];
				$Password = $row['Password'];
				$NameOfOwner = $row['FullName'];
				$Address = $row['Address'];
				$Email = $row['Email'];
				$ContactNumber = $row['ContactNumber'];
			}
		}
		
		$clinicID = $_SESSION["ID"];
		$sql2 = "SELECT * FROM `pet` where OwnerID='".$ID."' and deleted=''";
		$resultC = $conn->query($sql2);
		$PetCount=0;
		
		if ($resultC->num_rows > 0) {
  // verify
			while($rows = $resultC->fetch_assoc()) {
				$PetCount++;
				
			}
		}
		
	if($PetCount<=1){
		$ShowCount = $PetCount . " Pet"; 
	}else{
		$ShowCount = $PetCount . " Pets";
	}
}
}
//---------------------------------------------------
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
		$sql = "UPDATE `petowner` SET `Username`='".$updateThis."',`Password`='".$andThis."' WHERE PetOwnerID='".$clinicID."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

$conn->close();
	}
//-----------------------------------------------------
if (isset($_GET['updateInfo'])) {
    UpdateInfo();
	}
	function UpdateInfo(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "petvaccination";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$update1 = $_COOKIE['updateName'];
		$update2 = $_COOKIE['updateAddress'];
		$update3 = $_COOKIE['updateEmail'];
		$update4 = $_COOKIE['updateContact'];
		$ID = $_SESSION["ID"];
		$sql = "UPDATE `petowner` SET `FullName`='".$update1."',`Address`='".$update2."',`Email`='".$update3."',`ContactNumber`='".$update4."' WHERE PetOwnerID='".$ID."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

$conn->close();
	}
//-----------------------------------------------------
?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>HOME</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="PETOWNERHOME.css" media="screen">
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
    <meta property="og:title" content="HOME">
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
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="HOME.php" style="padding: 10px 14px;">HOME</a>
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
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="HOME.php" style="padding: 10px 14px;">HOME</a>
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
    <section class="u-clearfix u-white u-section-1" id="sec-0879">
	
	<div class="card" id="inputform" style="background-color:white;position:fixed;width:400px;z-index:20;top:50%;left:50%;transform:translate(-50%,-50%)">
			   <i class="bi bi-x-lg" style="float:right;margin:10px;cursor:pointer;" onclick="hideform()"></i><br>	<br>
			   <label><i class="bi bi-gear-fill" style="color:blue;cursor:pointer"></i> Edit Your Login Credentials</label><br><br>
			   <div id="beforepassword"><label><i class="bi bi-exclamation-triangle" style="color:yellow"></i> Enter your password first</label><br>
				<input type="password" placeholder="Password" id="oldpass"><button onclick="verifyPassword()">Submit</button></div>
				<div id="afterPassword">
				<hr>
				<label>Username</label>
				<input type="text" value="<?php echo $Username ?>" id="NewUsername"><br>
				<label>Password</label>
				<input type="text" placeholder="New Password" id="NewPassword"><br>
				
				<button style="margin:10px;" onclick="SaveNewCredentials()"><i class="bi bi-check2-circle"></i> Save</button>
				</div>
				<br><br>
			   </div>
			   
			  <div class="card" id="Infoform" style="background-color:white;position:fixed;width:400px;z-index:20;top:50%;left:50%;transform:translate(-50%,-50%)">
			   <i class="bi bi-x-lg" style="float:right;margin:10px;cursor:pointer;" onclick="hideform2()"></i><br>	<br>
			   <label><i class="bi bi-gear-fill" style="color:blue;cursor:pointer"></i> Edit Your Personal Info</label><br><br>
			   <div id="beforepassword2"><label><i class="bi bi-exclamation-triangle" style="color:yellow"></i> Enter your password first</label><br>
				<input type="password" placeholder="Password" id="oldpass2"><button onclick="verifyPassword2()">Submit</button></div>
				<div id="afterPassword2">
				<hr>
				<label>Name (Firstname Lastname)</label><br>
				<input type="text" value="<?php echo $NameOfOwner ?>" id="FullName" Placeholder="Firstname Lastname"><br><br>
				<label><i class="bi bi-house-heart" style="color:blue"></i> Home Address</label><br>
				<input type="text" value="<?php echo $Address ?>" id="HomeAddress" Placeholder="Home Address"><br><br>
				<label><i class="bi bi-envelope-heart" style="color:red"></i> Email Address</label><br>
				<input type="text" value="<?php echo $Email ?>" id="EmailAdd" Placeholder="Email Address"><br><br>
				<label><i class="bi bi-telephone-fill"  style="color:blue;"></i> Contact Number</label><br>
				<input type="text" value="<?php echo $ContactNumber ?>" id="ContactNumber" Placeholder="Contact Number"><br><br>
				
				
				<button style="margin:10px;" onclick="SaveNewInfo()"><i class="bi bi-check2-circle"></i> Save</button>
				</div>
				<br><br>
			   </div>
	
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-10 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-palette-1-light-3 u-size-13 u-layout-cell-1">
                <div class="u-border-2"  style="padding:10px;">
				<br>
                  <text class="u-text" style="font-size:22px;word-wrap:normal"><?php Echo $NameOfOwner ?> <i class="bi bi-heart" style="color:red;"></i></text><br>
				  <text class="u-text"  style="color:gray;font-size:14px"><i><b>FULL NAME</b></i></text><br><br>
                  <text class="u-text" style="word-wrap:normal"> <i><?php Echo $Address ?></i></text><br>
				  <text class="u-text"  style="color:gray;font-size:14px"><i class="bi bi-house-heart" style="color:blue"></i><i><b>HOME ADDRESS</b></i></text><br><br>
                  <text class="u-text" style="word-wrap:break-word"><?php Echo $Email ?></text><br>
				  <text class="u-text"  style="color:gray;font-size:14px"><i class="bi bi-envelope-heart" style="color:red"></i> <i><b>EMAIL</b></i></text><br><br>
                  <text class="u-text"><?php Echo $ContactNumber ?></text><br>
				  <text class="u-text"  style="color:gray;font-size:14px"><i class="bi bi-telephone-fill"  style="color:blue;"></i> <i><b>CONTACT NUMBER</b></i></text><br><br>
				  <text class="u-text"><?php echo $ShowCount ?><i class="bi bi-hearts"STYLE="COLOR:RED"></i></text><br>
				  <text class="u-text"  style="color:gray;font-size:14px;cursor:pointer;" onclick="AddPet()"><i><b>REGISTER A PET </b></i><i class="bi bi-plus-circle" style="color:blue"></i></text><br>

				  <br><BR>
				  
				  <text class="u-text">Account and Login</text><br>
				  <text class="u-text" style="color:gray;font-size:14px"  onclick="showEdit()"><i class="bi bi-gear-fill" style="color:blue;cursor:pointer"<b>EDIT LOGIN CREDENTIALS</b></i></text><br>
				  <text class="u-text" style="color:gray;font-size:14px"  onclick="showEditInfo()"><i class="bi bi-gear-fill" style="color:blue;cursor:pointer"<b>EDIT INFO</b></i></text><br>
				  
				  <br><BR>
				  
                  
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-47 u-layout-cell-2" style="border:1px solid black;">
                <div class="u-container-layout u-container-layout-2">
				<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "petvaccination";
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					$ID = $_SESSION["ID"];
					$sql = "SELECT * FROM `appointments` WHERE  OwnerID='".$ID."' and RequestStatus='Pending'";
					$result = $conn->query($sql);
					$cnt = 0;
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							$cnt++;
						}
						if ($cnt<2){
							$txt = " pending Appoinmnent";
						}else{
							$txt = " pending Appoinmnents";
						}
						echo '<div onclick="gotoAppoinments()" style="margin-right:20px;cursor:pointer;width:250px;background-color:lightyellow;padding:20px 20px 20px 10px;border-left:5px solid yellow;float:left">
						'.$cnt.$txt.'</div>';
					}
					
				?>
				<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "petvaccination";
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					$ID = $_SESSION["ID"];
					$sql = "SELECT * FROM `appointments` WHERE  OwnerID='".$ID."' and RequestStatus='Approved'";
					$result = $conn->query($sql);
					$cnt = 0;
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							$WToday = date('W') +1;
							$ADate = $row['Date'];
							$WDate = date_create($ADate);
							$WDate = date_format($WDate,"W");
							if($WToday==$WDate){
								$cnt++;
							}
							
						}
						if ($cnt<2){
							$txt = " Upcoming Appoinmnent (This Week)";
						}else{
							$txt = " pending Appoinmnents (This Week)";
						}
						echo '<div onclick="gotoAppoinments()" style="margin-right:20px;cursor:pointer;width:350px;background-color:lightgreen;padding:20px 20px 20px 10px;border-left:5px solid green;float:left">
						'.$cnt.$txt.'</div>';
					}
					
				?>
				</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script>
	function AddPet(){
		window.location="ADD-PET.php";
	}
	document.getElementById("inputform").style.display="none";
	document.getElementById("Infoform").style.display="none";
	document.getElementById("afterPassword").style.display="none";
	document.getElementById("afterPassword2").style.display="none";
	function showEdit(){
		document.getElementById("inputform").style.display="block";
	}
	function showEditInfo(){
		document.getElementById("Infoform").style.display="block";
	}
	function hideform(){
		document.getElementById("inputform").style.display="none";
	}
	function hideform2(){
		document.getElementById("Infoform").style.display="none";
	}
	function verifyPassword(){
		
		var pass = document.getElementById("oldpass").value;
		var password = "<?php echo $Password ?>";
		if(pass == password){
			document.getElementById("afterPassword").style.display="block";
		document.getElementById("beforepassword").style.display="none";
		}else{
			alert("You entered your password wrong. Try again.");
		}
		
	}
	function verifyPassword2(){
		
		var pass = document.getElementById("oldpass2").value;
		var password = "<?php echo $Password ?>";
		if(pass == password){
			document.getElementById("afterPassword2").style.display="block";
		document.getElementById("beforepassword2").style.display="none";
		}else{
			alert("You entered your password wrong. Try again.");
		}
		
	}
	//--------------------------------------------------------------------------
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
				window.location='PETOWNERHOME.php?updateLoginCredentials=true';
				window.location='PETOWNERHOME.php';
			}
			
		}
	}
	//--------------------------------------------------
	function SaveNewInfo(){
		var OldName = "<?php echo $NameOfOwner ?>";
		var OldAddress = "<?php echo $Address ?>";
		var OldEmail = "<?php echo $Email ?>";
		var OldNumber = "<?php echo $ContactNumber ?>";
		var NewName = document.getElementById('FullName').value;
		var NewAddress = document.getElementById('HomeAddress').value;
		var NewEmail = document.getElementById('EmailAdd').value;
		var NewContact = document.getElementById('ContactNumber').value;
		if((OldName==NewName)&&(OldAddress==NewAddress)&&(NewEmail==OldEmail)&&(OldNumber==NewContact)){
			//nothingchanged
			document.getElementById("Infoform").style.display = "none";
		}else{
			if(confirm("Are you sure you want this changes?")){
				document.cookie = "updateName=" + NewName;
				document.cookie = "updateAddress=" + NewAddress;
				document.cookie = "updateEmail=" + NewEmail;
				document.cookie = "updateContact=" + NewContact;
				window.location='PETOWNERHOME.php?updateInfo=true';
				window.location='PETOWNERHOME.php';
			}
			
		}
	}
	function gotoAppoinments(){
		window.location="MY-APPOINTMENTS.php";
	}
	</script>
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
  </body>
</html>