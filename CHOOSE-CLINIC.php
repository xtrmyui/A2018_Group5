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
	global $sql;
	$sql = "SELECT * FROM `clinicowner`";
}
// ---------------------------------------------------------------------------------------------------------
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "petvaccination";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$address = trim($_POST["address"]);
	$HSA = trim($_POST["HSA"]);
	if(($address=="")&&($HSA=="")){
		$sql = "SELECT * FROM `clinicowner`";
	}else if(($address!="")&&($HSA=="")){
		$sql = "SELECT * FROM `clinicowner` where Address like '%".$address."%'";
	}else if(($address=="")&&($HSA!="")){
		$sql = "SELECT * FROM `clinicowner` where AcceptHS='Yes'";
	}else{
		$sql = "SELECT * FROM `clinicowner` where Address like '%".$address."%' and AcceptHS='Yes'";
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
    <!--      <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="CLINICDASHBOARD.php" style="padding: 10px 14px;">DASHBOARD</a>
</li><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="CLINICAPPOINTMENTS.php" style="padding: 10px 14px;">APPOINTMENTS</a>
</li><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="CLINICMESSAGES.php" style="padding: 10px 14px;">MESSAGES</a>
</li><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="MY-CLINIC.php" style="padding: 10px 14px;"><i class="bi bi-clipboard-heart"></i> MY CLINIC</a>
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
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="MY-CLINIC.php" style="padding: 10px 14px;"><i class="bi bi-clipboard-heart"></i> MY CLINIC</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="LOGOUT.php"  style="padding: 10px 14px;">LOGOUT</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div> -->
		  
        </nav>
      </div></header>
	  
    <section class="u-clearfix u-white u-section-1" id="sec-0879">
	<a href="MY-PETS-PROFILE.php" class=" u-border-hover-palette-1-base u-btn u-button-style u-none u-text-palette-1-base u-btn-1" style="float:right"><span class="u-file-icon u-icon u-icon-1"><img src="images/4833552.png" alt=""></span>&nbsp;<span class="u-text-body-color" style="font-weight: 500; font-size: 1.125rem;">BACK</span>
        </a><br>
      <div class="u-clearfix u-sheet u-sheet-1"><br>
	  <form method="post">
	  <i class="bi bi-search"  style="color:gray;"></i> <input type="text" placeholder="Address" name="address" style="width:250px;">
	  <input type="hidden" value="" name="HSA">
	  <input type="checkbox" value="Yes" name="HSA"><label> Available for HomeService </label><button type="submit"><i class="bi bi-search"  style="color:gray;"></i> Search</button> </form>
	  <?php
	  
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
				 if($AcceptHS=="Yes"){
					 $AcceptHS = "Home Service: Available";
				 }else{
					 $AcceptHS = "Home Service: Not available";
				 }
				 $Image =$row['Image'];
				 if($Image==""){
					 $Image = "data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJkZWZhdWx0LWltYWdlLXNvbGlkIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNDAwIDI2NSIgc3R5bGU9IndpZHRoOiA0MDBweDsgaGVpZ2h0OiAyNjVweDsiPg0KPHJlY3QgZmlsbD0iI0M2RDhFMSIgd2lkdGg9IjQwMCIgaGVpZ2h0PSIyNjUiLz4NCjxwYXRoIGZpbGw9IiNEOUUzRTgiIGQ9Ik0zOTUuMyw5Ni4yYy01LTAuOC02LjEsMS4xLTguNSwyLjljLTEtMi4zLTIuNi02LjItNy43LTVjMS41LTUuMy0yLjYtOC40LTcuNy04LjRjLTAuNiwwLTEuMiwwLjEtMS44LDAuMg0KCWMtMS44LTQuMS02LTYuOS0xMC43LTYuOWMtNi41LDAtMTEuOCw1LjMtMTEuOCwxMS44YzAsMC40LDAsMC45LDAuMSwxLjNjLTEuMi0wLjgtMi41LTEuMy0zLjktMS4zYy00LjMsMC03LjksNC4yLTcuOSw5LjQNCgljMCwxLjIsMC4yLDIuNCwwLjYsMy41Yy0wLjUtMC4xLTEtMC4xLTEuNi0wLjFjLTYuOSwwLTEyLjUsNS41LTEyLjcsMTIuNGMtMC45LTAuMi0xLjktMC40LTIuOS0wLjRjLTYuNCwwLTExLjcsNS4yLTEyLjUsMTEuOA0KCWMtMS4yLTAuNC0yLjUtMC42LTMuOS0wLjZjLTUuOSwwLTEwLjgsMy44LTEyLjEsOC45Yy0yLjQtMi01LjUtMy4yLTguOS0zLjJjLTYsMC0xMS4xLDMuNy0xMi44LDguOGMtMS41LTEuNC0zLjgtMi4zLTYuMy0yLjMNCgljLTIuMSwwLTQuMSwwLjYtNS41LDEuN2gtMC4xYy0xLjMtNS41LTYuMi05LjUtMTIuMS05LjVjLTIuNCwwLTQuNywwLjctNi42LDEuOWMtMS40LTAuNy0zLTEuMi00LjgtMS4yYy0wLjMsMC0wLjUsMC0wLjgsMA0KCWMtMS41LTQuMS01LjItNy05LjUtN2MtMy4xLDAtNS45LDEuNS03LjgsMy45Yy0yLjItNC44LTYuOC04LjItMTIuMi04LjJjLTUuNiwwLTEwLjUsMy43LTEyLjUsOC44Yy0yLjEtMC45LTQuNC0xLjUtNi45LTEuNQ0KCWMtNi44LDAtMTIuNSwzLjktMTQuNSw5LjNjLTAuMiwwLTAuNSwwLTAuNywwYy01LjIsMC05LjYsMy4yLTExLjQsNy44Yy0yLjctMi44LTctNC41LTExLjgtNC41Yy0zLjMsMC02LjQsMC45LTguOSwyLjMNCgljLTIuMS02LjUtOC0xMi4yLTE4LjEtOS45Yy0yLjctMi4zLTYuMy0zLjctMTAuMS0zLjdjLTIuNSwwLTQuOCwwLjYtNi45LDEuNmMtMi4yLTUuOS03LjktMTAuMS0xNC42LTEwLjFjLTguNiwwLTE1LjYsNy0xNS42LDE1LjYNCgljMCwwLjksMC4xLDEuNywwLjIsMi41Yy0yLjYtNS03LjgtOC40LTEzLjgtOC40Yy04LjMsMC0xNS4xLDYuNS0xNS42LDE0LjZjLTIuOS0zLjItNy01LjMtMTEuNy01LjNjLTcuNCwwLTEzLjUsNS4xLTE1LjIsMTINCgljLTIuOS0zLjUtOS44LTYtMTQuNy02djExOS4yaDQwMFYxMDJDNDAwLDEwMiw0MDAsOTcsMzk1LjMsOTYuMnoiLz4NCjxwYXRoIGZpbGw9IiM4RUE4QkIiIGQ9Ik00MDAsMjA2LjJjMCwwLTI1LjMtMTkuMi0zMy42LTI1LjdjLTEzLjQtMTAuNi0yMy4xLTEyLjktMzEuNy03cy0yMy45LDE5LjctMjMuOSwxOS43cy01OC45LTYzLjktNjEuNS02Ni40DQoJYy0xLjUtMS40LTMuNi0xLjctNS41LTAuOWMtNS4yLDIuNC0xNy42LDkuNy0yNC41LDEyLjdjLTYuOSwyLjktNDEtNTAuNy00OS42LTUzcy04NC4zLDgzLjMtMTAxLjQsNzUuMXMtMjYuOS0yLjMtMzUuNCwzLjUNCgljLTguNiw1LjktMTEsNS45LTE1LjksOC4ycy0xNy4xLTUuOS0xNy4xLTUuOVYyNjVjMCwwLDQwMCwwLjIsNDAwLDB2LTU4LjhINDAweiIvPg0KPHBhdGggZmlsbD0iIzdFOTZBNiIgZD0iTTMzMy40LDE3OWMtMTMuMS05LjMtNDAsNC42LTU1LjEsMTAuN2MtMjMuNiw5LjYtOTQtNTQuNC0xMDcuMi01OS43YzAsMC00LjIsMy43LTkuNiw3LjYNCgljLTMuNS0wLjQtOC40LTUuNy05LjktNC43Yy00LjYsMy4xLTE3LjgsMTUuNC0yOC4zLDI2LjZjLTEwLjUsMTEuMy0xMS43LDAtMTUuOC0wLjZjLTIuNS0wLjQtNTQuMSw0Mi41LTU4LjcsNDMuMQ0KCUMyMi4zLDIwNS4zLDAsMTk3LjUsMCwxOTcuNVYyNjVsNDAwLTAuMXYtNTMuM0M0MDAsMjExLjYsMzQ0LjgsMTg3LjEsMzMzLjQsMTc5eiIvPg0KPHBhdGggZmlsbD0iIzc4OEY5RSIgZD0iTTAsMjY0Ljl2LTU4LjZjMCwwLDguMiwxLjgsMTEuMyw1LjNjMy4xLDMuNiwyNi4xLTQuMiwyNi4xLDQuN3MwLjUsNC4yLDAuNSwxNC44YzAsMTAuNywyMy00LjIsMzguMS0xOC40DQoJczM0LjktNDkuMiwzNi0zNWMxLDE0LjItMTUuMSwzOS4yLTI0LDU2LjRDNzkuMSwyNTEuNCw1MS43LDI2NSw1MS43LDI2NUwwLDI2NC45eiIvPg0KPHBhdGggZmlsbD0iIzc4OEY5RSIgZD0iTTEwMCwyNjVjMCwwLDY2LjctMTI1LjEsNjguMy0xMTYuOHMtNi44LDI5LjcsMi4xLDI2LjFjOC45LTMuNiwxNC42LTE2LDE4LjgtOS41czE2LjIsMzguNiwyMS45LDMzLjgNCgljNS43LTQuNywyMS40LTEzLjEsMjIuNC02LjVjMSw2LjUtMSw1LjMtNS43LDIwLjJDMjIzLjEsMjI3LjEsMjAwLDI2NSwyMDAsMjY1aC0xMGMwLDAsNi0yNC44LDguNi0zNC45YzIuNi0xMC4xLTMuNy0xOS0xMi04LjMNCglzLTIzLDIyLTI0LDE3LjhzLTUuNy0zMC4zLTE4LjgtMTQuMmMtMTMsMTYtMzMuOCwzOS43LTMzLjgsMzkuN2gtMTBWMjY1eiIvPg0KPHBhdGggZmlsbD0iIzc4OEY5RSIgZD0iTTI0NSwyNjVjMCwwLDE5LjgtNTQuNywzMy40LTY0LjJzNTMuNy0yNy45LDQ2LjktMTMuNmMtNi44LDE0LjItMTEsMzQuNC0yMC4zLDQ5LjgNCgljLTkuNCwxNS40LTE4LjgsMjYuMS0xNC4xLDEzLjZjNC43LTEyLjUsNi40LTIzLjMsMy43LTIzLjFDMjcxLjMsMjI5LjEsMjYwLDI2NSwyNjAsMjY1SDI0NXoiLz4NCjwvc3ZnPg0K";
				 }else{
					 $Image = "url('".$Image."')";
				 }
				 
				 if($COpen==$CClose){
					 $ClinicOpen = "24 ";
					 $ClinicClose = "Hours";
				 }else{
					 $Open = date_create($COpen);
					$ClinicOpen = date_format($Open,"g:i A");
					$Close = date_create($CClose);
					$ClinicClose = " - ".date_format($Close,"g:i A");
				 }
				 
				 echo '<hr>
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-size-30 u-size-60-md">
                <div class="u-layout-row">
                  <div id="imgcontainer" class="u-align-left u-container-style u-image u-image-round u-layout-cell u-left-cell u-radius-50 u-size-60 u-image-1" src="" data-image-width="1080" data-image-height="1080" style="cursor:pointer;background-image:'.$Image.'">
                    
                  </div>
                </div>
              </div>
			  
              <div class="u-size-30 u-size-60-md">
                <div class="u-layout-col">
                  <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-60 u-white u-layout-cell-2" src="">
                    <div class="u-container-layout u-container-layout-2">
                      <h5 class="u-text u-text-default u-text-1" id="clinicname"><i class="bi bi-clipboard-heart" style="color:blue;"></i> '.$ClinicName.'</h3>
					 	<text><i class="bi bi-geo-alt-fill" style="color:red"></i><i> '.$Address.'</i></text><br><br>
						<text>Availability:</text><br>	
                      <text><i class="bi bi-calendar-week" style="color:blue;"></i> '.$ClinicDays.'<br>
					  <i class="bi bi-clock-history" style="color:blue;"></i> '.$ClinicOpen.$ClinicClose .'</text><br><br>
					  <text>OWNER</text><br>
					  <text style="color:blue;"><i class="bi bi-person-heart"> Owned By: '.$Owner .'</i></text><br><br>
					   
					  <i class="bi bi-hospital"  style="color:blue;"></i> Services Offered: <br><text style="white-space: pre-wrap;"> '.$ServicesOffered ,'</text><br>
					  <text>'.$AcceptHS.'</text><br><br>
					  <text><i class="bi bi-telephone-fill"  style="color:blue;"></i> Contact Details<br></text><text style="white-space: pre-wrap;">'.$ContactDetails.'</text><br>
					  <text><i class="bi bi-envelope"  style="color:blue;"></i> '.$Email.'</text><br>
					  <text><i class="bi bi-facebook"  style="color:blue;"></i> '.$Facebook.'</text><br>
					  <text><i class="bi bi-instagram"  style="color:blue;"></i> '.$Instagram ,'</text><br>
					  <text><i class="bi bi-link"  style="color:blue;"></i> '.$Web .'</text><br>
					  <button style="padding:10px;background-color:#89cff0;border:none;border-radius:15px;" id="'.$row['ClinicID'].'" onclick="SetAppointment(this.id)">SET APPOINMENT</button>
					  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>';
				 
			}
		} else {
			echo "<br><center><h2>Sorry We did not found what you're looking for :(</h2><h4>Look for something else instead</h4></center>";
		}
		$conn->close();
	  
	  ?>
	  
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
	function SetAppointment(id){
		document.cookie = "clinicID=" + id + ";'';path=/";
		window.open("SET-APPOINTMENT.php","_self");
	}
	</script>
  </body>
</html>