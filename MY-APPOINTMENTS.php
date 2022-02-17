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
?>

<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>MY APPOINTMENTS</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="MY-APPOINTMENTS.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.4.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="MY APPOINTMENTS">
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
    <section class="u-align-center u-clearfix u-section-1" id="sec-aedd">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-expanded-width u-table u-table-responsive u-table-1">
          <table class="u-table-entity u-table-entity-1">
            <colgroup>
              <col width="14.28%">
              <col width="18.28%">
              <col width="15.28%">
              <col width="10.28%">
              <col width="9.28%">
              <col width="14.28%">
              <col width="14.28%">
            </colgroup>
            <thead class="u-align-center u-palette-4-base u-table-header u-table-header-1">
              <tr style="height: 21px;">
                <th class="u-border-3 u-border-palette-4-base u-table-cell u-table-cell-1">PET</th>
                <th class="u-border-3 u-border-palette-4-base u-table-cell u-table-cell-2">CLINIC</th>
                <th class="u-border-3 u-border-palette-4-base u-table-cell u-table-cell-3">ADDRESS</th>
                <th class="u-border-3 u-border-palette-4-base u-table-cell u-table-cell-4">DATE</th>
                <th class="u-border-3 u-border-palette-4-base u-table-cell u-table-cell-5">TIME</th>
                <th class="u-border-3 u-border-palette-4-base u-table-cell u-table-cell-6">CASE</th>
                <th class="u-border-3 u-border-palette-4-base u-table-cell u-table-cell-7">SERVICE TYPE</th>
              </tr>
            </thead>
            <tbody class="u-table-body">
			<?php
				$ID = $_SESSION["ID"];
				$sql = "SELECT * FROM `appointments` where OwnerID='".$ID."' order by Date ASC";
				$result = $conn->query($sql);
				$dateToday = date('Y-m-d');
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						if ($row['Date']>$dateToday ){
							$ADate = date_create($row['Date']);
							$ADate = date_format($ADate, "F d,Y");
							$ATime = date_create($row['Time']);
							$ATime = date_format($ATime, "H:i A");
							$PetID = $row['PetID'];
							$sql2 = "SELECT * FROM `pet` where PetID='".$PetID."'";
							$result2 = $conn->query($sql2);
							if ($result2->num_rows > 0) {
								while($row2 = $result2->fetch_assoc()) {
									$PetName = $row2['PetName'];
								}
							}
							$ClinicID = $row['ClinicID'];
							$sql3 = "SELECT * FROM `clinicowner` where ClinicID='".$ClinicID."'";
							$result3 = $conn->query($sql3);
							if ($result3->num_rows > 0) {
								while($row3 = $result3->fetch_assoc()) {
									$ClinicName = $row3['ClinicName'];
									$ClinicAddress = $row3['Address'];
								}
							}
							
							if($row['RequestStatus']=='Pending'){
								echo '<tr style="height: 75px; color:gray;">
								<td class="u-border-1 u-border-grey-30 u-first-column u-table-cell u-table-cell-8">
								<i style="font-size:12px;">Pending Appoinment</i><br>
								'.$PetName.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$ClinicName.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$ClinicAddress.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$ADate.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$ATime.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$row['AppoinmentCase'].'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$row['ServiceType'].'</td>
								</tr>';
							}else if($row['RequestStatus']=='Cancelled'){
								echo '<tr style="height: 75px; color:red;">
								<td class="u-border-1 u-border-grey-30 u-first-column u-table-cell u-table-cell-8">
								<i style="font-size:12px;">Cancelled Appoinment</i><br>
								'.$PetName.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$ClinicName.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$ClinicAddress.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$ADate.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$ATime.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$row['AppoinmentCase'].'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$row['ServiceType'].'</td>
								</tr>';
							}else{
								echo '<tr style="height: 75px;">
								<td class="u-border-1 u-border-grey-30 u-first-column u-table-cell u-table-cell-8">
								'.$PetName.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$ClinicName.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$ClinicAddress.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$ADate.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$ATime.'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$row['AppoinmentCase'].'</td>
								<td class="u-border-1 u-border-grey-30 u-table-cell">'.$row['ServiceType'].'</td>
								</tr>';
							}
						}
						
					}
				}
			?>
              </tr>
            </tbody>
          </table>
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
  </body>
</html>