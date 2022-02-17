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
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="DASHBOARD">
    <meta property="og:type" content="website">
  </head>
  <body data-home-page="CLINICDASHBOARD.php" data-home-page-title="DASHBOARD" class="u-body u-xl-mode"><header class="u-clearfix u-header u-palette-1-base u-header" id="sec-c7a2"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
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
</li><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="MY-CLINIC.php" style="padding: 10px 14px;">MY CLINIC and REPORTS</a>
</li><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="LOGOUT.php" style="padding: 10px 14px;">LOGOUT</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="CLINICDASHBOARD.php" style="padding: 10px 14px;">DASHBOARD</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="CLINICAPPOINTMENTS.php" style="padding: 10px 14px;">APPOINTMENTS</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="CLINICMESSAGES.php" style="padding: 10px 14px;">MESSAGES</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="MY-CLINIC.php" style="padding: 10px 14px;">MY CLINIC and REPORTS</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link"  href="LOGOUT.php"  style="padding: 10px 14px;">LOGOUT</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-clearfix u-section-1" id="sec-df13">
      <div class="u-clearfix u-sheet u-sheet-1">
	  <br>
	   <?php 
	  $ID = $_SESSION["ID"];
		$sql = "SELECT * FROM `clinicowner` where ClinicID='".$ID."'";
				$result = $conn->query($sql);
				$ctr=0;
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$ClinicName = $row['ClinicName'];
						$Address = $row['Address'];
						$ClinicDays = $row['ClinicDays'];
						$ClinicOpen = $row['CH-Open'];
						$ClinicClose = $row['CH-Close'];
						
						if($ClinicOpen==$ClinicClose){
					 $ClinicOpen = "24 ";
					 $ClinicClose = "Hours";
				 }else{
					 $ClinicOpen = date_create($ClinicOpen);
					$ClinicOpen = date_format($ClinicOpen,"g:i A");
					$ClinicClose = date_create($ClinicClose);
					$ClinicClose = " - ".date_format($ClinicClose,"g:i A");
				 }
						
					}
				}
				?>
	  <div>
	  <text style="font-size:24px;"><b><?php echo $ClinicName ?></B></text><br>
	  <text><i class="bi bi-geo-alt-fill" style="color:red"></i><i> <?php echo $Address ?></i></text><br><br>
	  <text><i class="bi bi-calendar-week" style="color:blue;"></i> <?php echo $ClinicDays ?></text><br>
	  <text><i class="bi bi-clock-history" style="color:blue;"></i> <?php echo $ClinicOpen ?> <?php echo $ClinicClose ?></text><br>
	  <button onclick="EditDetails()">Edit Details</button>
	  </div>
	  <br>
	  
	  <?php 
	  $ID = $_SESSION["ID"];
		$sql = "SELECT * FROM `messages` where ReceiverID='".$ID."' and Seen='Unseen'";
				$result = $conn->query($sql);
				$ctr=0;
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$ctr++;
					}
					if($ctr<2){
						echo '<div style="padding:20px;width:250px;margin:5px;border-left:5px solid Blue;background-color:lightblue;float:left;cursor:pointer;"  onclick="goToMessages()">'.$ctr.' <i class="bi bi-chat-left-dots-fill" style="color:blue"> Unread Message</i><br>
						<text style="font-size:14px;cursor:pointer;color:gray">Tap to view</text>
						</div>';
					}else{
						echo '<div style="padding:20px;margin:5px;width:250px;border-left:5px solid Blue;background-color:lightblue;float:left;cursor:pointer;" onclick="goToMessages()">'.$ctr.' <i class="bi bi-chat-left-dots-fill" style="color:blue"> Unread Messages</i><br>
						<text style="font-size:14px;cursor:pointer;color:gray">Tap to view</text>
						</div>';
					}
				}
	  ?>
	  <?php 
	  $ID = $_SESSION["ID"];
		$sql = "SELECT * FROM `appointments` where ClinicID='".$ID."' and RequestStatus='Pending'";
				$result = $conn->query($sql);
				$ctr=0;
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$ctr++;
					}
					if($ctr<2){
						echo '<div style="padding:20px;width:250px;margin:5px;border-left:5px solid yellow;background-color:lightyellow;float:left;cursor:pointer;" onclick="goToAppointments()">'.$ctr.' <i class="bi bi-calendar-event" style="color:#9b870c"> Pending appointment</i>
	  <text style="font-size:14px;cursor:pointer;color:gray">Tap to view</text>
	  </div>';
					}else{
						echo '<div style="padding:20px;width:250px;margin:5px;border-left:5px solid yellow;background-color:lightyellow;float:left;cursor:pointer;" onclick="goToAppointments()">1 <i class="bi bi-calendar-event" style="color:blue"> Pending appointments</i>
	  <text style="font-size:14px;cursor:pointer;color:gray">Tap to view</text>
	  </div>';
					}
				}
	?>
	<br>
	  
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
	<script>
	function goToAppointments(){
		window.location='CLINICAPPOINTMENTS.php';
	}
	function goToMessages(){
		window.location='CLINICMESSAGES.php';
	}
	function EditDetails(){
		window.location='MY-CLINIC.php';
	}
	</script>
  </body>
</html>