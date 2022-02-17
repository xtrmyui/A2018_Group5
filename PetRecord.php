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
$idList=$_COOKIE['petID'];

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
    <style>
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
    <meta property="og:title" content="DASHBOARD">
    <meta property="og:type" content="website">
  </head>
  <body data-home-page="DASHBOARD.html" data-home-page-title="DASHBOARD" class="u-body u-xl-mode"><header class="u-clearfix u-header u-palette-1-base u-header" id="sec-c7a2"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="letter-spacing: 0px; font-size: 1.25rem; font-weight: 700;">
            <a class="u-button-style u-custom-active-color u-custom-left-right-menu-spacing u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-nav-link" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-0173"></use></svg>
              <svg class="u-svg-content" version="1.1" id="svg-0173" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>

        </nav>
      </div></header>
	  
    <section class="u-clearfix u-section-1" id="sec-df13">
	 <a href="MY-PETS-PROFILE.php" style='float:right;' data-page-id="325928827" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-none u-text-palette-1-base u-btn-1"><span class="u-file-icon u-icon u-icon-1"><img src="images/4833552.png" alt=""></span>&nbsp;<span class="u-text-body-color" style="font-weight: 700; font-size: 1.125rem;">BACK</span>
        </a><br><br>
      <div class="u-clearfix u-sheet u-sheet-1">
	  <table class="u-table-entity u-table-entity-1" id="Vaccine Report">
			  <colgroup>
              <col width="12.5%">
              <col width="10.5%">
              <col width="12.5">
              <col width="10.5%">
              <col width="10.5%">
              <col width="14.5%">
              <col width="12.5%">
              <col width="16.5%">
            </colgroup>
			<thead class="u-align-center u-palette-4-base u-table-header u-table-header-1">
              <tr style="height: 32px;">
                <th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white" colspan="8">Vaccine Report</th>
                
				
              </tr>
			  <tr style="height: 32px;">
				<th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white">Date</th>
				<th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white">Weight</th>
				<th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white">Expiration</th>
				<th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white">Against</th>
				<th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white">Type</th>
				<th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white">Manufacturer</th>
				<th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white">Lot No</th>
				<th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white">Veterinarian</th>
			  </tr>
            </thead>
			<tbody class="u-table-body">
			<?php
				
				$ID = $_SESSION["ID"];
				$sql = "SELECT * FROM `vaccinereport` where PetID='".$idList."' order by DateofTreatment ASC";
				
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
						$Expiry = date_create($row['Expiration']);
						$Weight = $row['Weight'];
						$Against = $row['Against'];
						$Type = $row['Type'];
						$Manufacturer= $row['Manufacturer'];
						$LotNo= $row['LotNo'];
						$Vet= $row['Vet'];
						$ReportID= $row['ReportID'];
						
						echo '<tr style="height: 75px;">
						<td class="u-border-1 u-border-grey-30 u-table-cell">'.$Date.'</td>
						<td class="u-border-1 u-border-grey-30 u-table-cell">'.$Weight.'</td>
						<td class="u-border-1 u-border-grey-30 u-table-cell">'.date_format($Expiry,"M d, Y").'</td>
						<td class="u-border-1 u-border-grey-30 u-table-cell">'.$Against.'</td>
						<td class="u-border-1 u-border-grey-30 u-table-cell">'.$Type.'</td>
						<td class="u-border-1 u-border-grey-30 u-table-cell">'.$Manufacturer.'</td>
						<td class="u-border-1 u-border-grey-30 u-table-cell">'.$LotNo.'</td>
						<td class="u-border-1 u-border-grey-30 u-table-cell">'.$Vet.'</td>
						</tr>';
					}
				}
			?>
			</tbody>
			
			  </table>
			  
			  <br>
			  <br>
			  <center>
			  <table class="u-table-entity u-table-entity-1" id="Vaccine Report">
			  <colgroup>
              <col width="33.33%">
              <col width="33.33%">
              <col width="33.33%">
            </colgroup>
			<thead class="u-align-center u-palette-4-base u-table-header u-table-header-1">
              <tr style="height: 32px;">
                <th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white" colspan="3">Deworming Schedule</th>
                
				
              </tr>
			  <tr style="height: 32px;">
				<th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white">Date given</th>
				<th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white">Medicine Used</th>
				<th class="u-border-1 u-border-palette-4-base u-table-cell" style="border:1px solid white">Repeat On</th>
			  </tr>
            </thead>
			<tbody class="u-table-body">
			<?php
				
				$sql = "SELECT * FROM `dewormrecord` where PetID='".$idList."' order by DateGiven ASC";
				
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$Date = date_create($row['DateGiven']);
						$Date = date_format($Date,"M d, Y");
						$MedUsed = $row['MedicineUsed'];
						$Repeat = $row['RepeatOn'];
						$Repeat= date_create($Repeat);
						$Repeat = date_format($Repeat,'M d, Y');
						echo '<tr style="height: 75px;">
						<td class="u-border-1 u-border-grey-30 u-table-cell">'.$Date.'</td>
						<td class="u-border-1 u-border-grey-30 u-table-cell">'.$MedUsed.'</td>
						<td class="u-border-1 u-border-grey-30 u-table-cell">'.$Repeat.'</td>
						</tr>';
					}
				}
			?>
			</tbody>
			
			  </table></center>
	  </div>
	  <br>
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
	
	</script>
  </body>
</html>